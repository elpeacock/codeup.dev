"use strict"

$(document).ready(function(){
    alert("the DOM is dominating");

$('li').css('font-size', '20px');

$('h1, li, p').css('background-color', 'yellow');

var contents;
contents = $('h1').text();
alert(contents);

});
