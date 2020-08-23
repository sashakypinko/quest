<template>
    <div class="App">
    </div>
</template>

<script>
    import gmapsInit from '../googleMaps';

    export default {
        props: ['lon', 'lat'],
        data() {
            return {
                markers: [],
                places: [],
                key: 'AIzaSyClropSipck2WokfsQMiNoNuSWFMaLJcV0',
                currentPlace: null,
                longitude: this.lon ?? 35.07347334,
                latitude: this.lat ?? 35.05734734,
                myLat: '',
                myLon: ''
            };
        },
        methods: {
            ipLookUp(callback) {
                let self = this;

                $.ajax({
                    url: 'https://www.googleapis.com/geolocation/v1/geolocate?key=' + this.key,
                    type: 'POST',
                    success: r => {
                        self.myLat = r.location.lat;
                        self.myLon = r.location.lng;
                    },
                    fail: (data, status) => {
                        if (callback) {
                            callback();
                        }
                    }
                });
            }
        },
        async mounted() {
            let self = this;

            if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition(function success(r) {
                    self.myLat = r.coords.latitude;
                    self.myLon = r.coords.longitude;

                }, function error(error_message) {
                    console.error('An error has occured while retrieving location', error_message);
                    self.ipLookUp();
                });
            } else {
                self.ipLookUp();
            }

            try {
                console.log(this.latitude)
                const google = await gmapsInit();
                const map = new google.maps.Map(this.$el, {
                    zoom: 11,
                    center: new google.maps.LatLng(this.latitude, this.longitude)
                });

                let marker = new google.maps.Marker({
                    map: map,
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    position: {lat: this.latitude, lng: this.longitude}
                });

                let myloc = new google.maps.Marker({
                    clickable: false,
                    icon: new google.maps.MarkerImage('//maps.gstatic.com/mapfiles/mobile/mobileimgs2.png',
                        new google.maps.Size(22,22),
                        new google.maps.Point(0,18),
                        new google.maps.Point(11,11)),
                    shadow: null,
                    animation: google.maps.Animation.DROP,
                    zIndex: 999,
                    map: map,
                    position: {lat: this.myLat, lng: this.myLon}
                });

            } catch (error) {
                console.error(error);
            }

            Echo.channel('quest_database_location')
                .listen('.new-location', e => {
                    let firstloc = new google.maps.Marker({
                        clickable: false,
                        icon: new google.maps.MarkerImage('//maps.gstatic.com/mapfiles/mobile/mobileimgs2.png',
                            new google.maps.Size(22,22),
                            new google.maps.Point(0,18),
                            new google.maps.Point(11,11)),
                        shadow: null,
                        animation: google.maps.Animation.DROP,
                        zIndex: 999,
                        map: map,
                        position: {lat: e.lat, lng: e.lon}
                    });
                });
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
