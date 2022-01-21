<template>
    <div class="posts-index pt-3 pb-3 has-background-white" v-if="postData">
        <div class="container">
            <div class="columns">
                <div class="column is-offset-1">
                    <b-loading :is-full-page="true" :active="loading"></b-loading>
                    <div class="columns" v-if="!sectionTitleInside">
                        <div class="column is-3">
                            <h1 class="title is-4" v-if="sectionTitle" :style="titleColor">
                                {{ sectionTitle }}
                            </h1>
                            <p>
                                Select the year of interest below:
                            </p>
                            <custom-dropdown :options="dropdownOptions" :placeholder="placeholder" :bgColor="bgColor" :show-selected="true"></custom-dropdown>
                        </div>
                    </div>
                    <div class="columns is-gapless" v-if="postData">
                        <div class="column">
                            <div class="list-post-controller">
                                <div class="button-holder button-left">
                                    <a @click="getPosts(previousPage)" v-if="hasPrevious" :style="titleColor">
                                        <span class="icon">
                                            <span class="mdi mdi-chevron-left"></span>
                                        </span>
                                    </a>
                                </div>
                                <div class="posts-container list-posts-container">
                                    <div class="posts-title pt-2 pl-2" v-if="sectionTitleInside">
                                        <h1 class="title is-4" :style="titleColor">
                                            {{ sectionTitle }}
                                        </h1>
                                    </div>
                                    <div class="posts-holder">
                                        <div class="list-post-item" v-for="post in postData.data" :key="post.id" :class="[backgroundClass ? 'yellow-item' : null, sectionTitleInside ? 'has-placeholder' : null]">
                                            <post-list :post="post" :sectionTitleInside="sectionTitleInside" :opinionsLinks="opinionsLinks" :showCardImage="showCardImage" :mediaPlaceholder="mediaPlaceholder" :action="shareAction" :siteKey="siteKey"></post-list>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-holder button-right">
                                    <a @click="getPosts(nextPage)" v-if="hasNext" :style="titleColor">
                                        <span class="icon">
                                            <span class="mdi mdi-chevron-right"></span>
                                        </span>
                                    </a>
                                </div>
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
            bgColor: String,
            fgColor: String,
            mediaPlaceholder: String,
            shareAction: String,
            siteKey: String,
            opinionsLinks: {
                type: Boolean,
                default: false,
            },
            sectionTitleInside: {
                type: Boolean,
                default: false,
            },
            backgroundClass: {
                type: Boolean,
                default: false,
            },
            sectionTitle: {
                type: String,
                default: null,
            },
            showDropdown: {
                type: Boolean,
                default: false,
            },
            endpoint: {
                type: String,
                required: true,
            },
            showCardImage: {
                type: Boolean,
                default: false,
            },
            perPage: {
                type: Number,
                default: 10,
            }
        },
        data () {
            return {
                placeholder: 'Select a year...',
                postData: null,
                loading: false,
                dropdownOptions: [
                    {
                        title: '2019',
                        value: 2019,
                    }
                ],
                titleColor: 'color:' + this.bgColor + ';',
            }
        },
        computed: {
            hasPrevious () {
                return this.postData ? this.postData.meta.current_page > 1 : false;
            },
            previousPage () {
                return this.hasPrevious ? this.postData.meta.current_page -1 : null;
            },
            hasNext () {
                return this.postData ? this.postData.meta.current_page < this.postData.meta.last_page : false;
            },
            nextPage () {
                return this.hasNext ? this.postData.meta.current_page + 1 : null;
            }
        },
        methods: {
            getPosts (page) {
                this.loading = true;

                axios({
                    method: 'get',
                    url: this.endpoint,
                    params: {
                        paginate: this.perPage,
                        page: page,
                    }
                }).then(response => {
                    this.postData = response.data;
                    this.loading = false;
                });
            }
        },
        mounted () {
            this.getPosts();
        }
    }
</script>

<style lang="scss">
    @import '../../sass/public/variables';
    .posts-index {
        position: relative;
        
        .list-posts-container {
            width: 100%;
        }

        .list, .card {
            box-shadow: none;
        }

        .list-post-controller {
            display: flex;
            justify-content: center;
            align-items: stretch;
            height: 100%;
            position: relative;
            background-color: #efefee;

            .button-holder {
                position: absolute;
                z-index: 5;
                top: 50%;
                background-color: #fff;
                box-shadow: inset 0px 0px 5px 0px rgba(50, 50, 50, 0.3);
                border-radius: 100%;

                .icon {
                    font-size: 40px;
                    width: 50px;
                    height: 50px;
                }
            }

            .button-right {
                right: 0;
                transform: translate(50%, -50%);
            }

            .button-left {
                left: 0;
                transform: translate(-50%, -50%);
            }

            .posts-title {
                background-color: #efefee;
                width: 100%;
            }

            .posts-holder {
                display: flex;
                justify-content: center;
                align-items: stretch;
                background-color: #efefee;
                flex-direction: column;

                @media only screen and (min-width: map_get($grid-breakpoints, md)) {
                    flex-direction: row;
                }

                .list-post-item {
                    flex: 0 0 33.3%;
                    background-color: #efefee;
                    position: relative;

                    .post-divider {
                        width: 30px;
                        height: 8px;
                        background-color: #27b473;
                    }

                    &:before {
                        content: "";
                        position: absolute;
                        width: 1px;
                        height: 90%;
                        background-color: #fff;
                        top: 50%;
                        transform: translateY(-50%);
                        left: 0;
                        z-index: 2;
                    }

                    &:first-child {
                        &:before {
                            width: 5px;
                            background-color: #27b473;
                            max-height: 280px;
                        }
                    }

                    &.has-placeholder {
                        &:before {
                            top: 37px;
                            transform: translateY(0);
                        }
                    }

                    &.yellow-item {
                        &:first-child {
                            &:before {
                                background-color: #f6ab20;
                            }
                        }
                    }

                    .custom-list {
                        background-color: #efefee !important;
                        border-bottom: none !important;
                    }

                    .card {
                        background-color: transparentize(#000000, 1)
                    }
                }
            }

            .card-links {
                .icon {
                    margin-right: 20px;
                    color: #d4555a !important;
                }
            }
        }
    }
</style>
