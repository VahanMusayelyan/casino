<template>
    <div class="collapse" id="provably-fair-form">
        <div class="form-row">
            <div class="col-lg-8 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-right-0">{{ __('Server hash') }}</div>
                    </div>
                    <input type="text" class="form-control text-muted" v-model="serverHash" readonly>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-right-0">{{ __('Client seed') }}</div>
                    </div>
                    <input type="text" class="form-control" :value="value" @input="$emit('input', $event.target.value)" maxlength="32" :placeholder="__('Any random characters')">
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import UtilsMixin from '../mixins/utils.vue'

    export default {
        props: ['serverHash', 'value'],
        mixins: [UtilsMixin]
    }
</script>