<template>
    <div class="post-image-selector">
        <input type="hidden" id="photo-list" :value="pastedContent">
        <div class="button is-dark is-outlined"
            @click="isPhotoSelectorActive = true">
            Add Images to Post    
        </div>
        <b-modal :active.sync="isPhotoSelectorActive">
            <div class="card">
                <div class="card-content">
                    <div class="columns is-multiline">
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
                                                <a @click="copyToClipboard(image)" class="button is-primary is-outlined">Copy Link</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </b-modal>
    </div>
</template>

<script>
export default {
    props: {
        images: Array,
    },
    data () {
        return {
            isPhotoSelectorActive: false,
            pastedContent: null,
        }
    },
    methods: {
        copyToClipboard (image) {
            this.pastedContent = image.copy_url;
            this.isPhotoSelectorActive = false;
        }
    }
}
</script>

<style lang="scss">

</style>
