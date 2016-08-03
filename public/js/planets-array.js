// (function(){
    "use strict";

    // TODO: Create an array holding the names of the eight planets in our solar system in order, starting closest to the sun.
    var planets = [];
    planets = ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune"];

    // function for logging the planets array
    function logPlanets() {
        console.log("Here is the list of planets:");
        console.log(planets);
        console.log("---- ---- ---- ----");
    }

    logPlanets();

    planets.unshift ("The Sun");

    console.log('Adding "The Sun" to the beginning of the planets array.');
    // TODO: Read the console.log() statement above. Write code to perform the step it describes.
    logPlanets();

    planets.push ("Pluto");

    console.log('Adding "Pluto" to the end of the planets array.');
    // TODO: Read the console.log() statement above. Write code to perform the step it describes.
    logPlanets();

    planets.shift ("The Sun");

    console.log('Removing "The Sun" from the beginning of the planets array.');
    // TODO: Read the console.log() statement above. Write code to perform the step it describes.
    logPlanets();

    planets.pop ("Pluto");

    console.log('Removing "Pluto" from the end of the planets array.');
    // TODO: Read the console.log() statement above. Write code to perform the step it describes.
    logPlanets();

    console.log('Finding and logging the index of "Earth" in the planets array.');
    // TODO: Read the console.log() statement above. Write code to perform the step it describes.
    console.log (planets.indexOf ("Earth"));

    console.log('Using splice to remove the planet after "Earth".');
    // TODO: Read the console.log() statement above. Write code to perform the step it describes.
    planets.splice (planets.indexOf ("Earth") + 1, 1)

    logPlanets();

    console.log('Using splice to add back the planet after "Earth".');
    // TODO: Read the console.log() statement above. Write code to perform the step it describes.
    planets.splice (planets.indexOf ("Earth") + 1, 0, "Mars")

    logPlanets();

    console.log("Reversing the order of the planets array.");
    // TODO: Read the console.log() statement above. Write code to perform the step it describes.
    planets.reverse();

    logPlanets();

    console.log("Sorting the planets array.");
    // TODO: Read the console.log() statement above. Write code to perform the step it describes.
    planets.sort ();

    logPlanets();

    //EXTRA FUN CHALLENGE TIME
    //write a function that takes an array and returns a random element from that array
    // steps:
    // declare an array
    var popStars = ["Madonna", "Britney Spears", "Justin Timberlake", "New Kids on the Block", "Rihanna", "1Direction", "Taylor Swift"];
    // find out how many pieces are in the array
    console.log (popStars.length);
    // make a function that uses the randomizer
    var randomPopStar = Math.floor(Math.random() * popStars.length);

    console.log (popStars[randomPopStar]);

    //converts a string that represents a 12 hour time to a string that represents 24 hour clock
    function twelveToTwentyFour (timeString) {
        console.log(timeString);
        var hours = Number(timeString.match(/^(\d+)/)[1]);
        var minutes = Number(timeString.match(/:(\d+)/)[1]);
        var AMPM = timeString.match(/\s(.*)$/)[1];
        if (AMPM == "pm" && hours < 12) hours = hours + 12;
        if (AMPM == "am" && hours == 12) hours = hours - 12;
        var sHours = hours.toString();
        var sMinutes = minutes.toString();
        if (hours < 10) sHours = "0" + sHours;
        if (minutes < 10) sMinutes = "0" + sMinutes;
        return (sHours +':'+sMinutes);

    }
    console.log (twelveToTwentyFour ("4:30 pm")); //should return 16:30
    console.log (twelveToTwentyFour ("12:22 pm")); //should return 12:22
    console.log (twelveToTwentyFour ("12:45 am")); //should return 00:45
    console.log (twelveToTwentyFour ("9:00 am")); //should return 09:00







// })();
