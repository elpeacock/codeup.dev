// (fucntion(){

'use strict'

const myAPIkey = "a8188de88e6ab418cf2c9a250aa9e56e";
var latitude = "";
var longitude = "";

function getForecast(){
    console.log("test");
    $.ajax({
        url: "http://api.openweathermap.org/data/2.5/forecast/daily",
        method: "GET",
        data: {
            APPID: "a8188de88e6ab418cf2c9a250aa9e56e",
            lat: latitude,
            lon: longitude,
            units: "imperial",
            cnt: "3"
        }
    }).done(function(forecastData){
        console.log(forecastData);
        addForecast(forecastData);
    }).fail(function(xhr, err, msg){
        alert("oops...something went wrong");
    });
};

$("#submit").click(function(){
    latitude = $("#latitude").val();
    longitude = $("#longitude").val();
    console.log (latitude, longitude);
    getForecast();
})
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
    $("#city-name").empty();
    $("#city-name").text(cityName);
    $("#content").empty();
    $("#content").append(content);

};



// })();    