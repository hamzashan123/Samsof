<template>
    <div class="content-editor">
        <input type="hidden" :name="name" v-model="content">
        <input type="hidden" id="photo-list" :value="pastedContent">
        <textarea class="textarea content-textarea"></textarea>

        <b-modal :active.sync="isPhotoSelectorActive">
            <div class="card">
                <div class="card-content">
                    <div class="columns is-multiline" v-if="images && images.length">
                        <div class="column is-one-third" v-for="image in images" :key="image.id">
                            <div class="card h-100">
                                <div class="card-image">
                                    <figure class="image">
                                        <img :src="image.thumbnail" :alt="image.title">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="content">
                                        <p>{{ image.title }}</p>
                                        <div class="field is-grouped">
                                            <p class="control">
                                                <a @click="copyToClipboard(image, mde)"
                                                   class="button is-primary is-outlined">Copy Link</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns" v-else>
                        <div class="column">
                            <div class="content">
                                <p class="is-3">
                                    There are no images. load images by clicking on the <strong>post images</strong> tab
                                    under <strong>MEDIA</strong> and those images will appear here
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </b-modal>
    </div>
</template>

<script>
    import EasyMDE from 'easymde';

    export default {
        props: {
            value: String,
            name: String,
            images: {
                type: Array,
                default: null,
            },
        },
        data () {
            return {
                content: this.value,
                isPhotoSelectorActive: false,
                pastedContent: null,
            }
        },
        methods: {
            copyToClipboard (image, mde) {
                const cm = mde.codemirror;
                const output = '';
                const startPoint = cm.getCursor('start');

                this.pastedContent = '\n' + image.copy_url + '\n';
                this.isPhotoSelectorActive = false;

                cm.replaceSelection(this.pastedContent);
            },
            showPhotoSelector () {
                this.isPhotoSelectorActive = true;
            }
        },
        mounted () {
            this.mde = new EasyMDE({
                spellChecker: false,
                toolbar: [
                    {
                        name: "bold",
                        action: EasyMDE.toggleBold,
                        className: "fa fa-bold",
                        title: "Bold",
                    },
                    {
                        name: "italic",
                        action: EasyMDE.toggleItalic,
                        className: "fa fa-italic",
                        title: "Italic",
                    },
                    {
                        name: "heading",
                        action: EasyMDE.toggleHeadingBigger,
                        className: "fa fa-header",
                        title: "Heading",
                    },
                    "|",
                    {
                        name: "quote",
                        action: EasyMDE.toggleBlockquote,
                        className: "fa fa-quote-left",
                        title: "Quote",
                    },
                    {
                        name: "unordered-list",
                        action: EasyMDE.toggleUnorderedList,
                        className: "fa fa-list-ul",
                        title: "Bulleted List",
                    },
                    {
                        name: "ordered-list",
                        action: EasyMDE.toggleOrderedList,
                        className: "fa fa-list-ol",
                        title: "Numbered List",
                    },
                    "|",
                    {
                        name: "link",
                        action: EasyMDE.drawLink,
                        className: "fa fa-link",
                        title: "Insert Link",
                    },
                    {
                        name: "image",
                        action: this.showPhotoSelector,
                        className: "fa fa-picture-o",
                        title: "Insert Image",
                    },
                    "|",
                    {
                        name: "preview",
                        action: EasyMDE.togglePreview,
                        className: "fa fa-eye",
                        title: "Toggle Preview",
                    },
                    {
                        name: "side-by-side",
                        action: EasyMDE.toggleSideBySide,
                        className: "fa fa-columns",
                        title: "Toggle Side by Side",
                    },
                    {
                        name: "fullscreen",
                        action: EasyMDE.toggleFullScreen,
                        className: "fa fa-arrows-alt",
                        title: "Toggle Fullscreen",
                    },
                    "|",
                    {
                        name: "guide",
                        action: "https://www.markdownguide.org/basic-syntax/",
                        className: "fa fa-question-circle",
                        title: "Markdown Guide",
                    },
                ]
            });

            this.mde.value(this.content);

            this.mde.codemirror.on('change', () => {
                this.content = this.mde.value();
            });
        }
    };
</script>

<style lang="scss">
</style>
