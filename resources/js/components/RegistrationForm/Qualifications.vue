<template>
    <div class="registration-form-qualification">
        <div class="columns">
            <div class="column">
                <div class="columns">
                    <div class="column">
                        <b-field label="University where specialist training was undertaken"
                                 :type="!!getError('university') ? 'is-danger' : ''"
                                 :message="getError('university')">
                            <b-input type="text" v-model="editor.university"></b-input>
                        </b-field>
                    </div>
                    <div class="column">
                        <b-field label="Year registered with HPCSA as MFOS specialist"
                                 :type="!!getError('hpcsa_year') ? 'is-danger' : ''"
                                 :message="getError('hpcsa_year')">
                            <b-select v-model="editor.hpcsa_year" placeholder="Select a year" expanded>
                                <option v-for="year in years" :value="year" :key="year">{{ year }}</option>
                            </b-select>
                        </b-field>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <label class="label">Practice of Maxillofacial surgery</label>
                        <b-radio v-model="editor.practice" native-value="none">None</b-radio><br>
                        <b-radio v-model="editor.practice" native-value="full">Full-time private practice</b-radio><br>
                        <b-radio v-model="editor.practice" native-value="academic">Full-time academic</b-radio><br>
                        <b-radio v-model="editor.practice" native-value="part">Private with part-time academic</b-radio><br>
                    </div>
                    <div class="column">
                        <b-field label="HPCSA registration number*"
                                 :type="!!getError('hpcsa_number') ? 'is-danger' : ''" :message="getError('hpcsa_number')">
                            <b-input type="text" v-model="editor.hpcsa_number"></b-input>
                        </b-field>
                    </div>
                </div>
                <div class="mb-1">
                    <strong>Qualifications</strong>
                </div>
                <table class="table is-fullwidth" v-if="editor.qualifications.length">
                    <tr v-for="qualification in editor.qualifications" :key="qualification">
                        <td>{{ qualification }}</td>
                        <td class="has-text-right">
                            <a href="#" @click.prevent="removeQualification(qualification)">Remove</a>
                        </td>
                    </tr>
                </table>
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input type="text" v-model="qualificationTitle" @keypress.enter="addQualification"
                               class="input" placeholder="Enter the name of a single qualification and click Add">
                    </div>
                    <div class="control">
                        <button class="button is-primary" @click.prevent="addQualification" :disabled="!canAdd">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Qualifications",
        props: {
            member: Object,
            errors: Object,
        },
        data () {
            return {
                qualificationTitle: null,
                editor: {
                    university: null,
                    hpcsa_year: null,
                    hpcsa_number: null,
                    practice: 'none',
                    qualifications: [],
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
                return this.qualificationTitle
                    && this.qualificationTitle.length > 0
                    && !this.editor.qualifications.includes(this.qualificationTitle);
            },
            years () {
                let now = new Date().getFullYear();
                return Array(100).fill('').map((v, i) => now - i);
            }
        },
        methods: {
            addQualification () {
                this.editor.qualifications.push(this.qualificationTitle);
                this.qualificationTitle = null;
            },
            removeQualification (qualification) {
                const index = this.editor.qualifications.indexOf(qualification);
                this.editor.qualifications.splice(index, 1);
            },
            getError (key) {
                return this.errors && this.errors[key]
                    ? this.errors[key][0]
                    : null;
            },
            insertMember () {
                Object.keys(this.editor).forEach(key => {
                    if (this.editor.hasOwnProperty(key)) {
                        this.editor[key] = this.member[key];
                    }
                });
            }
        },
        mounted () {
            if (this.member) {
                this.insertMember();
            }
            this.$emit('input', this.editor);
        }

    }
</script>

<style scoped>

</style>
