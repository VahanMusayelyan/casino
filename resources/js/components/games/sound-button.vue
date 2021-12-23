<template>
    <button class="btn btn-link">
        <span v-if="enabled" :data-balloon="__('Disable sounds')" data-balloon-pos="down">
            <i class="fas fa-volume-up"></i>
        </span>
        <span v-else :data-balloon="__('Enable sounds')" data-balloon-pos="down">
            <i class="fas fa-volume-mute"></i>
        </span>
    </button>
</template>
<script type="text/babel">
    import UtilsMixin from '../mixins/utils.vue'

    export default {
        props: ['enabled'],
        mixins: [UtilsMixin]
    }
</script>