"use strict";

// TODO: Ask the user for their name.
//       Keep asking if an empty input is provided.
var name;
do {
    name = prompt("What is your name?");
} while (name == "");

// TODO: Show an alert message that welcomes the user based on their input.
alert ("Greetings, " + name + "!");

// TODO: Ask the user if they like pizza.
//       Based on their answer show a creative alert message.
var userLikesPizza = confirm ("Do you like pizza, " + name + "?");
if (userLikesPizza === true) {
    alert ("Cowabunga, Dude! The Teenage Mutant Ninja Turtles favorite food is pizza!");
} else {
    alert ("You must be a Splinter, not a turtle....");
}

