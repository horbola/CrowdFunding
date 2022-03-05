<div id="enu-category" class="widget">
    <ul class="list-unstyled sidebar-nav mb-0 p-0" id="navmenu-nav">
        @foreach($categories as $category)
        {{-- <!--<li class="navbar-item account-menu px-0 {{ (($active === $category->id)) ? 'active' : '' }}">--> --}}
        <li class="category-menu navbar-item account-menu px-0" data-menu-id="{{ $category->id }}">
            <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => $category->id, 'indexInvestigation' => request()->indexInvestigation]) }}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil {{ $category->category_icon }}"></i></span>
                <h6 class="mb-0 ms-2">{{$category->category_name}}</h6>
            </a>
        </li>
        @endforeach()
    </ul>
    <script>
        $(function(){
            var activeMenu = '{{ $active }}';
            $('.category-menu').each(function(index, elem){
                $(elem).removeClass('active');
                if($(elem).attr('data-menu-id') === activeMenu){
                    $(elem).addClass('active');
                }
            });
        });
    </script>
</div>