$(document).ready(function(){
    /* menu js script */
    $('.dropdown_menu_button').on("click",function(event) {
        event.preventDefault();
        $('.dropdown_menu_button').toggleClass('active');
        $('.dropdown_menu_list').toggleClass('active');
    });

    /* news ticker script */
    $(window).scroll(function() {
        if($(this).scrollTop() > 105) {
            $('.news-ticker').addClass('active');
        } else {
            $('.news-ticker').removeClass('active');
        };
    });

   /* search form script */
   $('.search-btn').on("click",function(event) {
	   event.preventDefault();
    	var click = $('.search-option');
        if(click.hasClass("addinput")) {
            click.removeClass("addinput");
        } else {
            click.addClass("addinput");
        }
   });
});
