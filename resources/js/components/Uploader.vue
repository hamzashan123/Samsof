<template>
    <div class="uploader">
        <input type="hidden" :name="name" v-model="imagePathWithExtension" />
        <div class="preview has-text-centered">
            <img :src="tempImagePath" v-if="tempImagePath" />
        </div>
        <div class="drag-drop"></div>
        <div class="status-bar"></div>
        <div class="informer"></div>
    </div>
</template>

<script>
    import Uppy from "@uppy/core";
    import DragDrop from "@uppy/drag-drop";
    import StatusBar from "@uppy/status-bar";
    import XHRUpload from "@uppy/xhr-upload";
    import Informer from '@uppy/informer';
    import "@uppy/drag-drop/dist/style.min.css";
    import "@uppy/status-bar/dist/style.min.css";
    import '@uppy/informer/dist/style.min.css';

    export default {
        props: {
            name: String,
            image: {
                type: String,
                default: null,
            },
            allowedFileTypes: {
                type: Array,
                default: null
            },
            endpoint: {
                type: String,
                required: true,
            }
        },
        data () {
            return {
                imagePath: null,
                imageExtension: null,
                filename: null,
            }
        },
        computed: {
            tempImagePath () {
                return this.imagePath ? '/images/temp/' + this.imagePath : this.image;
            },
            imagePathWithExtension () {
                return this.imageExtension ? this.imagePath + '.' + this.imageExtension : null;
            }
        },
        methods: {
            initUppy () {
                const uppy = Uppy({
                    autoProceed: true,
                    allowMultipleUploads: false,
                    restrictions: {
                        maxFileSize: 10000 * 1024,
                        allowedFileTypes: this.allowedFileTypes,
                    },
                    meta: {
                        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .use(DragDrop, {
                    target: this.$el.querySelector('.drag-drop')
                })
                .use(StatusBar, {
                    target: this.$el.querySelector('.status-bar'),
                    hideAfterFinish: false,
                    hideUploadButton: true,
                    hidePauseResumeButton: true,
                })
                .use(XHRUpload, {
                    endpoint: this.endpoint,
                    fieldName: 'file',
                }).on('upload-success', (file, response) => {
                    console.log(response);
                    this.imagePath = response.body.temp;
                    this.imageExtension = response.body.ext;
                });
            }
        },
        mounted () {
            this.initUppy();
        }
    }
</script>

<style lang="scss">
</style>