<template>
    <div>
        <div class="field">
            <div class="control">
                <div class="select">
                    <select v-model="selected" name="media_type">
                        <option disabled :selected="!selected">Select Media Type</option>
                        <option v-for="(type, key) in mediaTypes" :value="key" :key="key">{{ type.label }}</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="media-type-editor">
            <template v-if="selectedMediaType && selectedMediaType.imageUploader">
                <uploader name="image"
                    :allowedFileTypes="selectedMediaType.allowedFileTypes"
                    :image="image"
                    :endpoint="selectedMediaType.endpoint"></uploader>
            </template>
            <template v-if="selectedMediaType && selectedMediaType.pdfUploader">
                <file-uploader name="pdf" 
                    :endpoint="selectedMediaType.endpoint"></file-uploader>
            </template>
            <template v-if="selectedMediaType && selectedMediaType.linkInput">
                <input type="text" class="input" :value="computedMediaLink">
            </template>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        selectedOption: String,
        mediaLink: String,
        image: {
            type: String,
            default: null,
        },
        imageEndpoint: {
            type: String,
            required: true,
        },
        pdfEndpoint: {
            type: String,
            required: true,
        },
    },
    computed: {
        computedMediaLink () {
            return this.mediaLink ? this.mediaLink :
                (this.selected ? this.mediaTypes[this.selected].prefix : null);
        },
        selectedMediaType () {
            return this.selected ? this.mediaTypes[this.selected] : null;
        },
    },
    data () {
        return {
            mediaTypes: {
                youtube: {
                    label: 'YouTube',
                    prefix: 'https://www.youtube.com/',
                    imageUploader: false,
                    pdfUploader: false,
                    linkInput: true,
                },
                photo: {
                    label: 'Photo',
                    imageUploader: true,
                    pdfUploader: false,
                    endpoint: this.imageEndpoint,
                    allowedFileTypes: [
                        'image/jpeg',
                        'image/png',
                    ],
                    linkInput: false,
                },
                document: {
                    label: 'Document',
                    imageUploader: false,
                    pdfUploader: true,
                    endpoint: this.pdfEndpoint,
                    allowedFileTypes: [
                        '.pdf',
                    ],
                    linkInput: false,
                },
                vimeo: {
                    label: 'Vimeo',
                    prefix: 'https://www.vimeo.com/',
                    imageUploader: false,
                    pdfUploader: false,
                    linkInput: true,
                },
            },
            selected: this.selectedOption,
        }
    }
}
</script>
<style lang="scss" scoped>

</style>
