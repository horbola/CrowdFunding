<div class="">
    <div class="owl-carousel owl-theme">
        <div class="item border border-1"><h4>1</h4></div>
        <div class="item border border-1"><h4>2</h4></div>
        <div class="item border border-1"><h4>3</h4></div>
        <div class="item border border-1"><h4>4</h4></div>
        <div class="item border border-1"><h4>5</h4></div>
        <div class="item border border-1"><h4>6</h4></div>
        <div class="item border border-1"><h4>7</h4></div>
    </div>
</div>


@section('campaign-detail-image-test-style')
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" />
<style> 
    
</style>
@endsection


@section('campaign-detail-image-test-script-bottom')
<script>
    function initOwlCarousel(){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            items: 1
            
        })
    }
</script>
<script onload="initOwlCarousel()" src="{{ asset('js/owl.carousel.min.js') }}"></script>
@endsection