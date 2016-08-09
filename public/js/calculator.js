"use strict"
// (function (){
//add event listeners to each number button that will input numbers to first or third text boxes
var numbers = document.getElementsByClassName('number');
for (var i = 0; i < numbers.length; i += 1) {
    numbers[i].addEventListener("click", clickNumber);
}

var leftInput = document.getElementById("leftInput");
var rightInput = document.getElementById("rightInput");
//move into writing number values into left input
function clickNumber () {
    var buttonValue = this.value;
    console.log (buttonValue);
    if (operatorInput.value === "") {
        leftInput.value = leftInput.value + parseFloat(buttonValue);
    } else {
        rightInput.value = rightInput.value + parseFloat(buttonValue);
    }
}
//add event listeners to each operator that will input operator to middle text box
var operatorInput = document.getElementById("operatorInput");

var clickAdd = function () {
    operatorInput.value = "+";
}
document.getElementById("add").addEventListener("click", clickAdd);

var clickSubtract = function () {
    operatorInput.value = "-";
}
document.getElementById("subtract").addEventListener("click", clickSubtract);

var clickMultiply = function () {
    operatorInput.value = "x";
}
document.getElementById("multiply").addEventListener("click", clickMultiply);

var clickDivide = function () {
    operatorInput.value = "/";
}
document.getElementById("divide").addEventListener("click", clickDivide);

//make an equals function
document.getElementById("total").addEventListener("click", clickEqual);

function clickEqual () {
    var operator = document.getElementById("total");
    var total;
    switch (operatorInput.value) {
        case "+": 
            total = parseFloat(leftInput.value) + parseFloat(rightInput.value);
            break; 
        case "-": 
            total = parseFloat(leftInput.value) - parseFloat(rightInput.value);
            break;
        case "x":
            total = parseFloat(leftInput.value) * parseFloat(rightInput.value);
            break;
        case "/":
            total = parseFloat(leftInput.value) / parseFloat(rightInput.value);
            if (rightInput.value == 0) {
                total = "cannot divide by 0";
            }   
            break;
    }
    console.log (total);
    operatorInput.value = "";
    rightInput.value = "";
    leftInput.value = total; 
}

document.getElementById("clear").addEventListener("click", clear)
function clear () {
    leftInput.value = "";
    rightInput.value = "";
    operatorInput.value = "";
}
//console.log every number/button w/an event listener
// function clickButton(){
//     console.log(this.value);
// }
//concerns/snags:
//is the value a number or a string - parseFloat ()
//each time you hit a button/number, the input is replaced by, not appended with the new number
//display = display + newValue
//var display = document.getElementById ("leftinput") value
//as soon as we hit an operator we need our "focus" to point to rightInput
//function with conditionals - check if left input has something, if the operatorinput has something...
//underfined, getting NaN, divide by zero


//then insert concatenated numbers to value 2

//add event listener to clear button that will clear all input fields


// })();