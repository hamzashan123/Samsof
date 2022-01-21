<template>
    <div class="columns is-multiline">
        <div class="column is-one-fifth pr-2 pt-2 pb-2" v-for="(item, index) in procedureItems" :key="item.title">
            <div class="procedure">
                <div>
                    <p class="subtitle is-5" :class="{ 'less-space' : index == 0 | index == 1 | index == 2 | index == 3 | index == 4}">
                        <strong :style="textStyle(item)">
                            {{ item.title }}
                        </strong>
                    </p>
                    <hr :style="backgroundStyle(item)" class="procedure-line">
                    <p>
                        {{ item.description }}
                    </p>
                </div>
                <div class="mt-1">
                    <b-button 
                        size="is-small"
                        @click="selectItem(item)"
                        :type="buttonType(item)" 
                        rounded>FIND OUT MORE</b-button>
                </div>
            </div>
        </div>
       <information-modal :selectedItem="selectedItem" 
                            v-if="selectedItem" 
                            :isModalActive="isModalActive"
                            :isProcedure="true"></information-modal>
    </div>
</template>

<script>
export default {
    props: {
        procedureItems: Array,
    },
    data () {
        return {
            selectedItem: null,
            isModalActive: false,
        }
    },
    methods: {
        selectItem (item) {
            if (this.selectedItem = item) {
                this.selectedItem = null;
            }

            this.selectedItem = item;
            this.isModalActive = true;
        },
        buttonType (item) {
            if (item.color === '#f9ac1d') {
                return 'is-warning';
            }

            if (item.color === '#28b573') {
                return 'is-success';
            }

            if (item.color === '#00aac5') {
                return 'is-info';
            }

            if (item.color === '#056cb6') {
                return 'is-primary';
            }

            if (item.color === '#d3545a') {
                return 'is-danger';
            }
        },
        textStyle (item) {
            return {
                color: item.color,
            }
        },
        backgroundStyle (item) {
            return {
                backgroundColor: item.color,
            }
        }
    }
}
</script>


<style lang="scss">
    .procedure {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        .procedure-line {
            margin: 12px 0;

            @media screen and (min-width: 768px) {
                margin: 24px 0;
            }
        }

        .subtitle {
            margin-bottom: 10px;

            @media screen and (min-width: 770px) {
                height: 100px;
                margin-bottom: 24px;

                &.less-space {
                    height: 50px;
                }
            }

            @media screen and (min-width: 969px) {
                height: 60px;

                &.less-space {
                    height: 30px;
                }
            }

            @media screen and (min-width: 1408px) {
                height: 40px;
            }
        }
    }
</style>

