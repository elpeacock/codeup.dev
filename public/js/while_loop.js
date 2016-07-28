"use strict"

// This is how you get a random number between 50 and 100
var startCones = Math.floor(Math.random() * 50) + 50;
// This is how you get a random number between 1 and 5

console.log("today I have to sell " + startCones + " ice cream cones.");
//first customer of the day
var conesLeftover = startCones;

do {
    var conesPerSale = Math.floor(Math.random() * 5) + 1;
    // conesLeftover =  startCones - conesPerSale; <---- this caused a perpetual loop, boo
    // console.log(startCones); <---- added to debug 
    // console.log("customer wants " + conesPerSale + ", sold customer " + conesPerSale); <--- moved stuff around, don't need this anymore
    // conesLeftover -= conesPerSale; <--- moved this into if/else loop
    // console.log(conesLeftover); <---debugging log
    if (conesLeftover >= conesPerSale) {
        conesLeftover -= conesPerSale;
        console.log ("customer bought " + conesPerSale + ", now there are " + conesLeftover + " cones left.");
    } else {
        console.log("I do not have " + conesPerSale + " , I only have " + conesLeftover + " cones to sell.");
    }

} while (conesLeftover > 0);

console.log("I sold them all. Peace out, girl scout.");