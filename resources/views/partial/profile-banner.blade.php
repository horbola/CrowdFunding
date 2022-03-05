<div class="card public-profile border-0 rounded shadow" style="z-index: 1;">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-3 text-md-start text-center">
                <div id="s-avatar">
                    <form action="{{ route('user.updatePhoto') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <!--callihng showUpload() on label gets invoked two times-->
                        <label for="avatar" data-toggle="tooltip" data-placement="top" title="Change Photo" class="position-relative">
                            <input type="file" id="avatar" accept="image/png,image/jpeg" name="avatar" style="display: none">
                            <img src="{{ Auth::user()->avatar() }}" class="avatar avatar-small rounded-circle shadow d-block mx-auto" alt="" onclick="showUpload();">
                            <input type="submit" id="avatar-up" value="Upload" style="position: absolute;bottom: -10px;left: 35px;display: none" onclick="hideUpload();">
                        </label>
                    </form>
                    <script>
                        function showUpload(){
                            $('#avatar-up').css('display', 'block');
                        }
                        function hideUpload(){
                            $('#avatar-up').css('display', 'none');
                        }
                    </script>
                </div>
            </div><!--end col-->

            <div class="col-lg-10 col-md-9">
                <div class="row align-items-end">
                    <div class="col-md-7 text-md-start text-center mt-4 mt-sm-0">
                        <h3 class="title mb-0">{{ Auth::user()->name }}</h3>
                        <small class="text-muted h6 me-2">{{ Auth::user()->userIndex() }}</small>
                        <ul class="list-inline mb-0 mt-3">
                            <li class="list-inline-item me-2">Donated: {{ App\Library\Helper::formatMoneyFigure(Auth::user()->totalDonation()) }}</li>
                            <li class="list-inline-item">Raised: {{ App\Library\Helper::formatMoneyFigure(Auth::user()->totalFund()) }}</li>
                        </ul>
                    </div><!--end col-->
                    <div class="col-md-5 text-md-end text-center">
                        <ul class="list-unstyled social-icon social mb-0 mt-4">
                            <li class="list-inline-item"><a href="{{route('preference.index')}}" class="rounded" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Settings"><i class="uil uil-cog align-middle"></i></a></li>
                        </ul><!--end icon-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div>
</div>
