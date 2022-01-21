<template>
    <div class="event-scroller events">

        <transition name="event-slide">
            <div class="event-modal"  v-if="selectedEvent">
                <div class="event-modal-header">
                    <div class="event-modal-title">
                        {{ selectedEvent.title }}
                        <div class="event-modal-dates">{{ selectedEvent.presentable_event_dates }}</div>
                    </div>
                    <div class="event-modal-close">
                        <a href="#" @click.prevent="closeEvent">
                            <fa icon="times"></fa>
                        </a>
                    </div>
                </div>
                <div class="event-modal-body">
                    <div class="event-modal-image"></div>
                    <div class="event-modal-description" v-html="selectedEvent.presentable_description"></div>
                    <a :href="selectedEvent.link"
                       target="_blank"
                       class="event-modal-link button is-warning is-rounded is-small is-uppercase mt-2"
                       v-if="selectedEvent.link">
                        Find out more
                    </a>
                </div>
            </div>
        </transition>

        <div class="columns is-mobile">
            <div class="column is-1">
                <div class="scroller-navigation has-text-centered">
                    <a href="#" @click.prevent="pageDown()" class="has-text-primary" v-if="canScrollLeft"><fa class="icon" icon="chevron-left"></fa></a>
                </div>
            </div>
            <div class="column card-holder">
                <div class="columns card-scroller is-mobile" :style="scrollerBodyPosition">
                    <div class="column is-one-third-desktop news-card is-full-tablet is-full-mobile is-flex" :key="event.id" v-for="event in events">
                        <div class="columns align-center is-tablet event-card">
                            <div class="column has-background-white align-center is-flex align-center card-event">
                                <div class="p content">
                                    <p class="has-text-weight-medium is-size-7">{{ event.presentable_event_dates }}</p>
                                    <p class="has-text-weight-medium is-size-6">{{ event.title }}</p>
                                    <p class="has-text-grey-light is-size-7 is-hidden-mobile">{{ event.excerpt }}</p>
                                    <a class="button is-warning is-rounded is-small is-uppercase" href="#" @click.prevent="showMore(event)">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-1">
                <div class="scroller-navigation has-text-centered">
                    <a href="#" @click.prevent="pageUp()" class="has-text-primary" v-if="canScrollRight"><fa class="icon" icon="chevron-right"></fa></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        events: Array,
    },
    data () {
        return {
            selectedEvent: null,
            cardWidth: 0,
            page: 0,
            perPage: 1,
        }
    },
    computed: {
        scrollWidth () {
            return this.cardWidth * this.page;
        },
        scrollerBodyPosition () {
            let mq = window.matchMedia('(min-width: 1024px)');
            if (mq.matches) {
                return {
                    justifyContent: this.events.length < 3 ? 'center' : '',
                    transform: 'translateX(-' + this.scrollWidth + 'px)',
                }
            };
            return {
                transform: 'translateX(-' + this.scrollWidth + 'px)',
            };
        },
        canScrollLeft() {
            if (this.page > 0) {
                return true
            }
            return false
        },
        canScrollRight () {
            if (this.page < this.events.length - this.perPage) {
                return true
            }
            return false
        }
    },
    methods: {
        cardsPerPage () {
            let perPage = 1;
            let mq = window.matchMedia('(min-width: 1024px)');
            if (mq.matches) {
                perPage = 3;
            };
            this.perPage = perPage;
        },
        pageUp () {
            if (this.page < this.events.length - this.perPage) {
                this.page++;
            }
        },
        pageDown () {
            if (this.page > 0) {
                this.page--;
            }
        },
        showMore (event) {
            this.selectedEvent = event;
        },
        closeEvent () {
            this.selectedEvent = null;
        }
    },
    mounted () {
        this.cardWidth = this.$el.querySelector('.news-card').offsetWidth;
        window.addEventListener('resize', () => {
            this.cardsPerPage();
            this.cardWidth = this.$el.querySelector('.news-card').offsetWidth;
            this.page = 0;
        });
        this.cardsPerPage();
    }

}
</script>

<style lang="scss" scoped>
    @import '../../sass/public/variables';

    .event-slide {
        &-enter-active, &-leave-active {
            transition: all .3s ease;
        }

        &-enter, &-leave-to {
            transform: translateY(-50%);
            opacity: 0;
        }

        &-leave, &-enter-to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .event-scroller {
        padding-top: 3rem;
        padding-bottom: 4rem;

        .event-modal {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 10;
            background: rgba(0,0,0,0.8);
            border-radius: 4px;
            box-shadow: 1px 2px 15px rgba(0,0,0,0.3);
            display: flex;
            flex-direction: column;

            //transform: translateY(-50%);

            .event-modal-header {
                flex: 0 1 auto;
                display: flex;
                width: 100%;
                align-items: flex-start;
                color: #fff;
                padding: 1em 2.2em;

                .event-modal-title {
                    flex: 1 1 100%;
                    font-size: 1.3em;
                    font-weight: bold;

                    .event-modal-dates {
                        font-size: .8em;
                        color: #dfdfdf;
                        font-weight: 300;
                    }
                }

                .event-modal-close {
                    flex: 0 1 auto;

                    > a {
                        color: #fff;

                        &:hover {
                            text-decoration: none;
                            color: $primary;
                        }
                    }
                }
            }

            .event-modal-body {
                color: #dfdfdf;
                padding: 0 1.2em;
                flex: 1 1 100%;
                overflow: auto;
                margin: 1em;

                &::-webkit-scrollbar {
                    width: 11px;
                }

                scrollbar-width: thin;
                scrollbar-color: $primary;

                &::-webkit-scrollbar-track {
                    background: transparent;
                }

                &::-webkit-scrollbar-thumb {
                    background-color: transparent;
                    border-radius: 20px;
                    border: 3px solid #bbb;
                }
            }
        }
    }

    .card-holder {
        overflow-x: hidden;

        @media only screen and (max-width: 1040px) {
            max-width: 500px;
        }
    }

    .news-card {
        justify-content: center;
    }

    .card-scroller {
        transition: all .3s ease;
    }

    .event-card {
        padding: 10px;
    }

    .card-event {
        @media only screen and (min-width: 760px) {
            height: 100%;
        }
    }

    .event-image-holder {
        height: 25%;

        @media only screen and (min-width: 769px) {
            height: 100%;
        }

        .p {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }

    .scroller-navigation {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;

        a {
            .icon {
                width: 50px;
                height: 50px;
            }
        }
    }
</style>
