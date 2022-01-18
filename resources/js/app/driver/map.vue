<template>
    <div>
        <div class="text-center">
            <button type="button" class="btn btn-success" @click="updateLocation">
                Update Location
            </button>
            <br />
            <br />

            <div id="map"></div>
            <br />
            <button type="button" class="btn btn-primary" @click="startTrip">
                Start trip
            </button>
            <br />
            <br />
            <button type="button" class="btn btn-danger" @click="endTrip">
                End trip
            </button>
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
                //Thika
                {
                    latitude: -1.0388,
                    longitude: 37.0834,
                },
                //Ruiru
                {
                    latitude: -1.1483,
                    longitude: 36.9605,
                },

                //Donholm
                {
                    latitude: -1.2939,
                    longitude: 36.8971,
                },

                //Kikuyu
                {
                    latitude: -1.3169,
                    longitude: 36.6903,
                },

                //Ruaka
                {
                    latitude: -1.2056,
                    longitude: 36.7796,
                },

                //Kiambu
                {
                    latitude: -1.2501,
                    longitude: 36.8213,
                },

                //Runda
                {
                    latitude: -1.2156,
                    longitude: 36.815,
                },
            ],
            marker: "",
            lineCoordinates: [],
            data: "",
            pos: {},
            flag: null,
            image: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
            newLocation: {},
        };
    },
    methods: {
        getMap(myLatLng) {
            this.map = new google.maps.Map(document.getElementById("map"), {
                center: myLatLng,
                zoom: 10,
                mapTypeId: "terrain",
            });

            this.createMarker(this.latLng);
            this.createFlags();
        },

        success(position) {
            console.log(position);
            var lat = position.coords.latitude;
            var long = position.coords.longitude;

            this.latLng = new google.maps.LatLng(lat, long);
            this.getMap(this.latLng);
        },
        fail() {
            alert("Oops. Something went wrong");
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

        //also share the map
        async startTrip() {
            this.$store.commit("SEND_NOTIFICATION");
            // this.updateMap(this.data);
        },

        //create a marker
        createMarker(myLatLng) {
            this.marker = new google.maps.Marker({
                position: myLatLng,
                map: this.map,
                animation: google.maps.Animation.bounce,
            });

            this.lineCoordinates.push(myLatLng)
            console.log("Line coordinates are: " + this.lineCoordinates)

        },
        createFlags() {
            for (let index = 0; index < this.addresses.length; index++) {
                const location = this.addresses[index];
                const lat = parseFloat(location.latitude);
                const long = parseFloat(location.longitude);

                this.newLocation = new google.maps.LatLng({
                    lat: lat,
                    lng: long,
                });

                this.flag = new google.maps.Marker({
                    position: this.newLocation,
                    map: this.map,
                    icon: this.image,
                });

                //infoWindow
                const infoWindow = new google.maps.InfoWindow({
                    content:
                        "This should show all the locations for the students. The position of this flag is at" +
                        this.flag.position,
                });

                this.flag.addListener("click", () => {
                    infoWindow.open({
                        anchor: this.flag,
                        map: this.map,
                    });
                });
            }

            let newPos = new google.maps.LatLng({
                lat: this.pos.lat,
                lng: this.pos.long,
            });

        
        },

        //need to run this function in the background
        subscribe() {
            Echo.channel("location").listen("SendLocation", (e) => {
                console.log(e);
                this.data = e.location;
                this.updateMap(this.data);
            });
        },

        updateMap(data) {
            let parentLocation;
            let newPosition = new google.maps.LatLng(data.lat, data.long);
            console.log("Value of new position is: " + newPosition)

            this.map.setCenter(newPosition);
            this.marker.setPosition(newPosition);

            this.lineCoordinates.push(new google.maps.LatLng(newPosition));

            console.log(
                "Path Coordinates after updating locations: " +
                    this.lineCoordinates
            );

            var polyLine = new google.maps.Polyline({
                path: this.lineCoordinates,
                geodesic: true,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 4,
            });

            polyLine.setMap(this.map);

            //check if the child has arrived home
            //loop the addresses array
            for (let index = 0; index < this.addresses.length; index++) {
                const element = this.addresses[index];

                console.log(element);

                parentLocation = new google.maps.LatLng(element.latitude, element.longitude)

            if (newPosition.equals(parentLocation)) {
                 this.destinationReached();

            }
                console.log("You are yet to reach!!");

            }
        },

        async updateLocation() {
            //automatically update the position of the map as the person is moving
            // navigator.geolocation.getCurrentPosition((position) => {
            // });

            this.pos = {
                lat: -1.3169,
                long: 36.6903,
            };

            axios.post("/api/map", this.pos).then((response) => {
                console.log(response);
            });
        },

        destinationReached() {
            this.$store.commit("DESTINATION_REACHED");
        },
    },
    mounted() {
        this.geoLocationInit();
        // this.updateLocation();
        this.subscribe();
    },

    watch: {},

    computed: {},
};
</script>
<style scoped>
#map {
    height: 500px;
    width: 600px;
    margin: 0 auto;
}
</style>
