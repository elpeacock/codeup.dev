function(addMarkerAndInfoWindow){
    var marker = new google.maps.Marker({
        position: results[i].geometry.location,
        map: map
    
    });

    var infoWindow = new google.maps.InfoWindow({
        content: results[i].formatted_address
    });

    infoWindow.open(map, marker);
};

function changeZoomLevel(e)){
    var zoomLevel = document.getElementById('change-zoom').value;
    m.setZoom(parseInt(zoomLevel));

};

function processGeocodingResults(results, status) {
    // Check for a successful result
    if (status != google.maps.GeocoderStatus.OK) {
        // Show an error message with the status if our request fails
        alert("Geocoding was not successful - STATUS: " + status);
        return;
    }

var mapOptions = {
    zoom: 14,

    // position of codeup
    center: {
        lat:  29.426791,
        lng: -98.489602
    }
    
};
var mapDiv = new google.maps.Map(document.getElementById('my-map');

var map = new google.maps.Map(mapDiv, mapOptions);

var geocoder = new google.maps.Geocoder();

var searchPlace = 'austin';

geocoder.geocode({ address: searchPlace }, 
});
document.getElementById('zoom-btn').addEventListener('click');
