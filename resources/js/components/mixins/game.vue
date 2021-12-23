<script type="text/babel">
    import { isInteger } from '../../utils'

    export default {
        methods: {
            // check min bet on blur
            checkMinBet(event) {
                const bet = parseInt(event.target.value, 10);

                if (bet < this.options.config.minBet) {
                    this.input.bet = this.options.config.minBet;
                }
            }
        },
        created() {
            // watch bet changes
            this.$watch('input.bet', bet => {
                // set bet to min bet in case of a non-integer value
                if (!isInteger(bet)) {
                    this.input.bet = this.options.config.minBet;
                // set bet to max bet if value exceeds max bet
                // note that min bet can not be changed on input, only on blur event
                // (because min bet can be more than 10 and every single digit input is less than 10)
                } else if (!isInteger(bet) || bet > this.options.config.maxBet) {
                    this.input.bet = this.options.config.maxBet;
                }
            });
        }
    }
</script>
