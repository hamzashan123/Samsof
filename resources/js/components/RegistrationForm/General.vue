<template>
    <div class="registration-form-general">
        <b-message type="is-warning">
            Be aware that the following information will be published onto the SASMFOS website:
            <ul>
                <li>First name</li>
                <li>Last name</li>
                <li>Practice email address</li>
                <li>Practice telephone number</li>
                <li>Alternative practice telephone number</li>
                <li>Practice address 1</li>
                <li>Practice address 2</li>
                <li>Hospital / practice</li>
            </ul>
        </b-message>
        <div class="columns">
            <div class="column">
                <b-field label="First name*"
                         :type="!!getError('first_name') ? 'is-danger' : ''"
                         :message="getError('first_name')">
                    <b-input type="text" v-model="editor.first_name"></b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Last name*"
                         :type="!!getError('last_name') ? 'is-danger' : ''"
                         :message="getError('last_name')">
                    <b-input type="text" v-model="editor.last_name"></b-input>
                </b-field>
            </div>
        </div>
        <b-field label="Membership type*"
                 :type="!!getError('membership_type') ? 'is-danger' : ''"
                 :message="getError('membership_type')">
            <div class="block">
                <b-radio v-model="editor.membership_type" native-value="full">Full</b-radio>
                <b-radio v-model="editor.membership_type" native-value="student">Student</b-radio>
                <b-radio v-model="editor.membership_type" native-value="honorary">Honorary</b-radio>
                <b-radio v-model="editor.membership_type" native-value="life">Life</b-radio>
            </div>
        </b-field>
        <b-field label="Practice email address"
                 :type="!!getError('practice_email') ? 'is-danger' : ''"
                 :message="getError('practice_email')">
            <template v-slot:label>
                Practice email address
                <p class="content is-size-7 has-text-weight-normal">
                    (This email will be shared on the SASMFOS website)
                </p>
            </template>
            <b-input type="email" name="practice_email" v-model="editor.practice_email"></b-input>
        </b-field>

        <b-field label="Primary email address*"
                 :type="!!getError('email') ? 'is-danger' : ''"
                 :message="getError('email')">
            <template v-slot:label>
                Primary email address*
                <p class="content is-size-7 has-text-weight-normal">
                    (This email will not be shared on the SASMFOS website. It will be used as your primary email address to
                    log into the members platform and for e-newsletters and important announcements from SASMFOS EXCO)
                </p>
            </template>
            <b-input type="email" name="email" v-model="editor.email"></b-input>
        </b-field>

        <div class="columns">
            <div class="column">
                <b-field label="Practice telephone number*"
                         :type="!!getError('telephone') ? 'is-danger' : ''"
                         :message="getError('telephone')">
                    <b-input type="text" name="telephone" v-model="editor.telephone"></b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Mobile number"
                         :type="!!getError('mobile') ? 'is-danger' : ''"
                         :message="getError('mobile')">
                    <template v-slot:label>
                        Mobile number
                        <p class="content is-size-7 has-text-weight-normal">
                            (This will not be shared on the SASMFOS website.)
                        </p>
                    </template>
                    <b-input type="text" name="mobile" v-model="editor.mobile"></b-input>
                </b-field>
            </div>
        </div>
        <div class="columns">
            <div class="column is-6">
                <b-field label="Alternative practice telephone number"
                         :type="!!getError('alt_telephone') ? 'is-danger' : ''"
                         :message="getError('alt_telephone')">
                    <b-input type="text" name="fax" v-model="editor.alt_telephone"></b-input>
                </b-field>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <b-field label="Practice address 1"
                         :type="!!getError('address') ? 'is-danger' : ''"
                         :message="getError('address')">
                    <b-input type="textarea" rows="5" v-model="editor.address"></b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Practice address 2"
                         :type="!!getError('alt_address') ? 'is-danger' : ''"
                         :message="getError('alt_address')">
                    <b-input type="textarea" rows="5" v-model="editor.alt_address"></b-input>
                </b-field>
            </div>
        </div>

        <b-field label="Date of birth"
                 :type="!!getError('id_number') ? 'is-danger' : ''"
                 :message="getError('id_number')">
            <b-input type="text" name="id_number" v-model="editor.id_number" placeholder="dd/mm/yyyy"></b-input>
        </b-field>
    </div>
</template>

<script>
    export default {
        name: "General",
        props: {
            errors: Object,
            member: Object,
        },
        data () {
            return {
                editor: {
                    first_name: null,
                    last_name: null,
                    membership_type: 'full',
                    practice_email: null,
                    email: null,
                    telephone: null,
                    alt_telephone: null,
                    mobile: null,
                    address: null,
                    alt_address: null,
                    id_number: null,
                }
            }
        },
        computed: {
            dateOfBirth: {
                get () {
                    return this.editor.birth ? new Date(this.editor.birth * 1000) : null;
                },
                set (value) {
                    this.editor.birth = value.getTime() / 1000;
                }
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
        methods: {
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
