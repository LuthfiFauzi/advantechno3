$(document).ready(function(){
  var btn_scrollup = document.getElementById("scrollup") ;
    btn_scrollup.addEventListener('click', function(){
      $('html, body').animate({
        scrollTop: $("#content").offset().top
      }, 800, function() {
      window.location.hash = "#content";
    })
  })

    $(".nav-link").on('click', function(event) {
      console.log(1);
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function() {
            window.location.hash = hash;
          });
        }
      });
})
