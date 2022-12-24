(function($) {

    "use strict";

    // preloader

    $(window).on('load', function() {

      $("#preloader").delay(300).addClass('loaded');

      // $('#status').fadeOut();

      $('#preloader').delay(1000).fadeOut('slow');

      $('body').delay(1000).css({'overflow':'visible'});

    });





    // 992px nav icon when header shrink

    if ($(window).width() < 800) {

        $(window).scroll(function() {

           var scroll = $(window).scrollTop();

           if (scroll > 30) {

              $("body").addClass("abd-nav-icon");

           } else {

              $("body").removeClass("abd-nav-icon");

           }

       });

     };



    // Home slider

     $('#abd-slider').slick({

         dots: true,

         arrows: false,

         infinite: true,

         speed: 500,

         fade: true,

         cssEase: 'linear',

         autoplay: true,

     });



     // Partner

    $('#abd-partner-slider').slick({

        dots: true,

        arrows: false,

        infinite: true,

        speed: 500,

        fade: true,

        cssEase: 'linear',

        autoplay: true,

    });



     // passenger testimonial

     $('#abd-testimonial').slick({

         dots: true,

         arrows: true,

         infinite: true,

         speed: 500,

         fade: true,

         cssEase: 'linear',

         autoplay: true,

         responsive: [

           {

             breakpoint: 1199,

             settings: {

               arrows: false,

             }

           },

         ]

     });



     //Cabgo carousel

     $('#abd-cabgo-carousel').slick({

       slidesToShow: 4,

       slidesToScroll: 1,

       autoplaySpeed: 2000,

       dots: false,

       arrows: true,

       autoplay: true,

       responsive: [

         {

           breakpoint: 992,

           settings: {

             slidesToShow: 3,

             arrows: false,

           }

         },

         {

           breakpoint: 768,

           settings: {

             slidesToShow: 2,

           }

         },

         {

           breakpoint: 480,

           settings: {

             slidesToShow: 1,

           }

         },

       ]

     });



     // load more data

     $(function () {

        var TotalElement = $(".abd-data-row").length;

        var currentElement = 9;

        $(".abd-data-row").slice(0, 9).show();



        $("#loadMore").on('click', function (e) {

            e.preventDefault();

            $(".abd-data-row:hidden").slice(0, 3).fadeIn('600');

            currentElement=currentElement+3;

            if (TotalElement <= currentElement) {

                $(".abd-loadmore-data").css({"display":"none"});

            }

        });

    });

     $(function () {

        var TotalElement = $(".abd-data-row2").length;

        var currentElement = 9;

        $(".abd-data-row2").slice(0, 9).show();



        $("#loadMore2").on('click', function (e) {

            e.preventDefault();

            $(".abd-data-row2:hidden").slice(0, 3).fadeIn('600');

            currentElement=currentElement+3;

            if (TotalElement <= currentElement) {

                $(".abd-loadmore-data2").css({"display":"none"});

            }

        });

    });



    $("#editbtn").click(function(){

          $("input").removeAttr("disabled");

          $("textarea").removeAttr("disabled");

          $('.abd-save').css({"display": "block"});

    });

    // onclick class and remove

    $(".abd-user-search form input").click(function(){

          $(".abd-users-nav").removeClass("collapse-nav");

          $(".abd-chat-list").removeClass("collapse-list");

          $(".abd-messages-body").css({"overflow":"hidden"});

    });

    $(".abd-chat-list").click(function(){

          $(".abd-users-nav").addClass("collapse-nav");

          $(".abd-chat-list").addClass("collapse-list");

          $(".abd-messages-body").css({"overflow":"inherit"});

    });



    // Mixitup initialize

    $(function () {

        var abdVehicles = document.querySelector('.abd-vehicle-items');

        if(abdVehicles){

          var mixer = mixitup(abdVehicles, {

                animation: {

                   effects: 'fade translateZ(-100px)',

                },

          });

        }

    });

    $('.donation-slider').slick({
        slidesToShow: 4,

       slidesToScroll: 1,

       autoplaySpeed: 2000,

       dots: false,

       arrows: true,

       autoplay: true,

       responsive: [

         {

           breakpoint: 992,

           settings: {

             slidesToShow: 3,

             arrows: false,

           }

         },

         {

           breakpoint: 768,

           settings: {

             slidesToShow: 2,

           }

         },

         {

           breakpoint: 480,

           settings: {

             slidesToShow: 1,

           }

         },

       ]
    });

})(jQuery); // End of use strict

