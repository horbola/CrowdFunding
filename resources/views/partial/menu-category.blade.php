<div id="menu-category" class="widget">
    <ul class="list-unstyled sidebar-nav mb-0 p-0" id="navmenu-nav">
        @foreach($categories as $category)
        <li class="navbar-item account-menu px-0 @if($active === $category->id) active @endif">
            <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => $category->id, 'indexInvestigation' => request()->indexInvestigation]) }}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4" onclick="updateMenuLink()">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">{{$category->category_name}}</h6>
            </a>
        </li>
        @endforeach()
    </ul>
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
</div>