<script type="text/babel">
    import { Howl } from 'howler'

    export default {
        data() {
            return {
                soundEnabled: true,
                sounds: {}
            }
        },
        methods: {
            sound(name) {
                if (this.soundEnabled && this.sounds[name])
                    this.sounds[name].play();
            },
            loop(name){
                if (this.soundEnabled && this.sounds[name]){
                    this.sounds[name].loop(true);
                    this.sounds[name].play();
                }
            },
            loopStop(name){
                this.sounds[name].stop();
                this.sounds[name].loop(false);
            }
        },
        mounted() {
            for (const name of Object.keys(this.options.sounds)) {
                this.sounds[name] = new Howl({ src: [this.options.sounds[name]] });
            }
        }
    }
</script>
