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
        methods: {},
        async mounted() {
            try {
                const google = await gmapsInit();
                const geocoder = new google.maps.Geocoder();
                const map = new google.maps.Map(this.$el);
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
            } catch (error) {
                console.error(error);
            }
        },
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
