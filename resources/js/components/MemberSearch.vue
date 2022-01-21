<template>
    <div class="member-search">
        <div class="container">
            <div class="member-search-tools">
                <div class="columns">
                    <div class="column is-offset-1">
                        <p class="mb-1">
                            <strong class="has-text-info">
                                How to use this page:
                            </strong>
                        </p>
                        <ol class="ml-1 instructions-list">
                            <li>
                                You can either select by city or filter your search by a member's name.
                            </li>
                            <li>
                                After selecting one/more of the above, the list of surgeons will display automatically.
                            </li>
                            <li>
                                The map on the right will indicate the surgeons in your selected speciality, hospital or
                                city. To zoom in and out, use the "+" and "-" buttons on the map.
                            </li>
                            <li>
                                A list of names will also appear below the map.
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-3 is-offset-1">
<!--                        <div>-->
<!--                            <custom-dropdown placeholder="SPECIALITY"-->
<!--                                             :options="specialityOptions"-->
<!--                                             name="speciality"-->
<!--                                             clear-selection-label="Clear Selection"-->
<!--                                             :show-selected="true"-->
<!--                                             :with-filter="true" v-model="selectedSpeciality"></custom-dropdown>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                            <custom-dropdown placeholder="HOSPITAL"-->
<!--                                             :options="hospitalOptions"-->
<!--                                             :show-selected="true"-->
<!--                                             :with-filter="true" v-model="selectedHospital"></custom-dropdown>-->
<!--                        </div>-->
                        <div>
                            <custom-dropdown placeholder="CITY"
                                             :options="cityOptions"
                                             :show-selected="true"
                                             :with-filter="true" v-model="selectedCity"></custom-dropdown>
                        </div>
                        <div>
                            <hr>
                            <div class="field">
                                <label class="label">Filter by member name</label>
                                <div class="control is-expanded">
                                    <input type="text" class="input" placeholder="Filter by members name..." v-model="filter">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-5 is-offset-1">
                        <div id="map"></div>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-offset-1">
                    Results: {{ members.length }} of {{ totalMembers }}
                </div>
            </div>
        </div>
        <div class="member-search-results">
            <table>
                <thead>
                <tr>
                    <th class="is-hidden-mobile is-hidden-tablet-only">TITLE</th>
                    <th>SURNAME, NAME</th>
                    <th>HOSPITAL</th>
                    <th>CITY</th>
                    <th class="is-hidden-mobile">EMAIL</th>
                    <th class="is-hidden-mobile">CONTACT NO.</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="member in paginatedMembers" class="member-table-row" :key="member.id" @click="selectMember(member)">
                    <td class="is-hidden-mobile is-hidden-tablet-only">Dr.</td>
                    <td>{{ member.last_name }}, {{ member.first_name }}</td>
                    <td>
                        <div v-for="hospital in member.hospitals">
                            {{ hospital.title }}
                        </div>
                    </td>
                    <td>{{ member.city ? member.city.title : '-' }}</td>
                    <td class="is-hidden-mobile">{{ member.practice_email }}</td>
                    <td class="is-hidden-mobile">{{ member.telephone }}</td>
                    <td><div class="button is-rounded is-primary is-small">VIEW DETAILS</div></td>
                </tr>
                </tbody>
            </table>
            <div class="load-more" v-if="hasMore">
                <button class="button is-rounded is-primary" type="button" @click.prevent="loadMoreMembers">LOAD MORE</button>
            </div>
        </div>
        <div class="show-member" v-if="selectedMember">
            <div class="member-dialog" @click.self="deselectMember">
                <div class="member-header">
                    <h2 class="title">{{ selectedMember.name }}</h2>
                    <a href="#" class="member-close" @click.prevent="deselectMember">
                        <fa icon="times"></fa>
                    </a>
                </div>
                <div class="member-body">
                    <div class="columns">
                        <div class="column">
                            <table class="table">
                                <tr>
                                    <th>Hospitals</th>
                                    <td>
                                        <template v-if="selectedMember.hospitals.length">
                                            <div v-for="hospital in selectedMember.hospitals">
                                                {{ hospital.title }}
                                            </div>
                                        </template>
                                        <template v-else>
                                            -
                                        </template>
                                    </td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ selectedMember.city ? selectedMember.city.title : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ selectedMember.city && selectedMember.city.country ? selectedMember.city.country.title : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Practice Address</th>
                                    <td>{{ selectedMember.address ? selectedMember.address : '-' }}</td>
                                </tr>
                                <tr v-if="selectedMember.alt_address">
                                    <th>Alternative Practice Address</th>
                                    <td>{{ selectedMember.alt_address ? selectedMember.alt_address : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>
                                        <a v-if="selectedMember.practice_email" :href="'mailto:' + selectedMember.practice_email"
                                           target="_blank">{{ selectedMember.practice_email }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Practice Telephone</th>
                                    <td><a v-if="selectedMember.telephone" :href="'tel:' + selectedMember.telephpone"
                                           target="_blank">{{ selectedMember.telephone }}</a></td>
                                </tr>
                                <tr>
                                    <th>Alternative Practice Telephone</th>
                                    <td><a v-if="selectedMember.alt_telephone" :href="'tel:' + selectedMember.alt_telephone"
                                           target="_blank">{{ selectedMember.alt_telephone }}</a></td>
                                </tr>
                            </table>
                        </div>
                        <div class="column is-5">
                            <div id="member-map">
                                <div class="no-location-message">
                                    <div>
                                        No location is available for this MFO Surgeon
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import googleMapStyle from '../GoogleMapStyle';

    export default {
        props: {
            specialities: Array,
            cities: Array,
            hospitals: Array,
            hereToken: String,
            totalMembers: Number,
        },
        data () {
            return {
                loading: false,
                selectedSpeciality: null,
                selectedHospital: null,
                selectedCity: null,
                selectedMember: null,
                filter: null,
                members: [],
                map: null,
                markers: [],
                infoWindow: null,
                page: 1,
            }
        },
        computed: {
            specialityOptions () {
                return this.getOptions(this.specialities, 'Specialities');
            },
            cityOptions () {
                //return this.getOptions(this.cities, 'Cities');
                let options = [
                    {
                        title: 'All Cities',
                        value: null,
                    }
                ]

                const countries = this.getCountries();

                countries.forEach(country => {
                    options.push({
                        title: country,
                        value: null,
                        label: true,
                    });

                    let countryCities = [];
                    this.cities.forEach(city => {
                        if (city.country.title === country) {
                            countryCities.push({
                                title: city.title,
                                value: city.id,
                            });
                        }
                    })
                    countryCities.sort((a,b) => {
                        if (a > b) {
                            return 1;
                        }
                        if (a < b) {
                            return -1;
                        }
                        return 0;
                    })

                    options.push(...countryCities);
                })

                return options;
            },
            hospitalOptions () {
                return this.getOptions(this.hospitals, 'Hospitals and Practices');
            },
            paginatedMembers () {
                return this.members.slice(0, this.page * 10);
            },
            hasMore () {
                return this.members.length > this.paginatedMembers.length;
            }
        },
        watch: {
            selectedSpeciality () {
                this.debouncedGetMembers();
            },
            selectedHospital () {
                this.debouncedGetMembers();
            },
            selectedCity () {
                this.debouncedGetMembers();
            },
            filter () {
                this.debouncedGetMembers();
            }
        },
        methods: {
            getCountries () {
                let countries = [];
                this.cities.forEach(city => {
                    if (!countries.includes(city.country.title)) {
                        countries.push(city.country.title);
                    }
                });
                countries.sort((a,b) => {
                    if (a > b) {
                        return 1;
                    }
                    if (a < b) {
                        return -1;
                    }
                    return 0;
                });

                return countries;
            },
            getOptions (options, title) {
                let map = [
                    {
                        title: 'All ' + title,
                        value: null,
                    }
                ];

                options.forEach(option => {
                    map.push({
                        title: option.title,
                        value: option.id,
                    });
                });

                return map;
            },
            showInfoWindow (member) {
                this.infoWindow.setContent('<strong>' + member.name + '</strong><br>' + member.physical_address);
                this.infoWindow.open(this.map, member.marker);
            },
            getMembers () {
                this.clearMarkers();

                this.loading = true;
                axios({
                    method: 'get',
                    url: '/api/members',
                    params: {
                        speciality: this.selectedSpeciality,
                        city: this.selectedCity,
                        hospital: this.selectedHospital,
                        filter: this.filter,
                    }
                }).then(response => {
                    this.members = response.data.data;
                    this.page = 1;
                    this.loading = false;
                    this.createMarkers();
                });
            },
            loadMoreMembers () {
                this.page++;
            },
            clearMarkers () {
                this.members.forEach(member => {
                    if (member.marker) {
                        member.marker.setMap(null);
                    }
                });
            },
            createMarkers () {
                this.members.forEach(member => {
                    let location = {
                        lat: member.coordinates.lat,
                        lng: member.coordinates.long,
                    };
                    if (location.lat && location.lng) {
                        let marker = new google.maps.Marker({
                            map: this.map,
                            position: location,
                            title: member.name,
                        });
                        marker.addListener('click', e => {
                            //this.showInfoWindow(member);
                            this.selectMember(member);
                        });

                        member.marker = marker;
                    }
                });
            },
            initMap (id, center, zoom) {
                return new google.maps.Map(document.getElementById(id), {
                    center: center ? center : {lat: -29, lng: 25},
                    zoom: zoom ? zoom : 5,
                    styles: googleMapStyle,
                    mapTypeControl: false,
                    rotateControl: false,
                    scaleControl: false,
                    fullscreenControl: false,
                    streetViewControl: false,
                });
            },
            initInfoWindow () {
                this.infoWindow = new google.maps.InfoWindow({
                    content: '',
                });
            },
            selectMember (member) {
                this.selectedMember = member;
                setTimeout(() => {
                    if (member.coordinates) {
                        let location = {
                            lat: member.coordinates.lat,
                            lng: member.coordinates.long,
                        };
                        let memberMap = this.initMap('member-map', location, 9);
                        if (location.lat && location.lng) {
                            new google.maps.Marker({
                                map: memberMap,
                                position: location,
                            });
                        }
                    }
                }, 100);
            },
            deselectMember () {
                this.selectedMember = null;
            },
            bounceMarker (member) {
                this.stopBounce();
                member.marker.setAnimation(google.maps.Animation.BOUNCE);
            },
            stopBounce () {
                this.members.forEach(member => {
                    member.marker.setAnimation(null);
                });
            },
        },
        created () {
            this.debouncedGetMembers = _.debounce(this.getMembers, 1000);
        },
        mounted () {
            this.map = this.initMap('map');
            this.initInfoWindow();
            this.getMembers();
        }
    }
</script>

<style lang="scss">
    @import '../../sass/public/variables';

    .member-search {
        position: relative;

        .instructions-list {
            li {
                padding-left: 5px;
                margin-bottom: 10px;
            }
        }
    }

    .show-member {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        z-index: 100;
        display: flex;
        justify-content: center;
        align-items: center;

        .member-dialog {
            margin: 1em;
            width: 350px;

            @media (min-width: map_get($grid-breakpoints, md)) {
                width: 600px;
            }

            @media (min-width: map_get($grid-breakpoints, lg)) {
                width: 800px;
            }

            .member-header {
                background: $light-blue;
                color: #fff;
                padding: 2em;
                position: relative;

                .title {
                    color: #fff;
                    font-weight: 300;
                    text-transform: uppercase;
                    font-size: 1.2em;
                    font-family: $family-sans-serif;
                }

                .member-close {
                    position: absolute;
                    width: 40px;
                    height: 40px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-radius: 500px;
                    background: #fff;
                    right: 10px;
                    bottom: -20px;
                    z-index: 10;
                    color: $light-blue;
                    font-size: 1.3em;
                    box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.2);

                    @media only screen and (min-width: map-get($grid-breakpoints, md)) {
                        top: -20px;
                        right: -20px;
                    }
                }
            }

            .member-body {
                max-height: 250px;
                overflow: auto;
                background: #fff;
                box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.3);
                padding: 1em;

                @media (orientation: portrait) {
                    max-height: 500px;
                }

                @media (min-width: map-get($grid-breakpoints, md)) {
                    max-height: 100%;
                    padding: 2em;
                }
            }
        }
    }

    .member-search-results {
        position: relative;
        font-size: .8em;
        //overflow: auto;
        //max-height: 400px;

        .load-more {
            margin: .5em 0;
            display: flex;
            justify-content: center;
        }

        .member-search-results-header, .member-search-results-row-body {
            display: flex;
            width: 100%;

            > div {
                flex: 1 1 25%;
                padding: .5em;
                display: flex;
                align-items: center;
            }
        }

        table {
            width: 100%;

            th, td {
                padding: .8em 1em;
                vertical-align: middle;
            }

            th {
                color: $blue;
            }

            tbody {
                tr {
                    background: #d9f2f6;
                    border-bottom: 2px #fff solid;
                    cursor: pointer;

                    &:nth-child(even) {
                        background: #dbe9f4;

                    }

                    @media (any-hover: hover) {
                        &:hover {
                            background: $primary;
                            color: #fff;
                        }
                    }
                }
            }
        }

        .member-search-results-header {
            text-transform: uppercase;
            color: $primary;
            font-weight: bold;
            padding: .5em 0;
        }

        .member-search-results-row {
            margin-bottom: .2em;
            background: #dbe9f4;
            color: inherit;
            transition: all .3s ease;

            .button {
                background-color: $light-blue;
            }

            &:nth-child(odd) {
                background: #d9f2f6;

                .button {
                    background-color: $blue;
                }
            }
        }
    }

    #map, #member-map {
        height: 300px;
        position: relative;

        @media only screen and (min-width: map-get($grid-breakpoints, md)) {
            height: 400px;
        }

        .no-location-message {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;

        }
    }
</style>
