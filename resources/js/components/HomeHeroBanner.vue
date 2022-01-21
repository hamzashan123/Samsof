<template>
    <div class="home-hero-banner">
        <nav class="member-nav">
            <a class="button is-warning has-text-white is-rounded is-small" :href="route('members.login')">MEMBER LOGIN</a>
            <a class="button is-light is-rounded is-small" :href="route('members.register')">JOIN</a>
            <button class="ml-2 button is-light is-rounded is-small" type="button" @click.prevent="handleSearchClick"><fa icon="search"></fa></button>
        </nav>
        <div class="home-hero-body">
            <div class="welcome-body">
                <figure class="logo">
                    <img src="/svg/sasmfos-logo.svg">
                </figure>
                <h1 class="title">
                    Welcome to<br>
                    <span class="has-text-weight-bold">SASMFOS</span>
                </h1>
                <div class="content banner-content">
                    <p>
                        The South African Society of Maxillofacial and Oral Surgeons (SASMFOS) is a non-profit
                        member-based association offering unique medical and dental specialist skills in South Africa
                        and abroad.
                    </p>
                    <p>
                        Our members represent a surgical branch of both medicine and dentistry, and are concerned with
                        the diagnosis and treatment of diseases which affect the mouth, jaws, face and neck.
                    </p>
                </div>
                <div class="vision-mission-button-bar">
                    <a href="/who-we-are#vision" class="button is-success is-rounded"><strong>VISION</strong></a>
                    <a href="/who-we-are#vision" class="button is-warning is-rounded"><strong>MISSION</strong></a>
                </div>

                <div class="scroll-arrow">
                    <img src="/svg/scroll-arrow.svg" alt="Scroll Arrow">
                </div>
            </div>
            <div class="welcome-image">
                <div class="welcome-navigator">
                    <navigator active="home" :top="95" :gap="navigatorGap"></navigator>
                </div>
                <div class="welcome-slider">
                    <transition name="banner-slide">
                        <div v-for="(image, index) in sliderImages" v-if="activeImageIndex === index" class="welcome-slider-image" :key="index" :style="sliderImageStyle(image)"></div>
                    </transition>
                </div>
            </div>
        </div>
        <site-search v-model="showSearch"></site-search>
    </div>
</template>

<script>
    import Navigator from "./Navigator";
    import SiteSearch from "./SiteSearch";
    export default {
        name: "HomeHeroBanner",
        components: {SiteSearch, Navigator},
        props: {
            sliderImages: {
                type: Array,
                default: [],
            }
        },
        data () {
            return {
                activeImageIndex: 0,
                navigatorGap: 0,
                showSearch: false,
            }
        },
        computed: {
            sliderActiveImage () {
                return {
                    backgroundImage: 'url(' + this.sliderImages[this.activeImageIndex] + ')',
                }
            },
        },
        methods: {
            sliderImageStyle (image) {
                return {
                    backgroundImage: 'url(' + image + ')',
                }
            },
            setNavigatorGap () {
                this.navigatorGap = 0;

                const mq = window.matchMedia('(min-width: 576px)');
                if (mq.matches) {
                    this.navigatorGap = 50;
                }
            },
            handleSearchClick () {
                this.showSearch = !this.showSearch;
            }
        },
        mounted () {
            setInterval(() => {
                if (this.activeImageIndex < this.sliderImages.length -1) {
                    this.activeImageIndex++;
                } else {
                    this.activeImageIndex = 0;
                }
            }, 3000);

            window.addEventListener('resize', () => {
                this.setNavigatorGap();
            });
            this.setNavigatorGap();
        }
    }
</script>

