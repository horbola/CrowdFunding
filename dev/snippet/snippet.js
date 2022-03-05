    
    // loads script dynamically and onload of that script a function
    // dpending on that exetes
    function loadScript( url, callback ) {
        var script = document.createElement( "script" );
        script.type = "text/javascript";
        if(script.readyState) {  // only required for IE <9
          script.onreadystatechange = function() {
            if ( script.readyState === "loaded" || script.readyState === "complete" ) {
              script.onreadystatechange = null;
              callback();
            }
          };
        } else {  //Others
          script.onload = function() {
            callback();
          };
        }

        script.src = url;
        document.getElementsByTagName( "head" )[0].appendChild( script );
    }


  // call the function...
  loadScript('http://localhost:8000/js/owl.carousel.min.js', function() {
    $(".owl-carousel").owlCarousel({
        margin: 10,
        dots: true,
        loop: true,
        autoplay: false,
        nav: true,
        items: 2,
        center: true,
        dontsEach: false
    });
  });