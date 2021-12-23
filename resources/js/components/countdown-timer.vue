<template>
    <span>{{ timer }}</span>
</template>
<script type="text/babel">
    import UtilsMixin from './mixins/utils.vue'

    export default {
        mixins: [UtilsMixin],
        props: ['endDate'],
        data() {
            return {
                timer: null,
                interval: null
            }
        },
        methods: {
            tick() {
                var diff = Math.max(0, Math.round(this.endDate - Date.now() / 1000));
                var seconds = Math.floor(diff % 60);
                var minutes = Math.floor((diff / 60) % 60);
                var hours = Math.floor((diff / (60 * 60)) % 24);
                var days = Math.floor(diff / (60 * 60 * 24));

                seconds = seconds < 10 ? '0' + seconds : seconds;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                hours = hours < 10 ? '0' + hours : hours;

                this.timer = (days > 0 ? `${days}${this.__('d')} : ` : '') +
                    (hours > 0 || days > 0 ? `${hours}${this.__('h')} : ` : '') +
                    `${minutes}${this.__('m')} : ${seconds}${this.__('s')}`;

                // clear interval if time elapsed
                if (diff == 0 && this.interval) clearInterval(this.interval);
            }
        },
        created() {
            this.tick();
            this.interval = setInterval(this.tick, 1000);
        }
    }
</script>
