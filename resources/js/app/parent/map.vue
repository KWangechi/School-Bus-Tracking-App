<template>
    <div>
        <div id="map"></div>
        <div class="text-center">
            <br />
        </div>
    </div>
</template>

<script>
// import { mapGetters } from "vuex";
import { ElMessage } from "element-plus";
export default {
    data() {
        return {
            //Kikuyu coordinates
            latLng: {
                latitude: -1.3169,
                longitude: 36.6903,
            },
            myMap: {},
            marker: null,
            image: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
            flag: null,
            myLocation: {},
            driverLocation: {},
            pathCoordinates: [],
        };
    },

    computed: {},
    methods: {
        initMap() {
            this.myLocation = new google.maps.LatLng({
                lat: this.latLng.latitude,
                lng: this.latLng.longitude,
            });

            this.myMap = new google.maps.Map(document.getElementById("map"), {
                center: this.myLocation,
                zoom: 9,
                mapTypeId: "terrain",
            });

            //create a flag for the parent's address
            this.flag = new google.maps.Marker({
                position: this.myLocation,
                icon: this.image,
                map: this.myMap,
            });

        },

        subscribe() {
            Echo.channel("location").listen("SendLocation", (e) => {
                console.log(e);
                this.driverLocation = e.location;

                //check if marker exists
                if (this.marker) {
                    this.updateMarker(this.driverLocation);
                } else {
                    this.marker = new google.maps.Marker({
                        position: new google.maps.LatLng(
                            this.driverLocation.lat,
                            this.driverLocation.long
                        ),
                        map: this.myMap,
                        animation: google.maps.Animation.DROP,
                    });

                    this.pathCoordinates.push(
                        new google.maps.LatLng(
                            this.driverLocation.lat,
                            this.driverLocation.long
                        )
                    );
                }
            });
        },

        updateMarker(location) {
            let newPos = new google.maps.LatLng(location.lat, location.long);
            this.myMap.setCenter(newPos);
            this.marker.setPosition(newPos);

            this.pathCoordinates.push(new google.maps.LatLng(newPos));
            
            console.log(
                "Path Coordinates after updating locations: " +
                    this.pathCoordinates
            );

            //draw a polyline as the driver is moving
            var polyLine = new google.maps.Polyline({
                path: this.pathCoordinates,
                geodesic: true,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 4,
            });

            polyLine.setMap(this.myMap);

            console.log(polyLine);

            //check when the child has arrived at home
            if (newPos.equals(this.myLocation)) {
                // alert('Your child has arrived at their destination')
                ElMessage({
                    type: 'message',
                    message: 'You have a new notification!!'
                })
            } else {
                console.log(
                    "Your child is on their way, their address is: " +
                        new google.maps.LatLng(location.lat, location.long)
                );
            }
        },
    },
    mounted() {
        this.subscribe();
        this.initMap();
    },

    watch: {},
};
</script>
<style scoped>
#map {
    height: 500px;
    width: 600px;
    margin: 0 auto;
}
</style>
