(function(){
    "use strict";

    // TODO: Create an array of 4 people's names using literal array notation, in a variable called 'names'.
    var names = ['Justin', 'Erika', 'Curtis', 'Karen'];

    // TODO: Create a log statement that will log the number of elements in the names array.
    console.log ("The number of elements in the array is " + names.length);

    // TODO: Create log statements that will print each of the names array elements individually.
    console.log (names [0]);
    console.log (names [1]);
    console.log (names [2]);
    console.log (names [3]);

//=================================//

    var element;

    element = names [0];
    console.log (element);

    element = names [1];
    console.log (element);

    element = names [2];
    console.log (element);

    element = names [3];
    console.log (element);

//==================================//
    
    var element;

    for (var i = 0; i < names.length; i += 1) {
        element = names [i];
        console.log (element);  
    }
//=========================================//
    
    names.forEach (function (name, index, array) {
        console.log (name);
    });

//========================================================//

    //challenge - make a new array with the names in reverse order
    var namesInReverseOrder = names.reverse();
    console.log (namesInReverseOrder);
    

})();
