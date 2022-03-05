<div class="">
    <div class="">
        <div id="campaign-image" class="owl-carousel owl-theme">
            <div class="item" style="max-height: 400px;">
                <img src="{{$campaign->feature_image}}"/>
            </div>
            @if($campaign->album->count())
                @foreach($campaign->album as $image)
                <div class="item" style="max-height: 400px;">
                    <img src="{{$image->image_path}}"/>
                </div>
                @endforeach
            @endif
        </div>
    </div>
    
    <div class="row align-items-center">
        <div class="col-6">
            <div id="campaign-image-thumb" class="owl-carousel owl-theme">
                @if($campaign->album->count())
                    <div class="item">
                        <img src="{{$campaign->thumbImagePath()}}"/>
                    </div>
                    @foreach($campaign->album as $image)
                    <div class="item">
                        <img src="{{$image->thumbImagePath()}}"/>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-6 text-right">
            here will be put short link
        </div>
    </div>
</div>


@section('campaign-detail-image-style')
<style>
    #campaign-image .item {
        background: #0c83e7;
        /*padding: 80px 0px;*/
        /*margin: 5px;*/
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
    }

    #campaign-image-thumb .item {
        /*background: #C9C9C9;*/
        margin: 5px;
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
        cursor: pointer;
        border: 1px solid transparent;
    }
    
    #campaign-image-thumb .item:first-child {
        margin-left: 0;
    }
    
    #campaign-image-thumb .current .item {
        border: 1px solid red;
    }

    #campaign-image.owl-theme {
        position: relative;
    }
</style>
@endsection


@section('campaign-detail-image-script-bottom')
<script>
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
        }).on('changed.owl.carousel', syncPosition);
        
        thumb.on('initialized.owl.carousel', function() {
            thumb.find(".owl-item").eq(0).addClass("current");
        }).owlCarousel({
            items: slidesPerPage,
            dots: false,
            nav: false,
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate: 100
        }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            //if you set loop to false, you have to restore this next line
            //var current = el.item.index;

            //if you disable loop you have to comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }

            //end block

            
            thumb.find(".owl-item")
                 .removeClass("current")
                 .eq(current)
                 .addClass("current");
            var onscreen = thumb.find('.owl-item.active').length - 1;
            var start = thumb.find('.owl-item.active').first().index();
            var end = thumb.find('.owl-item.active').last().index();

            if (current > end) {
                thumb.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                thumb.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                image.data('owl.carousel').to(number, 100, true);
            }
        }

        thumb.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            image.data('owl.carousel').to(number, 300, true);
        });
        // campaign image carousel ---------------------------------------------------------------------------------------------------------------
    }
</script>
<script onload="initOwlCarousel()" src="{{ asset('js/owl.carousel.min.js') }}"></script>
@endsection