export default {
    props: ['id'],
    data() {
        return {
            key: 'AIzaSyClropSipck2WokfsQMiNoNuSWFMaLJcV0',
            token: document.head.querySelector('meta[name="csrf-token"]').content
        }
    },
    methods: {
        sendLocation(lat, lon) {
            axios.post('/send-location', {
                lat: lat,
                lon: lon,
                id: this.id
            }).then(res => {
                this.getLocation()
            })
        },
        success(res) {
            console.log('success: ', res)
        },
        error(err) {
            console.log('error: ', err)
        },
        getLocation() {
            /*  let self = this;

              $.ajax({
                  url: 'https://cors-anywhere.herokuapp.com/https://www.googleapis.com/geolocation/v1/geolocate?key=' + self.key,
                  type: 'POST',
                  success: r => {
                      console.log(r);
                      self.sendLocation(r.location.lat, r.location.lng)
                  }
              }); */
            console.log('started');
            let x = document.getElementById("demo");

            if (navigator.geolocation) {
                x.innerHTML = "Geolocation is supported by this browser.";
                navigator.geolocation.getCurrentPosition(this.success, this.error);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
    }
}



