<template>
    <div>
        <driver />
        <div id="map"></div>

        <div class="text-center">
            <br />
            <button type="button" class="btn btn-primary" @click="startTrip">Start trip</button>
        </div>
    </div>
</template>

<script>
import Driver from "./index";
export default {
    components: {
        Driver,
    },
    data() {
        return {
            latLng: "",
            map: {},
            addresses: [
                {
                    latitude: -1.46789,
                    longitude: 45.8732,
                },
                {
                    latitude: -1.00865,
                    longitude: 45.05643,
                },
                {
                    latitude: -1.76,
                    longitude: 45.543216,
                },
            ],
            marker: "",

        };
    },
    methods: {
        getMap(myLatLng) {
            this.map = new google.maps.Map(document.getElementById("map"), {
                center: myLatLng,
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            });

            this.autoUpdate(this.latLng)
        },

        autoUpdate(myLatLng) {
            var marker = null;
            if (marker) {
                marker.setPosition(myLatLng);
            } else {
                marker = new google.maps.Marker({
                    position: myLatLng,
                    map: this.map,
                });
            }
        },

        success(position) {
            console.log(position);
            var lat = position.coords.latitude;
            var long = position.coords.longitude;

            this.latLng = new google.maps.LatLng(lat, long);

            this.getMap(this.latLng);
        },
        geoLocationInit() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    this.success,
                    this.fail
                );
            } else {
                alert("Browser you are using is not supprted");
            }
        },
        fail() {
            alert("Oops. Something went wrong");
        },

        async startTrip(){
             await axios
                .post("/api/send-notification")
                .then((response) => {
                    localStorage.getItem("token");
                    console.log("Notification successfully sent!!!" + response)
                })
                .catch((errors) => {
                    console.log(errors);
                });  
        }
    },
    mounted() {
        this.geoLocationInit();
    },
};
</script>
<style scoped>
#map {
    height: 500px;
    width: 600px;
    margin: 0 auto;
}
</style>
