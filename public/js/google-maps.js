(function (){

"use strict"
//////////////////////Basic Map////////////////////////////
console.log("i'm linked");
//set map options
var mapOptions = {
    //zoom option
    zoom: 15,
    //center map at location based on latitude and longitude values
    center: {
        lat: 44.765962, 
        lng: -85.621661
    }, 
    // change map type here
    // mapTypeId: google.maps.MapTypeId.SATELLITE

    // these are the types of maps available
    // MapTypeId.ROADMAP — default road map view. This is the default map type.
    // MapTypeId.SATELLITE — Google Earth satellite images
    // MapTypeId.HYBRID — mixture of roadmap and satellite views
    // MapTypeId.TERRAIN — physical map based on terrain information.
    // you can also set a map type on an already existing map by using:
    // map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
  
};

// Render the map
var map = new google.maps.Map(document.getElementById("map-holder"), mapOptions);

//initialize new geocode info
var geocode = new google.maps.Geocoder(); 

// Set our address to geocode
var address = "115 Wellington St, Traverse City, MI 49686";

// Init geocoder object
var geocoder = new google.maps.Geocoder();

// variables for pulling lat/long from geocode
var lat;
var lng;
var addressLatLng;
var marker;
var contentString;
// Geocode our address
geocoder.geocode({ "address": address }, function(results, status) {

    // Check for a successful result
    if (status == google.maps.GeocoderStatus.OK) {
        
        // Recenter the map over the address
        map.setCenter(results[0].geometry.location);

        console.log (results[0]);
        // Add the marker to our existing map
        //first - Create lat and long for our marker position
        //pulling latitude and longitude from the geocode
        lat = results[0].geometry.location.lat();

        lng = results[0].geometry.location.lng();

        addressLatLng = {"lat": lat, "lng": lng};
        //Adding a marker
        marker = new google.maps.Marker({
        position: addressLatLng,
        map: map,

        });
        console.log (addressLatLng);
        //adding an info window on a marker
        //creating a content string for html within info window.
        contentString = "<div>"+
            "<img src='img/cookshouse.jpg'>"+
            "<p>The Cooks' House is located in Traverse City, Michigan, the foodie mecca of the Midwest. "+
            "The chefs focus on fresh food made from sustainable, locally sourced ingredients. "+
            "Serving only dinner and open Tuesday-Sunday, offerings are appetizers and five or seven course " +
            "tasting menus that constantly change with the availability of ingredients. I make it "+
            "a point to eat here every time I am in Traverse City visiting family. While I have never "+
            "had the same meal twice, every meal has been memorable and delicious! In addition to "+
            "offering up amazing locally sourced food, the Cooks' House also offers cooking "+
            "classes using the same high quality ingredients. They also do guest chef "+
            "meal events on a regular basis that feature an up and coming new chef from the local Great Lakes Culinary "+
            "Institute. If you're lucky enough to get a reservation, don't pass up the opportunity!</p>"+
            "</div>";
        //Create a new infoWindow object with content
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        // Open the window using our map and marker
        infowindow.open(map, marker);

    } else {

        // Show an error message with the status if our request fails
        alert("Geocoding was not successful - STATUS: " + status);
    }
});


})();
