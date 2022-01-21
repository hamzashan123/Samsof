<template>
    <div class="covid-banner">
        <div class="content">
            <a href="https://sacoronavirus.co.za" target="_blank">
                Visit the COVID-19 Coronavirus South African Resource Portal
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CovidBanner"
    }
</script>

<style lang="scss">
    @import '../../sass/public/variables';

    .covid-banner {
        padding: .5em;
        background: $danger;
        text-align: center;

        a {
            color: #fff;
            font-weight: bold;
        }
    }
</style>
