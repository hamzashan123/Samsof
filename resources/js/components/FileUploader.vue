<template>
    <div class="file-uploader">
        <input type="hidden" :name="name" v-model="tempFilename">
        <div :class="name + '-file-input'"></div>
        <div :class="name + '-status-bar'"></div>
        <div :class="name + '-informer'"></div>
    </div>
</template>

<script>
    import Uppy from '@uppy/core';
    import FileInput from '@uppy/file-input';
    import StatusBar from '@uppy/status-bar';
    import XHRUpload from '@uppy/xhr-upload';
    import Informer from '@uppy/informer';
    import '@uppy/status-bar/dist/style.min.css';
    import '@uppy/file-input/dist/style.min.css';
    import '@uppy/informer/dist/style.min.css';

    export default {
        props: {
            name: String,
            endpoint: String,
            label: {
                type: String,
                default: 'Choose Files',
            }
        },
        data () {
            return {
                tempFilename: null,
            }
        },
        methods: {
            initUppy () {
                const uppy = Uppy({
                    autoProceed: true,
                    restrictions: {
                        maxNumberOfFiles: 1,
                        maxFileSize: 1024 * 1000 * 50,
                        allowedFileTypes: ['.pdf'],
                    },
                    meta: {
                        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                }).use(FileInput, {
                    target: '.' + this.name + '-file-input',
                    locale: {
                        strings: {
                            chooseFiles: this.label
                        }
                    }
                }).use(StatusBar, {
                    target: '.' + this.name + '-status-bar',
                    hideUploadButton: true,
                    hideRetryButton: true,
                    hidePauseResumeButton: true,
                    hideCancelButton: true,
                    hideAfterFinish: false,
                }).use(Informer, {
                    target: '.' + this.name + '-informer',
                }).use(XHRUpload, {
                    endpoint: this.endpoint,
                    fieldName: 'file',
                }).on('upload-success', (file, response) => {
                    this.tempFilename = response.body.temp;
                    this.$emit('uploaded', {
                        temp: this.tempFilename,
                    })
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
