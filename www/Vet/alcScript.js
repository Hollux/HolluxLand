/* Owl Carousel */

$(document).ready(function () {

    $("#carousel").owlCarousel({

        autoPlay: 10000, //Set AutoPlay to 3 seconds

        navigation: true, // Show next and prev buttons
        slideSpeed: 1000,
        paginationSpeed: 2000,
        singleItem: true

    });

});


$(document).ready(function () {

    $('.menuHide').click(function () {
        if ($(".totoTxt").hasClass('hide')) {
            $(".totoTxt").removeClass("hide");
            $(".nav2b").removeClass("marge");
        } else {
            $(".totoTxt").addClass("hide");
            $(".nav2b").addClass("marge");
        }
    });
});



