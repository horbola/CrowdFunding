
// progress bar
$('svg.radial-progress').each(function( index, value ) { 
    $(this).find($('circle.complete')).removeAttr( 'style' );
});
  
$(window).scroll(function(){
    $('svg.radial-progress').each(function( index, value ) { 
      // If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
      if ( 
          $(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.75) &&
          $(window).scrollTop() < $(this).offset().top + $(this).height() - ($(window).height() * 0.25)
      ) {
          // Get percentage of progress
          percent = $(value).data('percentage');
          // Get radius of the svg's circle.complete
          radius = $(this).find($('circle.complete')).attr('r');
          // Get circumference (2πr)
          circumference = 2 * Math.PI * radius;
          // Get stroke-dashoffset value based on the percentage of the circumference
          strokeDashOffset = circumference - ((percent * circumference) / 100);
          // Transition progress for 1.25 seconds
          $(this).find($('circle.complete')).animate({'stroke-dashoffset': strokeDashOffset}, 1250);
      }
    });
}).trigger('scroll');

  /*  Sticky Header */
$(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 10) {
      $(".header-bottombar").addClass("header-sticky");
      headerStickyFix();
    } else {
      $(".header-bottombar").removeClass("header-sticky");
    }
});

function headerStickyFix(){
    $(".header-bottombar").offset().top = '0px';
}

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





/* carousels in home page */
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




/* carousels in campaign page */
//$(initOwlCarousel());
function initOwlCarousel(){
    // campaign image carousel ---------------------------------------------------------------------------------------------------------------
    var image = $("#campaign-image");
    var thumb = $("#campaign-image-thumb");
    var slidesPerPage = 8; //globaly define number of elements per page
    var syncedSecondary = true;

    image.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: false,
        autoplay: false, 
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        // navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
    });
    


    // document image carousel ---------------------------------------------------------------------------------------------------------------
    $(".documents-carousel").owlCarousel({
        items: 1,
        dots: false,
        margin: 20
    });
}

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







$('.owl-carousel').owlCarousel({
    items: 1,
        slideSpeed: 2000,
        nav: false,
        autoplay: false, 
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
})