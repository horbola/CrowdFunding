<div id="profile-content">
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Name :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info" data-toggle="modal" data-target="#profileEdit" onclick="adjustModelInfo(' Edit Name', 'name');">
                <a href="javascript:void(0)" class="text-muted">{{ $user->name }}</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Gender :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info" data-toggle="modal" data-target="#profileEdit" onclick="adjustModelInfo(' Edit Gender', 'gender');">
                <a href="javascript:void(0)" class="text-muted">{{ $user->gender }}</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Password :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info" data-toggle="modal" data-target="#profileEdit" onclick="adjustModelInfo(' Edit Password', 'password');">
                <a href="javascript:void(0)" class="text-muted">Edit Password</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Phone :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info" data-toggle="modal" data-target="#profileEdit" onclick="adjustModelInfo(' Edit Phone Number', 'phone');">
                <a href="javascript:void(0)" class="text-muted">{{ $user->phone }}</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Website :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info" data-toggle="modal" data-target="#profileEdit" onclick="adjustModelInfo(' Edit Website', 'website');">
                <a href="javascript:void(0)" class="text-muted">{{ $user->website }}</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Country :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info" data-toggle="modal" data-target="#profileEdit" onclick="adjustModelInfo(' Edit Country', 'country');">
                <a href="javascript:void(0)" class="text-muted">{{ $user->countryId }}</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- profile edit field Start -->
    <div class="modal fade" id="profileEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded shadow border-0">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title" id="productview-title">Adjusted dynamically</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.update', ['userID' => $user->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body p-4">
                        <div class="form-icon position-relative">
                            <i data-feather="user" class="others fea icon-sm icons" style="top: 10px"></i>
                            <input type="text" class="form-control others ps-5" value="" name="profileValue" placeholder="" maxlength="255">
                            <select name="profileValue" id="country" class="form-control mb-1">
                                <option value="">Select Country</option>
                                @foreach ($user->countries as $country)
                                <option value="{{ $country->nicename }}">{{ $country->nicename }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="profileItem" value="new value" name="profileItem">
                            <p class="help-block d-none">Error occurred</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- profile edit field End -->
    
    <script>
        function adjustModelInfo(title, profileItem){
            $('#profileEdit #productview-title').text(title);
            $('#profileEdit #profileItem').attr('value', profileItem);
            if(profileItem === 'country'){
                $('#profileEdit #others').addClass("d-none");
                $('#profileEdit #country').removeClass('d-none');
            }
        };
        $(function(){});
    </script>
</div><!--end col-->
