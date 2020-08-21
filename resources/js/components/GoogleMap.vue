<template>
    <div class="App"/>
</template>

<script>
    import gmapsInit from '../googleMaps';

    export default {
        props: ['lon', 'lat'],
        data() {
            return {
                center: {lat: this.lat, lng: this.lon},
                markers: [],
                places: [],
                currentPlace: null,
                longitude: parseFloat(this.lon),
                latitude: parseFloat(this.lat)
            };
        },
        methods: {
            handleLocationError(browserHasGeolocation, infoWindow, pos, map) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
                infoWindow.open(map);
            }
        },
        async mounted() {
            try {
                const google = await gmapsInit();
                const geocoder = new google.maps.Geocoder();
                const map = new google.maps.Map(this.$el);
                let infoWindow = new google.maps.InfoWindow;
                let marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: {lat: this.latitude, lng: this.longitude}
                });

                marker.setAnimation(google.maps.Animation.BOUNCE);

                geocoder.geocode({address: this.latitude + ', ' + this.longitude}, (results, status) => {
                    if (status !== 'OK' || !results[0]) {
                        throw new Error(status);
                    }
                    map.setCenter(results[0].geometry.location);
                    map.fitBounds(results[0].geometry.viewport);
                });

                let self = this;
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    infoWindow.open(map);
                    map.setCenter(pos);
                }, function () {
                    self.handleLocationError(true, infoWindow, map.getCenter(), map);
                });
            } catch (error) {
                console.error(error);
            }

            // let infoWindow = new google.maps.InfoWindow;
            //
            // // Try HTML5 geolocation.
            // if (navigator.geolocation) {
            //     let self = this;
            //     navigator.geolocation.getCurrentPosition(function (position) {
            //         var pos = {
            //             lat: position.coords.latitude,
            //             lng: position.coords.longitude
            //         };
            //
            //         infoWindow.setPosition(pos);
            //         infoWindow.setContent('Location found.');
            //         infoWindow.open(map);
            //         map.setCenter(pos);
            //     }, function () {
            //         self.handleLocationError(true, infoWindow, map.getCenter());
            //     });
            // } else {
            //     // Browser doesn't support Geolocation
            //     this.handleLocationError(false, infoWindow, map.getCenter());
            // }
        }
    }
</script>

<style>
    html,
    body {
        margin: 0;
        padding: 0;
    }

    .App {
        height: 50vh;
    }
</style>
