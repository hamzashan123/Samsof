<template>
    <div class="header-bar" :style="headerBackground">
        <div class="container">
            <div class="columns">
                <div class="column is-offset-1">
                    <div class="columns is-mobile">
                        <div class="column pt-2 pb-2">
                            <h1 class="title is-3 has-text-white sans-serf-font">
                                {{ headerTitle }}
                            </h1>
                        </div>
                        <div class="column is-one-fifth-mobile">
                            <div class="header-icon-holder">
                                <hr class="is-hidden-tablet-only is-hidden-mobile">
                                <img :src="iconName" alt="" class="header-icon">  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        headerTitle: String,
        headerBg: String,
        iconName: String,
    },
    computed: {
        headerBackground () {
            let style = {};

            if (this.headerBg) {
                style['background'] = this.headerBg;
            }

            return style;
        },
    }
}
</script>

<style lang="scss" scoped>
    @import '../../sass/public/variables';
    .header-bar {
        z-index: 0;
        margin-bottom: 11px;

        .title {
            font-family: "Barlow", sans-serif;
            font-size: 1.5rem;
            @media only screen and (min-width: map_get($grid-breakpoints, md)) {
                font-size: 1.7rem;
            }
        }

        .header-icon-holder {
            display: flex;
            height: 100%;
            align-items: center;
            justify-content: flex-end;

            hr {
                width: 200px;
                margin-right: 10px;
            }
        }

        .header-icon {
            max-width: 40px;
            max-height: 40px;
        }
    }
</style>

