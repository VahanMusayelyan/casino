<template>
    <div class="row align-items-center text-center preloader">
        <div class="col">
            <img :src="url">
            <div class="text-body font-weight-bold text-loading">{{ __('Loading...') }}</div>
        </div>
    </div>
</template>
<script type="text/babel">
    import UtilsMixin from '../mixins/utils.vue'

    export default {
        props: ['url'],
        mixins: [UtilsMixin]
    }
</script>
