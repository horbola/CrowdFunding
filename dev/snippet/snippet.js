    
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
  
  
  
  
  
  
  
  
  
  
  <script>
        $(document).ready(function(){
            updateMenuLink();
            if($('#search-campaign').val()){
                $('#search-campaign').removeClass('border-0').addClass('border-info').focus();
            }
        });
        
        function updateMenuLink(){
            var q = $('#search-campaign').val();
            var f = $('#filter-campaign').val();
            var queryString = '';
            if(q) {queryString += 'q=' + q;}
            if(f) {
                if(queryString) queryString += '&f=' + f;
                else queryString += 'f=' + f;
            }

            if(q || f){
                $('#menu-category a.navbar-link').map(function(index, elem){
                    var href = $(elem).attr('href');
                    
                    // updating on click on anchor so that the query string isn't appended double
                    if(href.includes('q=') || href.includes('f=')){
                        // f should come before q
                        href = href.split('f=')[0];
                        href = href.split('q=')[0];
                        href = href.replace(href.charAt(href.length - 1), '');
                    }
                    
                    if(href.includes('?')) href += '&' + queryString;
                    else href += '?' + queryString;

                    $(elem).attr('href', href);
                });
            }
        }
    </script>