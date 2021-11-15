var lat, long, position;
// const button = document.getElementById('create');

var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");

function initialize() {
    var input = document.getElementById("home_address");
    var place = new google.maps.places.Autocomplete(input);

    google.maps.event.addListener(place, "place_changed", function () {
        position = place.getPlace();
        latitude.value = position.geometry.location.lat();
        longitude.value = position.geometry.location.lng();
    });
}

//   function success(){

//   }

new google.maps.event.addDomListener(window, "load", initialize);
