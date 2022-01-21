<template>
    <div class="password-editor">
        <div class="field has-addons">
            <div class="control is-expanded">
                <input type="hidden" :name="name" v-model="password">
                <input type="text" v-model="password" class="input" v-if="show">
                <input type="password" v-model="password" class="input" v-else>
            </div>
            <div class="control">
                <button type="button" class="button" @click="toggleShow">
                    <fa :icon="show ? 'eye-slash' : 'eye'"></fa>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            name: String,
        },
        data () {
            return {
                show: false,
                password: null,
            }
        },
        methods: {
            toggleShow () {
                this.show = !this.show;
            }
        }
    }
</script>

<style scoped>

</style>
