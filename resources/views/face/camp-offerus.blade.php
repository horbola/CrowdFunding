@extends('layout.face-offerus.skel')


@section('content')
<section style="margin-bottom:0px!important;" class="container-fluid campaign-main">
    <div class="container">
        <div class="row">
            <div class="col">
                @include('partial.camp-offerus.action-btns')
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        @include('partial.camp-offerus.heading')
                    </div>
                    <div class="col-12">
                        @include('partial.camp-offerus.slider-feature')
                    </div>
                    <div class="col-12">
                        @include('partial.camp-offerus.tabs')
                    </div>
                    <div class="col-12">
                        @include('partial.camp-offerus.investig')
                    </div>
                    <div class="col-12">
                        @include('partial.camp-offerus.sidebar-mobile')
                    </div>
                    <div class="col-12">
                        @include('partial.camp-offerus.comment')
                    </div>
                </div>
            </div>
            <!-- sidebar -->
            <div class="col-lg-4">
                @include('partial.camp-offerus.sidebar')
            </div>
        </div>
    </div>
</section>
@include('partial.camp-offerus.related')
@include('partial.camp-offerus.founder')
<section>
    @include('partial.campaign-update-model')
</section><!--end section-->
@endsection



@section('og')
<meta name="twitter:title" content="{{ $campaign->title }}">
<meta name="twitter:description" content="{{ $campaign->short_description }}">
<meta name="twitter:image" content="{{ $campaign->feature_image }}" class="image-uri">
<meta name="twitter:card" content="product">
<meta name="twitter:site" content="Oporajoy Crowd Funding">
<meta name="twitter:creator" content="@author_handle">

<!-- Open Graph data -->
<meta property="og:title" content="{{ $campaign->title }}" />
<meta property="og:type" content="website" />
<meta property="og:description" content="{{ $campaign->short_description }}" />
<meta property="og:image" content="{{ $campaign->feature_image }}" class="image-uri"/>
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:image:alt" content="{{ $campaign->title }}" />
<meta property="og:site_name" content="Oporajoy Crowd Funding" />
<meta property="og:url" content="{{ URL::current() }}" />
<!--<meta property="fb:app_id" content="">-->
@endsection

@section('page-style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    @media screen and (max-width: 600px){
        @media only screen and (min-width:600px){
            .nav-item.as{
                padding-left: 15px !important;padding-right: 15px !important;
            }
        }
    }
</style>
<style>
    #shareModal {
        position: absolute;
        top: -70px;
        right: -110px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

    }
    #shareModal ul {
        list-style: none;
        border: 1px solid #198754;
        border-radius: 3px;
        padding: 7px 7px;
    }
    #shareModal li {
        display: inline-block;
        padding: 0px 1px;
    }
    #share-btns .share-img {
        cursor: pointer;
    }
</style>
@endsection



@section('page-script-bottom')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        width: '100%',
        height: '100%',
        disableResizeEditor: true,
        toolbar: []
    });
    $('#summernote').next().find(".note-editable").attr("contenteditable", false);
    $('.note-statusbar').hide();
</script>

<!--share script-->
<script>
    let postUrl = encodeURI(document.location.href);
    let imageUrl = encodeURI('https://' + document.location.host + '{{ $campaign->feature_image }}');
    let postTitle = encodeURI('{{ $campaign->title }}');
    let postTitleRaw = '{{ $campaign->title }}';
    
    $('.image-uri').each(function(ind, elem){
        $(this).attr('content', imageUrl);
    });
    
    
    $('#share-btns .share-img').click((e)=>{
        let isActive = $(e.target).parent('#share-btns').attr('data-camp-id');
        if(isActive === '1'){
            if(isMobile() && navigator.share){
                mobileShare();
            }
            else {
                $('#shareModal .inner').toggleClass('d-none');
                if( !$('#shareModal .inner').hasClass('d-none') )
                    pcShare();
            }
        }
        e.stopPropagation();
    });
    
    $(document).click(()=>{
        if( !$('#shareModal .inner').hasClass('d-none') )
            $('#shareModal .inner').addClass('d-none');
    });
    
    function mobileShare(){
        if( !$('#shareModal .inner').hasClass('d-none') )
            $('#shareModal .inner').addClass('d-none');

        navigator.share({
            title: postTitleRaw,
            url: postUrl
        }).then((result) => {
            alert('Thank You for Sharing.');
        }).catch((err) => {
            alert('Something went wrong. Please try to share again.');
        });
    }
    
    function pcShare(){
        $('#share-btns .fa-envelope-o').unwrap().wrap(`<a href="https://mail.google.com/mail/?view=cm&su=${postTitle}&body=${postUrl}" id="gmail-btn"></a>`);
        $('#share-btns .fa-facebook-square').unwrap().wrap(`<a href="https://www.facebook.com/sharer/sharer.php?u=${postUrl}" id="gmail-btn"></a>`);
        $('#share-btns .fa-twitter-square').unwrap().wrap(`<a href="https://twitter.com/share?url=${postUrl}&text=${postTitle}" id="gmail-btn"></a>`);
        $('#share-btns .fa-linkedin-square').unwrap().wrap(`<a href="https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}" id="gmail-btn"></a>`);
        $('#share-btns .fa-whatsapp').unwrap().wrap(`<a href="https://wa.me/?text=${postTitle}$url=${postUrl}" id="gmail-btn"></a>`);
    }

    function isMobile(){
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        return isMobile;
    }
</script>
@endsection
