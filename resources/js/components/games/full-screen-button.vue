<template>
    <button id="full-screen-button" class="btn btn-link" @click="toggleFullScreen">
        <span v-if="!isFullScreen" :data-balloon="__('Full screen')" data-balloon-pos="down">
            <i class="fas fa-expand-arrows-alt"></i>
        </span>
        <span v-else :data-balloon="__('Normal screen')" data-balloon-pos="down">
            <i class="fas fa-compress-arrows-alt"></i>
        </span>
    </button>
</template>
<script type="text/babel">
    import { isFullScreen, toggleFullScreen } from '../../utils'
    import UtilsMixin from '../mixins/utils.vue'

    export default {
        props: ['container'], // ref to an element, which needs to be toggled full screen
        mixins: [UtilsMixin],
        data() {
            return {
                isFullScreen: false
            }
        },
        methods: {
            toggleFullScreen() {
                toggleFullScreen(this.$parent.$refs[this.container]);
            }
        },
        created() {
            const fullScreenChange = () => {
                this.isFullScreen = isFullScreen();
            }

            // full screen mode can be exited by pressing ESC button, that's why exrta event handling is required
            document.addEventListener('fullscreenchange', fullScreenChange);
            document.addEventListener('webkitfullscreenchange', fullScreenChange);
            document.addEventListener('mozfullscreenchange', fullScreenChange);
            document.addEventListener('MSFullscreenChange', fullScreenChange);
        }
    }
</script>
