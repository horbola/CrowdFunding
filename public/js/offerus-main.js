// main scripts

// //nav position
// const navbar = document.querySelector('.home');
// window.onscroll = () => {
//     if ($(window).width() > 1199 && window.scrollY > 10) {
//         navbar.classList.add('scrolled');
//     } else {
//         navbar.classList.remove('scrolled');
//     }
// };
// $(function () { 
//     $(window).scroll(function () {
//         if ($(window).width() < 1200 || $(this).scrollTop() < 10) { 
//             $('.navbar .navbar-brand img').attr('src','images/logo-a.png');
//             $('.search-fields .search-icon').attr('src','images/icons/search-icon.png');
//         }
//         if ($(window).width() > 1199 && $(this).scrollTop() > 10) { 
//             $('.navbar .navbar-brand img').attr('src','images/logo-b.png');
//             $('.search-fields .search-icon').attr('src','images/icons/search-icon-dark.png');
//         }
//     })
// });










// campaign slider
$(document).ready(function() {
    var bigimage = $("#big");
    var thumbs = $("#thumbs");
    //var totalslides = 10;
    var syncedSecondary = true;

    bigimage
        .owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: false,
        autoplay: false,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText: [
        '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
        '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
        ]
    })
        .on("changed.owl.carousel", syncPosition);

    thumbs
        .on("initialized.owl.carousel", function() {
        thumbs
        .find(".owl-item")
        .eq(0)
        .addClass("current");
    })
        .owlCarousel({
        items: 4,
        dots: true,
        nav: true,
        navText: [
        '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
        '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
        ],
        smartSpeed: 200,
        slideSpeed: 500,
        slideBy: 4,
        responsiveRefreshRate: 100
    })
        .on("changed.owl.carousel", syncPosition2);

    function syncPosition(el) {
        //if loop is set to false, then you have to uncomment the next line
        //var current = el.item.index;

        //to disable loop, comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

        if (current < 0) {
        current = count;
        }
        if (current > count) {
        current = 0;
        }
        //to this
        thumbs
        .find(".owl-item")
        .removeClass("current")
        .eq(current)
        .addClass("current");
        var onscreen = thumbs.find(".owl-item.active").length - 1;
        var start = thumbs
        .find(".owl-item.active")
        .first()
        .index();
        var end = thumbs
        .find(".owl-item.active")
        .last()
        .index();

        if (current > end) {
        thumbs.data("owl.carousel").to(current, 100, true);
        }
        if (current < start) {
        thumbs.data("owl.carousel").to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
        var number = el.item.index;
        bigimage.data("owl.carousel").to(number, 100, true);
        }
    }

    thumbs.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        bigimage.data("owl.carousel").to(number, 300, true);
    });
});







//// progress bar
//$('svg.radial-progress').each(function( index, value ) { 
//    $(this).find($('circle.complete')).removeAttr( 'style' );
//  });
//  
//$(window).scroll(function(){
//    $('svg.radial-progress').each(function( index, value ) { 
//      // If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
//      if ( 
//          $(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.75) &&
//          $(window).scrollTop() < $(this).offset().top + $(this).height() - ($(window).height() * 0.25)
//      ) {
//          // Get percentage of progress
//          percent = $(value).data('percentage');
//          // Get radius of the svg's circle.complete
//          radius = $(this).find($('circle.complete')).attr('r');
//          // Get circumference (2πr)
//          circumference = 2 * Math.PI * radius;
//          // Get stroke-dashoffset value based on the percentage of the circumference
//          strokeDashOffset = circumference - ((percent * circumference) / 100);
//          // Transition progress for 1.25 seconds
//          $(this).find($('circle.complete')).animate({'stroke-dashoffset': strokeDashOffset}, 1250);
//      }
//    });
//}).trigger('scroll');





$(function(){
    $('svg.radial-progress').each(function (index, value) {
        $(this).find($('circle.complete')).removeAttr('style');
        progCircle($(this));
    });
});

function progCircle(thiss){
    var percent = parseInt( $(thiss).data('percentage') );
    if ( isNaN(percent) ) percent = 100;
    if ( percent < 0 ) percent = 0;
    if ( percent > 100 ) percent = 100;
        
    var radius = $(thiss).find($('circle.complete')).attr('r');
    var circumf = 2 * Math.PI * radius;
    
    var strokeDashOffset = circumf - ((percent * circumf) / 100);
    $(thiss).find($('circle.complete')).animate({'stroke-dashoffset': strokeDashOffset}, 1250);
}








//campaign slider triggerd
$(document).ready(function () {
    
    $(".reply-bt").on("click",function(){
        $(this).parent().parent().find('.reply-form').toggle();
    });

    $('.owl-carouselCamp').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            1200: {
                items: 2,
                nav: true,
                margin: 50
            },
            1600: {
                items: 3,
                nav: true,
                loop: true,
                margin: 60
            }
        }
    });
});




$('.Trending').slick({
    autoplay:true,
    autoplaySpeed: 1000,
    infinite: true,
    speed: 600,
    slidesToShow: 3,
    arrows: true,
    dots: false,
    prevArrow: $('.slider-prev-1'),
    nextArrow: $('.slider-next-2'),
    responsive: [{
        breakpoint: 991,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          dots: true,
        }
      }
    ]
});
  
$('.slider-2').slick({
    autoplay:true,
    autoplaySpeed: 1000,
    infinite: true,
    speed: 600,
    slidesToShow: 3,
    arrows: true,
    dots: false,
    prevArrow: $('.slider-prev '),
    nextArrow: $('.slider-next'),
    responsive: [{
        breakpoint: 991,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          dots: true,
        }
      }
    ]
});


$('.slider-3').slick({
    autoplay:true,
    autoplaySpeed: 1000,
    infinite: true,
    speed: 400,
    slidesToShow: 3,
    arrows: true,
    dots: false,
    prevArrow: $('.slider-prev'),
    nextArrow: $('.slider-next'),
    responsive: [{
        breakpoint: 991,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          dots: true,
        }
      }
    ]
});

/*  Sticky Header */
$(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 10) {
      $(".header-bottombar").addClass("header-sticky");
    } else {
      $(".header-bottombar").removeClass("header-sticky");
    }
});



// navbar home scroller
if ($('body').hasClass('home')) {
    const navbar = document.querySelector('.home');
    window.onscroll = () => {
        if (window.scrollY > 10) {
            navbar.classList.add('sc');
        } else {
            navbar.classList.remove('sc');
        }
    };
}
