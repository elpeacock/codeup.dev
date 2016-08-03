// (function(){
    "use strict";

    var planetsString = "Mercury|Venus|Earth|Mars|Jupiter|Saturn|Uranus|Neptune";
    var planetsArray;

    // TODO: Convert planetsString to an array, save it to planetsArray.
    planetsArray = planetsString.split ("|");

    console.log(planetsArray);

    // TODO: Create a string with <br> tags between each planet. console.log() your results.
    var planetsWithBreak = planetsArray.join (" <br> ");
    console.log (planetsWithBreak);
    //       Why might this be useful?

    // Bonus: Create a second string that would display your planets in an undordered list.
    //        You will need an opening AND closing <ul> tags around the entire string, and <li> tags around each planet.
    //        console.log() your results.
    planetsArray.unshift ("<ul>");  //adding opening list tags
    console.log (planetsArray);

    planetsArray.push ("</ul>");  //adding closing list tags
    console.log (planetsArray);

    var planetsList = planetsArray.join (" </li> <li> "); //adding li open & close tags and converting to string
    console.log (planetsList);

    var planetsArrayList = planetsList.split (" "); //convert back to array in order to remove exterraneous li tags
    console.log (planetsArrayList);

    console.log ("the length of the array is: " + planetsArrayList.length); //find out how many items are in the array, need to remove first </li> and last <li>
    
    planetsArrayList.splice (1, 1); //removing exterraneous </li> at index 1
    planetsArrayList.splice (25, 1); //removing exterraneous <li> at index 25
    console.log (planetsArrayList);

    var planetsWithListTags = planetsArrayList.join (" "); //converting array with tags back to string with tags
    console.log (planetsWithListTags);

// })();
