@extends('user.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('user.partials.rtl-style')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{__('Edit Profile')}}</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{route('user-dashboard')}}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{__('Edit Profile')}}</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">{{__('Update Profile')}}</div>
                </div>
                <div class="card-body pt-5 pb-5">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form id="ajaxForm" class="" action="{{route('user-profile-update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label for="image"><strong>{{ __('Image') . '*' }}</strong></label>
                                            </div>
                                            <div class="col-md-12 showImage mb-3">
                                                <img
                                                    src="{{isset($user->photo) ? asset('assets/front/img/user/' . $user->photo) : asset('assets/admin/img/noimage.jpg')}}"
                                                    alt="..."
                                                    class="img-thumbnail">
                                            </div>
                                            <input type="file" name="photo" id="image" class="form-control">
                                            <p id="errphoto" class="mt-2 mb-0 text-danger em"></p>
                                            <p class="text-warning mb-0">{{__('Upload 100 X 100 image for best quality')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{__('First Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
                                    <p id="errfirst_name" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">{{__('Last Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
                                    <p id="errlast_name" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">{{__('Company Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="company_name" value="{{$user->company_name}}">
                                    <p id="errcompany_name" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">{{__('Username')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="username" value="{{$user->username}}">
                                    <p id="errusername" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">{{__('Phone')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                    <p id="errphone" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">{{__('Address')}}</label>
                                    <textarea type="text" class="form-control" name="address" rows="5">{{$user->address}}</textarea>
                                    <p id="erraddress" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">{{__('City')}}</label>
                                    <input type="text" class="form-control" name="city" rows="5" value="{{$user->city}}">
                                    <p id="errcity" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">{{__('State')}}</label>
                                    <input type="text" class="form-control" name="state" rows="5" value="{{$user->state}}">
                                    <p id="errstate" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">{{__('Country')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="country" rows="5" value="{{$user->country}}">
                                    <p id="errcountry" class="mb-0 text-danger em"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form">
                        <div class="form-group from-show-notify row">
                            <div class="col-12 text-center">
                                <button type="submit" id="submitBtn" class="btn btn-success">{{__('Update')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
