<div id="category-menu" class="widget">
    <ul class="list-unstyled sidebar-nav mb-0 p-0" id="navmenu-nav">
        @foreach($categories as $category)
        <li class="navbar-item account-menu px-0 @if($active === $category->id) active @endif">
            <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => $category->id, 'indexInvestigation' => request()->indexInvestigation]) }}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">{{$category->category_name}}</h6>
            </a>
        </li>
        @endforeach()
    </ul>
</div>