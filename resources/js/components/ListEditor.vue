<template>
    <div class="list-editor">
        <div class="card" :class="{ 'border-danger' : error }">
            <div class="card-header">
                <div class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <p class="card-header-title">
                                {{ label }}
                            </p>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <button class="button is-small" type="button" @click.prevent="createListItem">
                                <span class="icon">
                                    <fa icon="plus"></fa>
                                </span>
                                <span>
                                    Add {{ label }}
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <table class="table is-fullwidth">
                    <tr v-for="(item, index) in listItems" :key="item">
                        <td>
                            <strong>{{ item }}</strong>
                            <input type="hidden" :name="name + '[]'" :value="item">
                        </td>
                        <td class="">
                            <a href="#" @click.prevent="editListItem(item)">Edit</a> |
                            <a href="#" @click.prevent="removeListItem(item)">Delete</a> |
                            <a href="#" @click.prevent="moveUp(item)" v-if="index > 0"><fa icon="arrow-up"></fa></a>
                            <template v-if="index !== 0 && index < items.length - 1">|</template>
                            <a href="#" @click.prevent="moveDown(item)" v-if="index < items.length -1"><fa icon="arrow-down"></fa></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <b-modal :active.sync="isCardModalActive" has-modal-card>
            <div class="modal-card">
                <form method="post" action="#" @submit.prevent="persistListItem">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Add list item</p>
                    </header>
                    <section class="modal-card-body">
                        <div class="form-group">
                            <label>List Item</label>
                            <input type="text" v-model="editor.value" class="input" />
                        </div>
                    </section>
                    <div class="modal-card-foot">
                        <button type="button" class="button is-danger" data-dismiss="modal" @click="closeEditor">Cancel</button>
                        <button class="button is-success">
                            <template v-if="editing">
                                Update
                            </template>
                            <template v-else>
                                Add
                            </template>
                        </button>
                    </div>
                </form>
            </div>
        </b-modal>
        
    </div>
</template>

<script>
    export default {
        props: {
            items: Array,
            name: String,
            label: String,
            error: Boolean,
        },
        data () {
            return {
                editor: {
                    value: null,
                },
                showing: false,
                editing: null,
                listItems: this.items,
                isCardModalActive: false,
            }
        },
        computed: {
            jsonItems () {
                return JSON.stringify(this.listItems);
            }
        },
        methods: {
            moveUp (item) {
                const index = this.listItems.indexOf(item);
                if (index > 0) {
                    const i = this.listItems.splice(index, 1);
                    this.listItems.splice(index - 1, 0, ...i);
                }
            },
            moveDown (item) {
                const index = this.listItems.indexOf(item);
                if (index < this.listItems.length -1) {
                    const i = this.listItems.splice(index, 1);
                    this.listItems.splice(index + 1, 0, ...i);
                }
            },
            persistListItem () {
                if (this.editing) {
                    this.updateListItem();
                } else {
                    this.listItems.push(this.editor.value);
                    this.closeEditor();
                }
            },
            updateListItem () {
                const index = this.listItems.indexOf(this.editing);
                this.$set(this.listItems, index, this.editor.value);
                this.closeEditor();
            },
            createListItem () {
                this.editor = {
                    value: null,
                };
                this.isCardModalActive = true;
            },
            editListItem (item) {
                this.editing = item;
                this.editor.value = item;
                this.showEditor();
            },
            removeListItem (item) {
                const index = this.listItems.indexOf(item);
                this.listItems.splice(index, 1);
            },
            closeEditor () {
                this.editing = null;
                this.isCardModalActive = false;
            }
        }
    }
</script>

<style scoped>

</style>
