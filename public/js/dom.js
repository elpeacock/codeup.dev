"use strict";

var navbarLinkElements = document.getElementsByTagName ('a');
console.log(navbarLinkElements);

var delay = 2000;

var timeoutId = setTimeout (function () {
    for (var i = 0; i < navbarLinkElements.length; i += 1){
        console.log (navbarLinkElements[i]);
        navbarLinkElements[i].style.color = 'hotpink';
        navbarLinkElements[i].style.fontFamily = 'Fantasy';
        var link = "http://tetongravity.com";
        navbarLinkElements[i].setAttribute("href", link);
    }
    // navbarLinkElements.forEach (function(element){
    //     console.log (element);

    // });


    // navbarElement.style.color = "red";

}, delay);

