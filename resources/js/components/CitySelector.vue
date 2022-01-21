<template>
    <div class="city-selector">
        <input type="hidden" :name="countrySelectName" :value="country ? country : null">
        <input type="hidden" :name="citySelectName" :value="city ? city : null">
        <div class="columns">
            <div class="column">
                <label class="label">Country</label>
                <custom-dropdown :options="countryOptions" placeholder="Select a country"
                                 :with-filter="true" :show-selected="true" v-model="country"></custom-dropdown>
            </div>
            <div class="column">
                <label class="label">City</label>
                <custom-dropdown :options="selectedCountry ? cityOptions : []" placeholder="Select a city"
                                 :with-filter="true" :show-selected="true" v-model="city"></custom-dropdown>
            </div>
        </div>
    </div>
</template>

<script>
    import CustomDropdown from "./CustomDropdown";
    export default {
        components: {CustomDropdown},
        props: {
            oldCountry: Number,
            oldCity: Number,
            oldHospital: Number,
            countries: Array,
            member: Object,
            countrySelectName: {
                type: String,
                default: 'country_id',
            },
            citySelectName: {
                type: String,
                default: 'city_id',
            },
        },
        data () {
            return {
                country: this.member && this.member.city ? this.member.city.country_id : this.oldCountry,
                city: this.member ? this.member.city_id : this.oldCity,
            }
        },
        computed: {
            selectedCountry () {
                return this.countries.filter(country => {
                    return country.id === this.country;
                })[0];
            },
            selectedCity () {
                return this.cityOptions.filter(city => {
                    return city.id === this.city;
                })[0];
            },
            countryOptions () {
                return this.countries.map(country => {
                    return {
                        title: country.title,
                        value: country.id,
                    }
                });
            },
            cityOptions () {
                return this.selectedCountry.cities.map(city => {
                    return {
                        title: city.title,
                        value: city.id,
                    }
                });
            },
        },
    }
</script>

<style scoped>

</style>