<style lang="scss">
    @import '../../sass/public/variables';

    @keyframes arrow-bounce {
        0% {
            transform: translateY(-30px);
        }
        100% {
            transform: translateY(0);
        }
    }

    .banner-slide {
        &-enter-active, &-leave-active {
            transition: all .5s ease;
        }

        /* transalte3d to fix a stupid Safari bug that doesn't respect
         * the border-radius when transforming a child element
         */
        &-enter {
            transform: translate3d(0,0,0) translateX(100%);
        }

        &-leave-to {
            transform: translate3d(0,0,0) translateX(-100%);
        }

        &-enter-to, &-leave {
            transform: translate3d(0,0,0) translateX(0);
        }
    }

    .home-hero-banner {
        height: 700px;
        position: relative;

        background: radial-gradient(circle at top left, #32d6f5, transparent 35%),
        linear-gradient(to right, #0477b9, #02abc2, #42b468, #f7ad1e);

        .home-hero-body {
            display: flex;
            height: 100%;

            .banner-content {
                p {
                    font-size: .8rem;

                    @media only screen and (min-width: map_get($grid-breakpoints, md)) {
                        font-size: 1rem;
                    }
                }
            }

            > .welcome-body {
                flex: 0 0 100%;
                padding: 2em 4%;
                transition: all .3s ease;
            }

            > .welcome-image {
                flex: 1 1 100%;
                padding-top: 6em;
                position: relative;

                .welcome-navigator {
                    position: relative;
                    top: 0;
                }
            }

            .scroll-arrow {
                position: absolute;
                left: 50px;
                bottom: 20px;
                animation: arrow-bounce 1s infinite alternate;

                img {
                    width: 100%;
                }
                width: 8px;
            }

            @media only screen and (min-width: map_get($grid-breakpoints, md)) {
                > .welcome-body {
                    flex-basis: 55%;
                }
            }

            .welcome-slider {
                position: relative;
                height: 75%;
                overflow: hidden;
                border-radius: 100px 0 0 0;
                backface-visibility: hidden;
                transform: translate3d(0,0,0);

                .welcome-slider-image {
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: 0;
                    bottom: 0;

                    background-repeat: no-repeat;
                    background-position: center center;
                    background-size: cover;
                }
            }

            .logo {
                max-width: 300px;
                margin-bottom: 3em;

                @media only screen and (min-width: 1072px) {
                    margin-bottom: 5em;
                }

                img {
                    width: 100%;
                }
            }

            .title {
                font-size: 2.8em;
                font-weight: 300;
                color: #fff;
            }

            .content {
                color: #fff;
                //width: 60%;
                font-size: .7em;
            }

            .vision-mission-button-bar {
                button {
                    margin-right: .5em;
                    font-size: .7em;
                }
            }
        }

        @media only screen and (min-width: map_get($grid-breakpoints, md)) {
            .home-hero-body {
                .title {
                    font-size: 3.15em;
                }
                .content {
                    font-size: .8em;
                }

                .vision-mission-button-bar {
                    button {
                        margin-right: 1.5em;
                        font-size: .8em;
                    }
                }
            }
        }

        @media only screen and (min-width: map_get($grid-breakpoints, lg)) {
            height: 800px;

            .home-hero-body {
                .title {
                    font-size: 4.2em;
                }

                .content {
                    width: 100%;
                }

                .vision-mission-button-bar {
                    button {
                        margin-right: 1.5em;
                        font-size: 1em;
                    }
                }
            }
        }

        @media only screen and (min-width: map_get($grid-breakpoints, xl)) {
            .home-hero-body {
                .title {
                    font-size: 5.3em;
                }
            }
        }

        .member-nav {
            background: #fff;
            padding: 15px 40px 15px 20px;
            position: relative;
            right: 0;
            top: 0;
            text-align: right;
            z-index: 2;

            .button {
                color: $yellow;
            }

            @media only screen and (min-width: map_get($grid-breakpoints, md)) {
                position: absolute;
                border-radius: 0 0 0 20px;
            }
        }

        button.is-green {
            background: $green;
            border-color: darken($green, 2%);
            color: #fff;

            &:hover {
                background: darken($green, 3%);
                border-color: darken($green, 5%);
            }
        }

        button.is-yellow {
            background: $yellow;
            border-color: darken($yellow, 2%);
            color: #fff !important;

            &:hover {
                background: darken($yellow, 3%);
                border-color: darken($yellow, 5%);
            }
        }
    }
</style>
