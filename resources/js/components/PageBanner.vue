<template>
    <div class="page-banner" :style="bannerMarginStyle">
        <div class="page-banner-image" :style="bannerImageStyle"></div>
        <div class="page-banner-fade" v-if="mistOverlay" :style="fadeStyle"></div>

        <div class="page-banner-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-offset-1">
                        <h1 class="title">
                            <slot name="title"></slot>
                        </h1>
                        <div class="banner-breadcrumb" v-if="breadcrumb">
                            <template v-for="crumb in breadcrumb">
                                <span>{{ crumb }}</span> >
                            </template>
                            <slot name="title"></slot>
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
            src: String,
            breadcrumb: Array,
            backgroundColor: String,
            parallax: {
                type: Boolean,
                default: true,
            },
            negativeShift: {
                type: Boolean,
                default: true,
            },
            mistOverlay: {
                type: Boolean,
                default: true,
            },
            placementX: {
                type: String,
                default: 'center',
            },
            placementY: {
                type: String,
                default: 'center',
            },
        },
        data () {
            return {
                scrollDistance: 0,
            }
        },
        computed: {
            bannerMarginStyle () {
                if (this.negativeShift) {
                    return {
                        marginBottom: '-150px',
                    }
                }
            },
            fadeStyle () {
                return {
                    background: 'linear-gradient(185deg, rgba(255,255,255,0) 20%, ' + this.backgroundColor + ' 48%)',
                };
            },
            bannerImageStyle () {
                const parallaxDistance = this.scrollDistance / 3;

                return {
                    backgroundImage: 'url(' + this.src + ')',
                    backgroundPosition: this.placementX + ' ' + this.placementY,
                    transform: 'translateY(' + parallaxDistance + 'px)',
                }
            }
        },
        methods: {
        },
        mounted () {
            if (this.parallax) {
                window.addEventListener('scroll', (e) => {
                    this.scrollDistance = window.scrollY;
                });
            }
        }
    }
</script>

<style lang="scss">
    @import '../../sass/public/variables';

    .page-banner {
        height: 350px;
        position: relative;
        z-index: -1;
        margin-bottom: 0;
        overflow: hidden;

        @media (min-width: map_get($grid-breakpoints, md)) {
            height: 400px;
        }

        @media (min-width: map_get($grid-breakpoints, md)) {
            height: 600px;
        }

        > .page-banner-image {
            position: absolute;
            z-index: 0;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;

            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        > .page-banner-fade {
            position: absolute;
            z-index: 1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(185deg, transparent 30%, #fff 80%);
        }

        > .page-banner-body {
            position: absolute;
            z-index: 2;
            top: 0;
            height: 90%;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;

            .title {
                font-size: 1.8em;
                font-weight: 400;
                color: $light-blue;
                text-shadow: 0 0 70px #fff;
                margin: 0;

                @media (min-width: map_get($grid-breakpoints, md)) {
                    font-size: 2.5em;
                }

                @media (min-width: map_get($grid-breakpoints, lg)) {
                    font-size: 3em;
                }

                span {
                    color: $blue;
                    font-weight: 700;
                }
            }

            .banner-breadcrumb {
                color: #57585b;
            }
        }
    }
</style>
