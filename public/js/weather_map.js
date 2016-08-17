// (fucntion(){

'use strict'

const myAPIkey = "a8188de88e6ab418cf2c9a250aa9e56e";

/////////declared lat/long globally, accessed in ajax req////////////

var markerLatitude = 29.42;
var markerLongitude = -98.49;


///////////////////////////adding google maps info/////////////////////////////////

var mapOptions = {
    zoom: 2,
    center: {
        lat: markerLatitude,
        lng: markerLongitude
    }
};

//////////////////////////render new map////////////////////////////////////

var map = new google.maps.Map(document.getElementById("map-holder"), mapOptions);

//////////////////////////render new map marker////////////////////////////

var marker = new google.maps.Marker({
    position: {
        lat: markerLatitude,
        lng: markerLongitude
    },
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    title: "Move me!!"
});

////////////////////update coordinates on marker move/////////////////

google.maps.event.addListener(marker, "dragend", function(event) {

    var markerPosition = [];
    markerPosition[0] = this.position.lat();
    markerPosition[1] = this.position.lng();

    $("#latitude").val(markerPosition[0]);
    $("#longitude").val(markerPosition[1]);
});

//////////////////////////function for ajax request///////////////////////////////

function getForecast(){
    console.log("test");
    $.ajax({
        url: "http://api.openweathermap.org/data/2.5/forecast/daily",
        method: "GET",
        data: {
            APPID: "a8188de88e6ab418cf2c9a250aa9e56e",
            lat: markerLatitude,
            lon: markerLongitude,
            units: "imperial",
            cnt: "3"
        }
    }).done(function(forecastData){
        console.log(forecastData);
        addForecast(forecastData);
    }).fail(function(xhr, err, msg){
        alert("oops...something went wrong");
        console.log (xhr)
    });
};

///////////////////////////click function to save lat/long values//////////////////

$("#submit").click(function(e){
    e.preventDefault();
    markerLatitude = $("#latitude").val();
    markerLongitude = $("#longitude").val();
    console.log (markerLatitude, markerLongitude);
    getForecast();
});

///////////////////////////////////adding content to html////////////////////////////

function addForecast(forecastData){
    var cityName = forecastData.city.name;
    var content = "";
    
    forecastData.list.forEach(function(day){
        console.log (day);
        
        var icon = day.weather[0].icon;
        var iconURL = "http://openweathermap.org/img/w/" + icon + ".png";
        var date = new Date(day.dt * 1000).toDateString();
        
        content += "<div class='col-sm-4'>";
        content += "<h3>" + date + "</h3>";
        content += "<h4>" + "low: " + day.temp.min + "/" + "high: " + day.temp.max + "</h4>";
        content += "<img src='" + iconURL + "'>";
        content += "<br>" + day.weather[0].description;
        content += "<br>" + "Humidity: " + day.humidity;
        content += "<br>" + "Wind: " + day.speed + " MPH";
        content += "</div>";
    });
    
    $("#forecast").text("3 Day Forecast")
    $("#city-name").empty();
    $("#city-name").text(cityName);
    $("#content").empty();
    $("#content").append(content);

};



// })();    