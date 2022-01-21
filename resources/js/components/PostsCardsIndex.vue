<template>
    <div class="posts-index pt-3 pb-3 has-background-light shadow-top" v-if="postData">
        <div class="container">
            <div class="columns">
                <div class="column is-offset-1">
                    <b-loading :is-full-page="true" :active="loading"></b-loading>
                    <div class="columns">
                        <div class="column is-9">
                            <div class="columns is-multiline">
                                <div class="column is-5-desktop is-12-tablet posts-card"  v-for="post in postData.data.slice(0, 4)" :key="post.id">
                                    <posts-card :post="post" :mediaType="mediaType" :action="shareAction" :siteKey="siteKey"></posts-card>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="has-background-white p-2 media-sidebar">
                                <h1 class="title is-5" :style="titleColor">
                                    RECENT POSTS
                                </h1>
                                <p>
                                <strong class="light-blue-text">
                                        2019  >
                                </strong>
                                </p>
                                    <ul>
                                        <li v-for="post in postData.data.slice(0, 3)" :key="post.id" class="mt-1">
                                            <a :href="post.show_url" class="has-text-grey-light" v-if="post.show_url">{{ post.title }}</a>
                                            <a :href="post.link" class="has-text-grey-light" v-if="post.link">{{ post.title }}</a>        
                                        </li> 
                                    </ul>
                                <hr>
                                <h1 class="title is-5" :style="titleColor">
                                    OLDER POSTS
                                </h1>
                                <p class="mb-2">
                                    <strong>
                                        Select the year of interest below  
                                    </strong>
                                </p>
                                <custom-dropdown :options="dropdownOptions" :placeholder="placeholder" :bgColor="bgColor" :show-selected="true"></custom-dropdown>
                                <ul>
                                    <li v-for="post in postData.data" :key="post.id" class="mt-1 has-text-grey-light">
                                        <a :href="post.show_url" class="has-text-grey-light" v-if="post.show_url">{{ post.title }}</a> 
                                        <a :href="post.link" class="has-text-grey-light" :target="post.content === null ? '_blank' : null " v-if="post.link">{{ post.title }}</a> 
                                    </li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column has-text-centered" >
                            <a :href="scrollToNextSection"><img src="/images/icons/arrow-down-line.svg" alt="" class="arrow-down-line"></a>
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
            mediaType: String,
            shareAction: String,
            siteKey: String,
            nextSectionId: {
                type: String,
                default: 'coverage',
            },
            endpoint: {
                type: String,
                required: true,
            },
            perPage: {
                type: Number,
                default: 3,
            },
            showButtons: {
                type: Boolean,
                default: false,
            },
            apiShowUrl: String,
        },
        data () {
            return {
                placeholder: 'Select a year...',
                postData: null,
                loading: false,
                apiPostShow: this.apiShowUrl,
                shareDialogue: false,
                dropdownOptions: [
                    {
                        title: '2019',
                        value: 2019,
                    }
                ],
                titleColor: 'color:' + this.bgColor + ';',
                scrollToNextSection: '#' + this.nextSectionId,
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
    .posts-index {
        /* box-shadow: inset 0px 0px 20px 0px rgba(50, 50, 50, 0.3); */

        .list, .card {
            box-shadow: none;
        }

        .light-blue-text {
            color: #00aac5;
        }

        .card {
            height: 100%;

            .card-image {
                position: relative;
                width: 100%;
                height: 300px;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                
                .image {
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                }

                .inset-shadow {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
                    /* box-shadow: inset 0px 0px 11px 0px rgba(50, 50, 50, 0.75); */
                }

                .share-box {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    background-color: transparentize($color: #000000, $amount: 0.2);
                    top: 0;
                }
            }
        }

        .media-sidebar {
            max-height: 750px;
            max-width: 100%;
            overflow-x: visible;
            overflow-y: scroll;
        }

        .card-links {
            .icon {
                margin-right: 20px;
                color: #d4555a !important;
            }

            .list-item {
                display: flex;
                align-items: center;

                &:hover {
                    background-color: transparentize( #000000, 0.9) !important;
                }
            }
        }

        .arrow-down-line {
            max-width: 50px;
        }
    }
</style>
