"use strict";
(function () {


    var myNameIs = 'Liz'; // TODO: Fill in your name here.

    // TODO:
    // Create a function called 'sayHello' that takes a parameter 'name'.
    // When called, the function should log a message that says hello from the passed in name.
    function sayHello(name) {
        ("hello" + name);
        console.log ("hello " + name);
    }

    // TODO: Call the function 'sayHello' passing the variable 'myNameIs' as a parameter.
    sayHello(myNameIs);
    // Don't modify the following line
    // It generates a random number between 1 and 100 and stores it in random
    var random = Math.floor((Math.random()*100)+1);

    // TODO:
    // Create a function called 'isOdd' that takes a number as a parameter.
    // The function should use the ternary operator to log a message.
    // The log should tell the number passed in and whether it is odd or not.
    function isOdd(number) {
        (number % 2 !== 0) ? console.log (number + ": number is odd") : console.log (number + ": number is even");
    }

    // TODO: Call the function 'isOdd' passing the variable 'random' as a parameter.
    isOdd(random);

    //takes a needle and a haystack
    //returns true if the needles in the haystack, otherwise false

    function stringContains (haystack, needle){
        var index = haystack.indexOf(needle);
        if (index == -1) {
            return false;
        } else {
            return true;
        }
    }

    //take a string as input
    //return true if there is a " " in the string, otherwise false
    function hasASpace (stringToCheck) {
        var stringHasASpace = stringContains (stringToCheck, " ");
        return stringHasASpace;
    }

    //while the string has spaces
    function removeSpaces(phrase){

        while (hasASpace (phrase)) {
            phrase = phrase.replace(" ", "");
        }
        return phrase;
    }

    var result = removeSpaces("hello there Lassen!");
    console.log(result);
    
})();