<template>
    <div class="registration-form-hospital">
        <div class="card">
            <div class="card-header">
                <p class="card-header-title">
                    Hospital / practice
                </p>
            </div>
            <div class="card-content">

                <div class="notification is-danger" v-if="errors">
                    {{ firstErrorMessage }}
                </div>

                <table class="table is-fullwidth" v-if="memberHospitals.length">
                    <tr v-for="hospital in memberHospitals" :key="hospital.id">
                        <td>{{ hospital.title }}</td>
                        <td class="has-text-right">
                            <a href="#" @click.prevent="remove(hospital)">Remove</a>
                        </td>
                    </tr>
                </table>

                <template v-else>
                    <p class="content">
                        Make sure you select at least one hospital or practice.
                    </p>
                </template>

                <template v-if="!editing">
                    <label class="label">Select a hospital or practice to add</label>
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <div class="control is-expanded">
                                    <div class="select">
                                        <select v-model="selected">
                                            <option v-for="hospital in hospitals" :value="hospital" :key="'hospital-' + hospital.id">
                                                {{ hospital.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            Is your hospital not listed?
                            <a href="#" @click.prevent="showEditor">Add it.</a>
                        </div>
                        <div class="column">
                            <button class="button" type="button" @click.prevent="addSelected">Add</button>
                        </div>
                    </div>
                </template>

                <div class="card" v-if="editing">
                    <div class="card-header">
                        <p class="card-header-title">Add a hospital</p>
                    </div>
                    <div class="card-content">
                        <div class="field">
                            <label class="label">Country</label>
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select v-model="editor.country">
                                        <option v-for="country in countries" :value="country.id" :key="'country-' + country.id">
                                            {{ country.title }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">City</label>
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select v-model="editor.city">
                                        <option v-for="city in availableCities" :value="city.id" :key="'city-' + city.id">
                                            {{ city.title }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Hospital</label>
                            <div class="control">
                                <input type="text" class="input" v-model="editor.title">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-footer-item">
                            <button class="button" type="button" @click.prevent="closeEditor">Cancel</button>
                        </div>
                        <div class="card-footer-item">
                            <button class="button is-primary" @click.prevent="saveEditor">Save</button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Hospital",
        props: {
            member: Object,
            countries: Array,
            cities: Array,
            hospitals: Array,
            errors: Object,
        },
        data () {
            return {
                memberHospitals: this.member ? this.member.hospitals : [],
                newCounter: 1,
                selected: null,
                editing: false,
                editor: {
                    country: null,
                    city: null,
                    title: null,
                }
            }
        },
        computed: {
            availableCities () {
                if (this.editor.country) {
                    return this.cities.filter(city => city.country_id === this.editor.country);
                }
                return [{id: null, title: 'Select a country first'}];
            },
            firstErrorMessage () {
                if (!this.errors) {
                    return null;
                }

                return this.errors[Object.keys(this.errors)[0]][0]
            }
        },
        watch: {
            memberHospitals () {
                this.$emit('input', this.memberHospitals);
            }
        },
        methods: {
            clearEditor () {
                this.editor = {
                    country: null,
                    city: null,
                    title: null,
                }
            },
            showEditor () {
                this.clearEditor();
                this.editing = true;
            },
            closeEditor () {
                this.editing = false;
                this.clearEditor();
            },
            addSelected () {
                this.memberHospitals.push(this.selected);
                this.selected = null;
            },
            saveEditor () {
                this.memberHospitals.push({
                    country: this.editor.country,
                    city_id: this.editor.city,
                    title: this.editor.title,
                    id: 'new-'+this.newCounter,
                });
                this.newCounter++;
                this.closeEditor();
            },
            remove (hospital) {
                this.memberHospitals.splice(this.memberHospitals.indexOf(hospital), 1);
            }
        },
        mounted () {
            this.$emit('input', this.memberHospitals);
        }
    }
</script>

<style scoped>

</style>
