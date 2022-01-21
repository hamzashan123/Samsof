<template>
    <div class="columns conference-map is-mobile">
        <div class="column">
            <div id="venue"></div>
        </div>
        <div class="column">
            <div class="venue-image">
            </div>
        </div>
    </div>
</template>

<script>
import googleMapStyle from '../GoogleMapStyle';

export default {
    data () {
        return {
            map: null,
        }
    },
    methods: {
        initMap () {
            return new google.maps.Map(document.getElementById('venue'), {
                center: {lat: -33.8957699, lng: 18.5046015},
                zoom: 15,
                styles: googleMapStyle,
                mapTypeControl: false,
            });
        },
        createMarker (map) {
            let marker = new google.maps.Marker({
                map: this.map,
                position: {lat: -33.8957699, lng: 18.5046015},
                title: 'Century City Conference Center'
            });
        }
    },
    mounted () {
        this.map = this.initMap();
        this.createMarker();
    }
}
</script>

<style lang="scss">
    .conference-map {
        height: 520px;

        .column {
            padding: 0;
        }

        #venue {
            width: 100%;
            height: 100%;
        }

        .venue-image {
            width: 100%;
            height: 100%;
            background: url('/images/content/venue.jpg') center / cover no-repeat;
        }
    }
</style>
