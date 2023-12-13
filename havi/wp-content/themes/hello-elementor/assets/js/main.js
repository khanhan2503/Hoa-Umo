(function($) {
  $(document).ready(function(){
    $("#header-ena").hide();
    $(window).scroll(function() {
      if ($(this).scrollTop() > 10) {
        $('#header-dis').hide();
       } else { 
        $('#header-dis').slideDown(500);
       };
      if ($(this).scrollTop() > 870) {
        $('#header-ena').slideDown(500);
      } else {
        $('#header-ena').slideUp(500);
      }
    });
  });
})(jQuery);