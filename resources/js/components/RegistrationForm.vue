<template>
    <div class="registration-form">
        <div class="registration-success" v-if="successMessage">
            <div class="success-body content">
                <h1>Thank you!</h1>
                <p>
                    <strong>Thank you for taking the time to complete the SASMFOS membership registration form</strong>
                </p>
                <p>
                    We will now verify the details you have submitted and you will be notified when you'll be able to
                    log into your SASMFOS members account.
                </p>
                <button class="button is-primary" @click.prevent="hideSuccessMessage()">OK</button>
            </div>
        </div>
        <form method="post" action="#" @submit.prevent="submitRegistration">
            <div class="container mb-4">
                <div class="columns">
                    <div class="column is-offset-1 is-6">
                        <General v-model="editor.general" :errors="this.errors"></General>
                        <hr>
                        <Interests v-model="editor.interests" :errors="this.errors"></Interests>
                        <hr>
                        <Qualifications v-model="editor.qualifications" :errors="this.errors"></Qualifications>
                        <hr>
                        <Hospital :countries="countries"
                                  :cities="cities"
                                  :hospitals="hospitals"
                                  v-model="editor.hospital"
                                  :errors="this.errors"></Hospital>

                        <b-notification :closable="false" class="mt-3 " type="is-danger" role="alert" v-if="this.errors">
                            We've picked up some errors in your submission. Please double check the form above and try again.
                        </b-notification>

                        <div class="has-text-right">
                            <hr>
                            <button class="button is-primary">REGISTER</button>
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
    export default {
        name: "RegistrationForm",
        components: {Interests, Qualifications, Hospital, General},
        props: {
            countries: Array,
            cities: Array,
            hospitals: Array,
            registered: Boolean,
        },
        data () {
            return {
                activeStep: 0,
                successMessage: this.registered,
                errors: null,
                editor: {
                    general: null,
                    interests: null,
                    qualifications: null,
                    hospital: null,
                }
            }
        },
        methods: {
            submitRegistration () {
                let data = {
                    ...this.editor.general,
                    ...this.editor.interests,
                    ...this.editor.qualifications,
                    ...{hospitals: this.editor.hospital},
                };

                axios.post('/app/register', data).then(response => {
                    if (response.data.success) {
                        this.successMessage = true;
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

<style lang="scss">
    @import '../../sass/public/variables';

    .registration-form {
        .registration-success {
            background: rgba(0,0,0,0.8);
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom:0;
            z-index: 500;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .success-body {
            border-radius: 10px;
            background: rgba(0,0,0,0.5);
            padding: 2em;
            box-shadow: 1px 1px 15px rgba(0,0,0,0.4);
            max-width: 400px;
            color: #fff;
            strong {
                color :#fff;
            }
            h1 {
                color: $primary;
            }
        }
    }
</style>
