"use strict"

var luckyNumber = Math.floor(Math.random()* 6);
var spent = 60

switch (luckyNumber) {
    case 0:
        var discount = 0;
        var totalPaid = (spent - (spent * discount));
        console.log("No Discount for You! Your total is $" + totalPaid);
        break;
    case 1:
        discount = .10; 
        totalPaid = (spent - (spent * discount));
        console.log("You get a 10% discount, your new total is $" + totalPaid);
        break;
    case 2:
        discount = .25; 
        totalPaid = (spent - (spent * discount));
        console.log("You get a 25% discount, your new total is $" + totalPaid);
        break;
    case 3:
        discount = .35; 
        totalPaid = (spent - (spent * discount));
        console.log("You get a 35% discount, your new total is $" + totalPaid);
        break;
    case 4:
        discount = .50; 
        totalPaid = (spent - (spent * discount));
        console.log("You get a 50% discount, your new total is $" + totalPaid);
        break;
    case 5:
        discount = 1.0; 
        totalPaid = (spent - (spent * discount));
        console.log("Winner, winner chicken dinner! Your new total is free-ninety-nine!");
        break;
}

var monthNumber = Math.floor(Math.random()* 11 + 1);

switch (monthNumber) {
    case 1:
        console.log("January");
        break;
    case 2:
        console.log("February");
        break;
    case 3:
        console.log("March");
        break;
    case 4:
        console.log("April");
        break;
    case 5:
        console.log("May");
        break;
    case 6:
        console.log("June");
        break;
    case 7:
        console.log("July");
        break;
    case 8:
        console.log("August");
        break;
    case 9:
        console.log("September");
        break;
    case 10:
        console.log("October");
        break;
    case 11:
        console.log("November");
        break;
    case 12:
        console.log("December");
        break;
}