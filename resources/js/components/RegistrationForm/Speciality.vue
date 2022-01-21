<template>
    <div class="registration-form-speciality">
        <div class="card">
            <div class="card-header">
                <p class="card-header-title">
                    Speciality
                </p>
            </div>
            <div class="card-content">
                <p>Select your specialisations.</p>

                <div v-for="speciality in specialities">
                    <label class="checkbox">
                        <input type="checkbox" :value="speciality.id" v-model="selectedSpecialities">
                        {{ speciality.title }}
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Speciality",
        props: {
            member: Object,
            specialities: Array,
        },
        data () {
            return {
                selectedSpecialities: this.member.specialities.map(speciality => speciality.id),
            }
        },
        watch: {
            selectedSpecialities () {
                this.$emit('input', this.selectedSpecialities);
            }
        }
    }
</script>

<style scoped>

</style>
