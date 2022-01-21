<template>
    <div>
        <b-modal :active.sync="isModalActive">
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <h1 :style="textStyle(selectedItem)" class="title is-3">
                            {{ selectedItem.title }}
                        </h1>
                        <p>
                            <i class="has-text-grey">{{ selectedItem.author }}</i>
                        </p>
                        <div v-html="selectedItem.presentable_content" class="mb-2">
                        </div>
                        <a :href="selectedItem.pdf_download" class="button has-icon" target="_blank">
                            <span class="icon is-small">
                                <img src="/images/icons/pdf.svg" alt="" class="fit-image">
                            </span>
                            <span>
                                Download PDF
                            </span>
                        </a>
                        <a @click="isModalActive = false" class="button is-danger">
                            Close
                        </a>
                    </div>
                    
                </div>
            </div>
        </b-modal>
    </div>
</template>

<script>
export default {
    props: {
        isModalActive: Boolean,
        selectedItem: Object,
    },
    methods: {
        textStyle (selectedItem) {
            return {
                color: selectedItem.color,
            }
        },
    }
}
</script>

<style lang="scss">
    .item-content {
        p {
            margin-bottom: 10px;
        }
    }
</style>

