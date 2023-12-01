// script.js
jQuery(document).ready(function($) {
var cont = $(".neon-lit-background");
var neon = $(".neon-border");
setInterval(function() {
  var i = Math.floor((Math.random() * 10) + 1) * 200;
  setTimeout(function() {
    setTimeout(function() {
        $(cont).addClass("neon-lit-background--poweroff");
        $(neon).addClass("neon-border--poweroff");
      }, i),
      $(cont).removeClass("neon-lit-background--poweroff");
    $(neon).removeClass("neon-border--poweroff");
  }, 1000);
}, 2000);
    console.log('Fancy Neon Effect script loaded!');
    // Add your fancy neon effect code here
});