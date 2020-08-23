<template>
    <google-map
        :lon="lat"
        :lat="lon">
    </google-map>
</template>

<script>
    export default {
        name: "Gmap",
        data() {
            return {
                cors: [
                    {
                        lat: 0,
                        lon: 0
                    },
                    {
                        lat: 0,
                        lon: 0
                    }
                ]
            }
        },
        mounted() {
            Echo.channel('quest_database_location')
                .listen('.new-location', e => {
                    this.cors[0].lat = e.lat;
                    this.cors[0].lon = e.lon;
                });
        }
    }
</script>
