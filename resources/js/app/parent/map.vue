<template>
    <div>
        <div id="map"></div>
        <div class="text-center">
            <br />
            
        </div>
    </div>
</template>

<script>
export default {
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

        async getAddresses(){
             console.log('This should populate the map with many addresses')
            
        }
    },
    mounted() {
        this.geoLocationInit();
        this.getAdresses();
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
