<div id="profile-content">
    <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-sm-12 col-md-3 tag">
                <div class="py-2">
                    <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                    <h6 class="text-primary mb-0 d-inline-block">Name :</h6>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 field">
                <div class="p-2">
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" style="">
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
                <div class="p-2 info">
                    <div class="custom-control custom-radio custom-control-inline">
                        <div class="form-check mb-0">
                            <input class="form-check-input" {{ ($user->gender == 'male')? "checked" : ""}} type="radio" name="gender" value="male" id="gender1">
                            <label class="form-check-label" for="gender1">Male</label>
                        </div>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <div class="form-check mb-0">
                            <input class="form-check-input" {{ ($user->gender == 'female')? "checked" : ""}} type="radio" name="gender" value="female" id="gender2">
                            <label class="form-check-label" for="gender2">Female</label>
                        </div>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <div class="form-check mb-0">
                            <input class="form-check-input" {{ ($user->gender == 'others')? "checked" : ""}} type="radio" name="gender"  value="others" id="gender3">
                            <label class="form-check-label" for="gender3">Others</label>
                        </div>
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
                <div class="p-2 info">
                    <span class="text-muted ml-2">Edit Password</span>
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
                <div class="p-2">
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" style="">
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
                <div class="p-2">
                    <input type="text" name="website" class="form-control" value="{{ $user->website }}" style="">
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
                <div class="p-2">
                    <select name="country_id" class="form-control mb-1">
                        <option value="{{ $user->address->country->id }}">{{ $user->countryNiceName }}</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 ">
            <button type="submit" class="btn btn-primary btn-md px-5" tabindex="-1" aria-disabled="true">Save Changes</a>
        </div>
    </form>
</div><!--end col-->
