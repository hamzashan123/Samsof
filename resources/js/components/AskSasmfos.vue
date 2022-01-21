<template>
    <div class="ask-sasmfos-banner">
        <div class="columns is-gapless is-mobile">
            <div class="column is-5-mobile is-3-tablet is-4-desktop" :class=" homePage === true  ? 'is-hidden-mobile' : null ">
                <div class="banner-image" v-if="image"></div>
            </div>
            <div class="column" :class=" homePage === false  ? 'is-7-mobile' : null ">
                <div class="columns">
                    <div class="column">
                        <div class="banner-body">
                            <h3 class="title">ASK SASMFOS</h3>
                            <p>
                                Contact us to find out more about our network of maxillofacial and oral surgeons, hospitals and medical
                                funders.
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="banner-actions-icon" :class=" homePage === true  ? 'is-hidden-mobile' : null ">
                            <div></div>
                            <figure>
                                <img src="/images/icons/envelope-icon.png" alt="Envelope">
                            </figure>
                        </div>
                        <div class="banner-actions-buttons">
                            <a :href="route('ask') + '#enquiries'" class="button is-rounded">CONTACT US</a>
                            <a :href="route('ask') + '#procedures'" class="button is-rounded">INFO ON PROCEDURES</a>
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
            image: {
                type: Boolean,
                default: true,
            },
            homePage: {
                type: Boolean,
                default: false,
            }
        }
    }
</script>

<style lang="scss">
    @import '../../sass/public/variables';

    .ask-sasmfos-banner {
        background: $light-blue;
        color: #fff;
        padding: 0;

        .banner-image {
            position: relative;
            height: 100%;
            width: 100%;
            background: url('/images/backgrounds/resources-ask-sasmfos.jpg') 65% top no-repeat;
            background-size: cover;
            min-height: 100px;
        }

        .banner-body {
            padding: 2em 2em 0 2em;

            @media (min-width: map_get($grid-breakpoints, md)) {
                padding: 2em;
            }

            .title {
                color: #fff;
                font-family: $family-sans-serif;
                font-size: 2.1em;
            }
        }

        .banner-actions-icon {
            display: flex;
            padding: 0 2em;

            @media (min-width: map_get($grid-breakpoints, md)) {
                padding: 2em;
            }
            > * {
                flex: 1 1 50%;
            }

            > div {
                flex-basis: 80%;
                margin-top: 1em;
                border-top: 1px #fff solid;
            }

            > figure {
                flex-basis: 20%;
                padding-left: 1em;
                img {
                    margin-top: -.5em;
                    width: 100%;
                }
            }
        }

        .banner-actions-buttons {
            padding: 2em;

            @media (min-width: map_get($grid-breakpoints, md)) {
                text-align: right;
            }

            .button {
                border: 1px #fff solid;
                background: transparent;
                color: #fff;
                margin-left: .5em;
                margin-bottom: .5em;
            }
        }
    }
</style>

