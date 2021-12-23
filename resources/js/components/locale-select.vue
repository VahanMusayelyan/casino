<template>
    <div v-if="Object.keys(locales).length > 1" id="language-select-dropdown" class="navbar-nav dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i :class="[locale.flag, 'flag']"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a v-for="(locale, code) in locales" href="#" class="dropdown-item" @click="changeLocale(code)">
                <i :class="[locale.flag, 'flag']"></i>
                {{ locale.name }}
            </a>
        </div>
    </div>
</template>
<script type="text/babel">
    import axios from 'axios'

    export default {
        props: ['locales', 'locale'],
        methods: {
            changeLocale: function (code) {
                axios.post('/locale/' + code + '/remember').then(() => { location.reload(true) });
            }
        }
    }
</script>
