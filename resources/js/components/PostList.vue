<template>
    <div class="card post-list">
        <b-modal :active.sync="shareDialogue">
            <div class="card has-background-white">
                <div class="card-content">
                    <p class="subtitle is-5">
                        Share: <strong class="has-text-primary">{{ post.title }}</strong> via Email
                    </p>
                    <form :action="action" method="post">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="link" :value="post.share_url">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" type="text" placeholder="Name" name="name">
                                <span class="icon is-medium is-left">
                                    <fa icon="user"></fa>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" type="text" placeholder="Email" name="email">
                                <span class="icon is-medium is-left">
                                    <fa icon="envelope"></fa>
                                </span>
                            </div>
                        </div>
                        <recaptcha name="recaptcha" :siteKey="siteKey"></recaptcha>
                        <button class="button is-primary" type="submit">
                            <span class="icon">
                                <fa icon="envelope"></fa>
                            </span>
                            <span>
                                Share
                            </span>
                        </button>
                        <a class="button is-danger" @click="shareDialogue = false">
                            <span class="icon">
                                <fa icon="ban"></fa>
                            </span>
                            <span>
                                Cancel
                            </span>
                        </a>
                    </form>
                </div>
            </div>
        </b-modal>
        <div class="card-image p-2" v-if="showCardImage" >
            <div class="image is-4by3" :style="postBackgroundImage(post)">
                <img :src="mediaPlaceholder" alt="">
            </div>
        </div>
        <div class="card-content">
            <p v-if="post.presentable_published_date">
                {{ post.presentable_published_date }}
            </p>
            <p class="title is-4">
                {{ post.title }}
            </p>
            <hr v-if="sectionTitleInside" class="post-divider">
            <div class="list card-links">
                <div v-if="opinionsLinks">
                    <a class="list-item custom-list has-text-danger" :href="post.pdf_download" target="_blank">
                        <span class="icon is-medium">
                            <img src="images/icons/pdf.svg">
                        </span>
                        <span>
                            Download PDF
                        </span>
                    </a>
                    <a class="list-item custom-list has-text-danger" :href="post.show_url">
                        <span class="icon is-medium">
                            <img src="images/icons/read-more.svg">
                        </span>
                        <span>
                            Read More
                        </span>
                    </a>
                    <a class="list-item custom-list has-text-danger" @click="showShareDialogue(post)">
                        <span class="icon is-medium">
                            <img src="images/icons/share.svg">
                        </span>
                        <span>
                            Share
                        </span>
                    </a>
                </div>
                <div v-else>
                    <a class="list-item custom-list has-text-danger" :href="post.link" v-if="post.link" target="_blank">
                        <span class="icon is-medium">
                            <img src="images/icons/youtube.svg">
                        </span>
                        <span>
                            View Video
                        </span>
                    </a>
                    <a class="list-item custom-list has-text-danger" :href="post.image_url" v-if="post.image_url" target="_blank">
                        <span class="icon is-medium">
                            <img src="images/icons/download.svg">
                        </span>
                        <span>
                            Download
                        </span>
                    </a>
                    <a class="list-item custom-list has-text-danger" :href="post.pdf_file_url" v-if="post.pdf_file_url" target="_blank">
                        <span class="icon is-medium">
                            <img src="images/icons/download.svg">
                        </span>
                        <span>
                            Download
                        </span>
                    </a>
                    <!-- <a class="list-item custom-list has-text-danger">
                        <span class="icon is-medium">
                            <img src="images/icons/preview.svg">
                        </span>
                        <span>
                            Preview
                        </span>
                    </a> -->
                    <a class="list-item custom-list has-text-danger" @click="showShareDialogue(post)">
                        <span class="icon is-medium">
                            <img src="images/icons/share.svg">
                        </span>
                        <span>
                            Share
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            post: Object,
            showCardImage: Boolean,
            sectionTitleInside: Boolean,
            opinionsLinks: Boolean,
            mediaPlaceholder: String,
            action: String,
            siteKey: String,
        },
        data () {
            return {
                shareDialogue: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        methods: {
            showShareDialogue (post) {
                this.shareDialogue = true;
            },
            postBackgroundImage (post) {
                return {
                    backgroundImage: 'url(\'' + post.cover_url + '\')',
                }
            },
        }
    }
</script>