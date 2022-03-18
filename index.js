$(document).ready(function(){
    $(window).scroll(function() { // check if scroll event happened
      if ($(document).scrollTop() > 50) { // check if user scrolled more than 50 from top of the browser window
        $(".sticky-top").css("background-color", "black"); // if yes, then change the color of class "navbar-fixed-top" to white (#f8f8f8)
      } else {
        $(".sticky-top").css("background-color", "rgba(0, 0, 0, 0.5)"); // if not, change it back to transparent
      }
    });
  });
  function flight(){
    document.getElementById("flight").style.visibility = "visible";
    document.getElementById("hotel").style.visibility = "hidden";
    document.getElementById("rent").style.visibility = "hidden";
    document.getElementById("btn1").style.cssText = "background-color:#1297DC; color:white";
    document.getElementById("btn2").style.cssText = "none";
    document.getElementById("btn3").style.cssText = "none";
} 
  function hotel(){
    document.getElementById("hotel").style.visibility = "visible";
    document.getElementById("flight").style.visibility = "hidden";
    document.getElementById("rent").style.visibility = "hidden";
    document.getElementById("btn2").style.cssText = "background-color:#1297DC; color:white";
    document.getElementById("btn1").style.cssText = "none";
    document.getElementById("btn3").style.cssText = "none";
}
function rent(){
    document.getElementById("flight").style.visibility = "hidden";
    document.getElementById("hotel").style.visibility = "hidden";
    document.getElementById("rent").style.visibility = "visible";
    document.getElementById("btn1").style.cssText = "none";
    document.getElementById("btn2").style.cssText = "none";
    document.getElementById("btn3").style.cssText = "background-color:#1297DC; color:white";
}  
function onfun(){
    document.getElementById("btn1").style.cssText = "background-color:#1297DC; color:white";
}
