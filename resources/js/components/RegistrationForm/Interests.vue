<template>
    <div class="registration-form-interests">
        <div class="columns">
            <div class="column">
                <div class="mb-1"><strong>Maxillofacial field of interest</strong></div>
                <table class="table is-fullwidth" v-if="editor.interests.length">
                    <tr v-for="interest in editor.interests" :key="interest">
                        <td>{{ interest }}</td>
                        <td class="has-text-right">
                            <a href="#" @click.prevent="removeInterest(interest)">Remove</a>
                        </td>
                    </tr>
                </table>
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input type="text" v-model="interestTitle" @keypress.enter="addInterest"
                               class="input" placeholder="Enter an interest and click Add">
                    </div>
                    <div class="control">
                        <button class="button is-primary" @click.prevent="addInterest" :disabled="!canAdd">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Interests",
        props: {
            member: Object,
            errors: Object,
        },
        data () {
            return {
                interestTitle: null,
                editor: {
                    interests: [],
                },
            }
        },
        watch: {
            editor: {
                handler () {
                    this.$emit('input', this.editor);
                },
                deep: true,
            }
        },
        computed: {
            canAdd () {
                return this.interestTitle
                    && this.interestTitle.length > 0
                    && !this.editor.interests.includes(this.interestTitle);
            },
            years () {
                let now = new Date().getFullYear();
                return Array(100).fill('').map((v, i) => now - i);
            }
        },
        methods: {
            addInterest () {
                this.editor.interests.push(this.interestTitle);
                this.interestTitle = null;
            },
            removeInterest (interest) {
                const index = this.editor.interests.indexOf(interest);
                this.editor.interests.splice(index, 1);
            }
        },
        mounted () {
            if (this.member) {
                this.editor.interests = this.member.interests
            }
            this.$emit('input', this.editor);
        }
    }
</script>

<style scoped>

</style>
