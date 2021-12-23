<template>
    <transition name="fade">
        <div v-cloak v-if="visible">
            <div :class="classes" role="alert">
                <button type="button" class="close" @click="hide">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="alert-heading">
                    {{ heading }}
                </h4>
                <ul v-if="messages" v-for="item in messages">
                    <li>{{ item }}</li>
                </ul>
                <p v-if="message">
                    {{ message }}
                </p>
            </div>
        </div>
    </transition>
</template>
<script type="text/babel">
    export default {
        props: ['type', 'heading', 'message', 'messages'],
        data() {
            return {
                visible: false
            }
        },
        computed: {
            classes() {
                return ['alert', 'alert-' + this.type, 'm-0'];
            }
        },
        methods: {
            hide: function () {
                this.visible = false;
            }
        },
        mounted() {
            this.visible = true;
        }
    }
</script>
