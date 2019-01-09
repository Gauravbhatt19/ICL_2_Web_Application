function dp() {
document.getElementById('mn').classList.toggle('shw');
}
function show(x){
	 var sid='dd'+x;
	 document.getElementById(sid).classList.toggle('shw');
}
function big(x){
	 var sid='dd'+x;
	 sid=document.getElementById(sid);
	 sid.classList.toggle('imgbig');
	 sid.zIndex='1000';
}
$(document).ready(function(){
 // Add smooth scrolling to all links
  $("a.smooth").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});