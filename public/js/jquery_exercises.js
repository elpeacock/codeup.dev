"use strict"

$(document).ready(function(){
    alert("the DOM is dominating");

$("h1").click(function(){
    $(this).css("background-color", "green");
});

$("p").dblclick(function(){
    $("p").css("font-size", "18px");
});

$("li").hover(
    function(){
        $(this).css("color", "red");
    }, 
    function(){
        $(this).css("color", "black");
    }
);


});
