<template>
    <div class="address-editor">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Address</label>
                    <textarea name="address" class="textarea" @input="handleInput">{{ address }}</textarea>
                </div>
                <hr>
                <button class="button is-primary" type="button" @click="codeAddress">Refresh Map</button>
            </div>
            <div class="column">
                <div id="map"></div>
                <input type="hidden" :name="name" v-model="locationJson">
            </div>
        </div>
    </div>
</template>
<script>
    import googleMapStyle from '../GoogleMapStyle';

    export default {
        props: {
            value: null,
            name: String,
        },
        data () {
            return {
                geoCoder: null,
                address: this.value,
                location: null,
                marker: null,
            }
        },
        computed: {
            locationJson () {
                return JSON.stringify(this.location);
            }
        },
        methods: {
            handleInput (e) {
                this.address = e.currentTarget.value;
                this.$emit('input', this.address)
            },
            initMap () {
                this.map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -29, lng: 25},
                    zoom: 5,
                    styles: googleMapStyle,
                    mapTypeControl: false,
                    rotateControl: false,
                    scaleControl: false,
                    fullscreenControl: false,
                    streetViewControl: false,
                });
                this.geoCoder = new google.maps.Geocoder();
            },
            codeAddress () {
                if (this.marker) {
                    this.marker.setMap(null);
                }
                this.geoCoder.geocode({
                    address: this.address,
                }, (result, status) => {
                    if (status === 'OK') {
                        const location = result[0].geometry.location;

                        this.location = {
                            lat: location.lat(),
                            lang: location.lng(),
                        };

                        this.marker = new google.maps.Marker({
                            map: this.map,
                            position: location,
                        });
                        this.map.panTo(location);
                        this.map.setZoom(9);
                    }
                })
            },
        },
        mounted () {
            this.initMap();
            if (this.address) {
                this.codeAddress();
            }
        }
    }
</script>

