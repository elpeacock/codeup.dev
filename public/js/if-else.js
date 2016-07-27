"use strict"

var a = 75;
var b = 80;
var c = 95;
var gradeAvg = ((a + b + c) / 3);
	console.log (gradeAvg);

if (gradeAvg > 80) {
	console.log("You're Awesome!");
} else {
	console.log("You need more practice.")
}

var cameronSpent = 180;
var ryanSpent = 250;
var georgeSpent = 320;
var discount = 0.35;
var applyDiscount = 200;

if (cameronSpent > applyDiscount) {
	var cameronTotal = (cameronSpent - (cameronSpent * discount));
	console.log ("Cameron spent $" + cameronSpent + ", discount was applied. Final payment: $" + cameronTotal + ".");
} else {
	console.log ("Cameron spent $" + cameronSpent + ", discount was not applied. Final payment: $" + cameronTotal + ".");
}

if (ryanSpent > applyDiscount) {
	var ryanTotal = (ryanSpent - (ryanSpent * discount));
	console.log ("Ryan spent $" +ryanSpent + ", discount was applied. Final payment: $" + ryanTotal + ".");
} else {
	console.log ("Ryan spent $" + ryanSpent + ", discount was not applied. Final payment: $" + ryanTotal + ".");
}

if (georgeSpent > applyDiscount) {
	var georgeTotal = (georgeSpent - (georgeSpent * discount));
	console.log ("George spent $" + georgeSpent + ", discount was applied. Final payment: $" + georgeTotal + ".")
} else {
	console.log ("George spent $" + georgeSpent + ", discount was not applied. Final payment: $" + georgeTotal + ".")
}

var flipACoin = Math.floor(Math.random()* 2);

if (flipACoin == 0) {
	console.log ("buy a car");
} else {
	console.log ("buy a house");
}
