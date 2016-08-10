"use strict"
// (function (){

////////////add event listeners to each number button/////////////////// 

var numbers = document.getElementsByClassName('number');
for (var i = 0; i < numbers.length; i += 1) {
    numbers[i].addEventListener("click", clickNumber);    
}

/////////////////////getting numbers into left/right input/////////////

var leftInput = document.getElementById("leftInput");
var rightInput = document.getElementById("rightInput");

function clickNumber() {
    var buttonValue = this.value;
    if (operatorInput.value === "") {
        leftInput.value = leftInput.value + buttonValue;
    } else {
        rightInput.value = rightInput.value + buttonValue;
    }
    // if (leftInput.value = total && operatorInput.value === ""){
    //     leftInput.value = buttonValue;
    // }
}

////////////////////////////Decimal button////////////////////////////

document.getElementById("decimal").addEventListener("click", addDecimal);

function addDecimal() {
    if (leftInput.value.indexOf(".") == -1 && leftInput.value !== "") {
        leftInput.value = leftInput.value + ".";
    } else if (rightInput.value.indexOf(".") == -1 && operatorInput.value !== "" && rightInput.value !== "") {
        rightInput.value = rightInput.value + ".";
    }
}
/////////////////add event listeners to each operator/////////////////////////
/////////////////function to add operator to operator input///////////////////

var operatorInput = document.getElementById("operatorInput");

function clickAdd() {
    operatorInput.value = "+";
}
document.getElementById("add").addEventListener("click", clickAdd);

function clickSubtract() {
    operatorInput.value = "-";
}
document.getElementById("subtract").addEventListener("click", clickSubtract);

function clickMultiply() {
    operatorInput.value = "x";
}
document.getElementById("multiply").addEventListener("click", clickMultiply);

function clickDivide() {
    operatorInput.value = "/";
}
document.getElementById("divide").addEventListener("click", clickDivide);

function clickPercent() {
    operatorInput.value = "%";
}
document.getElementById("percent").addEventListener("click", clickPercent);

function clickSquareRoot() {
    operatorInput.value = "√";
}
document.getElementById("squareRoot").addEventListener("click", clickSquareRoot);

////////////////////////make an equals function/////////////////////////////

document.getElementById("total").addEventListener("click", clickEqual);

function clickEqual() {
    var operator = document.getElementById("total");
    var total;
    switch (operatorInput.value) {
        case "+": 
            total = parseFloat(leftInput.value).toFixed(5) + parseFloat(rightInput.value).toFixed(5);
            break; 
        case "-": 
            total = parseFloat(leftInput.value).toFixed(5) - parseFloat(rightInput.value).toFixed(5);
            break;
        case "x":
            total = parseFloat(leftInput.value).toFixed(5) * parseFloat(rightInput.value).toFixed(5);
            break;
        case "/":
            if (rightInput.value == 0) {
                alert("cannot divide by zero!");
                total = "";
                return;
            }   
            total = parseFloat(leftInput.value).toFixed(5) / parseFloat(rightInput.value).toFixed(5);
            break;
        case "√":
            if (leftInput.value < 0) {
                alert ("square root of a negative number does not exist!");
                total = "";
                return;
            }
            total = Math.sqrt(parseFloat(leftInput.value).toFixed(5));
            break;
        case "%":
            if (leftInput.value > 0 && leftInput.value < 1) {
                total = parseFloat(leftInput.value) * 100;
            } else if (leftInput.value > 1) {
                total = parseFloat(leftInput.value).toFixed(2) / 100;
            }
            break;
    }
    operatorInput.value = "";
    rightInput.value = "";
    leftInput.value = total; 
}

////////////////////////////Clear Button///////////////////////////////

document.getElementById("clear").addEventListener("click", clear);

function clear() {
    leftInput.value = "";
    rightInput.value = "";
    operatorInput.value = "";
}

////////////////////////////Negate or Reverse Negative/////////////////

document.getElementById("plusMinus").addEventListener("click", plusMinus);

function plusMinus() {
    if (leftInput.value != 0 && operatorInput.value == "") {
        leftInput.value = parseFloat(leftInput.value).toFixed(5) * (-1);
    } else if (rightInput.value != 0 && operatorInput.value != "") {
        rightInput.value = parseFloat(rightInput.value).toFixed(5) * (-1);
    }
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