<template>
    <div class="account-editor">
        <form method="post" action="#" @submit.prevent="updateMember">
            <div class="container mb-4">
                <div class="columns">
                    <div class="column is-6">
                        <General v-model="editor.general" :member="member" :errors="this.errors"></General>
                        <hr>
                        <Interests v-model="editor.interests" :member="member" :errors="this.errors"></Interests>
                        <hr>
                        <Qualifications v-model="editor.qualifications" :member="member" :errors="this.errors"></Qualifications>
                        <hr>
<!--                        <Speciality :member="member" :specialities="specialities" v-model="editor.specialities"></Speciality>-->
<!--                        <hr>-->
                        <Hospital :member="member"
                                  :countries="countries"
                                  :cities="cities"
                                  :hospitals="hospitals"
                                  v-model="editor.hospitals"
                                  :errors="this.errors"></Hospital>

                        <div class="has-text-right">
                            <hr>
                            <button class="button is-primary">UPDATE</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import General from "./RegistrationForm/General";
    import Hospital from "./RegistrationForm/Hospital";
    import Qualifications from "./RegistrationForm/Qualifications";
    import Interests from "./RegistrationForm/Interests";
    import Speciality from "./RegistrationForm/Speciality";

    export default {
        name: "AccountEditor",
        components: {Speciality, Interests, Qualifications, Hospital, General},
        props: {
            member: Object,
            countries: Array,
            cities: Array,
            hospitals: Array,
            specialities: Array,
        },
        data () {
            return {
                errors: null,
                editor: {
                    general: null,
                    interests: null,
                    qualifications: null,
                    specialities: null,
                    hospitals: null,
                }
            }
        },
        methods: {
            updateMember () {
                let data = {
                    ...this.editor.general,
                    ...this.editor.interests,
                    ...this.editor.qualifications,
                    ...{hospitals: this.editor.hospitals},
                };
                axios.put('/app/account', data).then(response => {
                    if (response.data.success) {
                        this.successMessage = true;
                        window.location.href = response.data.redirect;
                    }
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                });
            },
            hideSuccessMessage () {
                window.location.reload();
            }
        }
    }
</script>

<style scoped>

</style>
