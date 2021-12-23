<template>
    <span>{{ animatedValue }}</span>
</template>
<script type="text/babel">
    import TweenLite from 'gsap/TweenLite'

    export default {
        props: ['number'],
        data() {
            return {
                tweenedValue: 0
            }
        },
        computed: {
            animatedValue() {
                // tweenedValue is a decimal, so need to convert it to integer for display
                return this.tweenedValue.toFixed(0);
            }
        },
        methods: {
            tween(number) {
                TweenLite.to(this.$data, 0.5, { tweenedValue: number });
            }
        },
        watch: {
            number(value) {
                this.tween(value);
            }
        },
        created() {
            this.tween(this.number);
        }
    }
</script>