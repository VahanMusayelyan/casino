<template>
    <div>
        <div id="chat-messages" ref="con" class="overflow-auto">
            <div v-for="message in messages">
                <template v-if="!message.presence">
                    <a :href="'/users/' + message.user.id + '/show'" target="_blank"><i class="far fa-user"></i></a>
                    <a href="#!" class="ml-1" @click="copyPasteUserName(message.user.name)">{{ message.user.name }}</a>
                    <span class="ml-1">{{ message.message }}</span>
                </template>
                <template v-else>
                    <span class="text-muted font-italic">{{ message.message }}</span>
                </template>
            </div>
        </div>
        <div v-if="users.length" class="mt-3">
            <span class="badge badge-info text-secondary">{{ __('Online') }}</span>
            <span v-for="user in users">
                <a href="#!" class="mr-1" @click="copyPasteUserName(user.name)">{{ user.name }}</a>
            </span>
        </div>
        <div class="mt-3">
            <div class="input-group">
                <input type="text" v-model="message" ref="message" class="form-control" :placeholder="__('Your message')" @keyup.enter="sendMessage">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" @click="sendMessage">{{ __('Send') }}</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import axios from 'axios'
    import Echo from 'laravel-echo'
    import Pusher from 'pusher-js'
    import UtilsMixin from './mixins/utils.vue'

    export default {
        mixins: [UtilsMixin],
        props: ['user'],
        data() {
            return {
                echo: null,
                message: '',
                messages: [],
                users: []
            }
        },
        computed: {
            socketId() {
                return this.echo ? this.echo.socketId() : null;
            }
        },
        methods: {
            copyPasteUserName(name) {
                this.message += name + ' ';
                this.$refs.message.focus();
            },
            sendMessage() {
                if (!this.message || !this.socketId)
                    return false;

                var message = {
                    message: this.message,
                    user: this.user
                };
                this.addMessage(message);

                axios.post('/chat/messages/send', { message: this.message }, { headers: { 'X-Socket-Id': this.socketId } })
                    .then(response => {
                        if (response.data.success) {
                            //
                        }
                    });

                this.message = '';
            },
            addMessage(message) {
                this.messages.push(message);
                this.scrollToBottom();
            },
            // automatically scroll messages area to bottom
            scrollToBottom() {
                this.$nextTick(() => {
                    // https://stackoverflow.com/a/270628/2767324
                    this.$refs.con.scrollTop = this.$refs.con.scrollHeight;
                });
            }
        },
        created() {
            this.echo = new Echo({
                broadcaster:    'pusher',
                key:            this.config('broadcasting.connections.pusher.key'),
                cluster:        this.config('broadcasting.connections.pusher.options.cluster'),
                encrypted:      true
            });

            // listen for new chat messages
            this.echo.join('chat')
                // currently joined users
                .here(users => {
                    this.users = users;
                })
                // new user joined
                .joining(user => {
                    this.users.push(user);
                    this.addMessage({ presence: true, message: user.name + ' ' + this.__('joined') });
                })
                // user left
                .leaving(user => {
                    this.users = this.users.filter(u => {
                        return u.id != user.id;
                    });
                    this.addMessage({ presence: true, message: user.name + ' ' + this.__('left') });
                })
                // new message
                .listen('ChatMessageSent', message => {
                    this.addMessage(message);
                });

            // get initial chat messages
            axios.get('/chat/messages/get')
                .then(response => {
                    this.messages = response.data.messages;
                    this.scrollToBottom();
                });
        }
    }
</script>