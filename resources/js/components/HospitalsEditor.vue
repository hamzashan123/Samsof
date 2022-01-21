<template>
    <div class="hospitals-editor">
        <input type="hidden" :name="name" :value="hospitalsJson">
        <Hospital :member="member"
                  :countries="countries"
                  :cities="cities"
                  :hospitals="hospitals"
                  v-model="memberHospitals"
        ></Hospital>
    </div>
</template>

<script>
    import Hospital from "./RegistrationForm/Hospital";
    export default {
        name: "HospitalsEditor",
        components: {Hospital},
        props: {
            name: String,
            member: Object,
            countries: Array,
            cities: Array,
            hospitals: Array,
        },
        data () {
            return {
                memberHospitals: this.member.hospitals,
            }
        },
        computed: {
            hospitalsJson () {
                return JSON.stringify(this.memberHospitals);
            }
        }
    }
</script>

<style scoped>

</style>
