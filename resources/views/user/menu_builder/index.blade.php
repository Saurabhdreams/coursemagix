@extends('user.layout')

@section('styles')
<link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-iconpicker.min.css')}}">
@endsection

@includeIf('user.partials.rtl-style')

@php
    use App\Http\Helpers\UserPermissionHelper;
    use Illuminate\Support\Facades\Auth;
    $user = Auth::guard('web')->user();
    $package = UserPermissionHelper::currentPackage($user->id);
    if (!empty($user)) {
        $permissions = UserPermissionHelper::packagePermission($user->id);
        $permissions = json_decode($permissions, true);
    }
@endphp

@section('content')
<div class="page-header">
    <h4 class="page-title">{{__('Drag & Drop Menu Builder')}}</h4>
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
            <a href="#">{{__('Menu Builder')}}</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card-title">{{__('Menu Builder')}}</div>
                    </div>
                    <div class="col-lg-2">
                        @includeIf('user.partials.languages')
                    </div>
                </div>
            </div>
            <div class="card-body pt-5 pb-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card border-primary mb-3">
                            <div class="card-header bg-primary text-white">{{__('Pre-built Menus')}}</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">{{$keywords['Home'] ?? __('Home')}} <a data-text="{{$keywords['Home'] ?? __('Home')}}" data-type="home" class="addToMenus btn btn-primary btn-sm float-right" href="">{{__('Add to Menus')}}</a></li>
                                    <li class="list-group-item">{{$keywords['Courses'] ?? __('Courses')}} <a data-text="{{$keywords['Courses'] ?? __('Courses')}}" data-type="courses" class="addToMenus btn btn-primary btn-sm float-right" href="">{{__('Add to Menus')}}</a></li>
                                    <li class="list-group-item">{{$keywords['Instructors'] ?? __('Instructors')}} <a data-text="{{$keywords['Instructors'] ?? __('Instructors')}}" data-type="instructors" class="addToMenus btn btn-primary btn-sm float-right" href="">{{__('Add to Menus')}}</a></li>
                                    @if (!empty($permissions) && in_array('Blog', $permissions))
                                        <li class="list-group-item">{{$keywords['Blog'] ?? 'Blog'}} <a data-text="{{$keywords['Blog'] ?? __('Blog')}}" data-type="blog" class="addToMenus btn btn-primary btn-sm float-right" href="">{{__('Add to Menus')}}</a></li>
                                    @endif

                                    @if (!empty($permissions) && in_array('Ecommerce', $permissions))
                                    <li class="list-group-item">{{$keywords['Shop'] ?? 'Shop'}} <a data-text="{{$keywords['Shop'] ?? __('Shop')}}" data-type="Shop" class="addToMenus btn btn-primary btn-sm float-right" href="">{{__('Add to Menus')}}</a></li>
                                    @endif


                                    <li class="list-group-item">{{$keywords['FAQ'] ?? __('FAQ')}} <a data-text="{{$keywords['FAQ'] ?? __('FAQ')}}" data-type="faq" class="addToMenus btn btn-primary btn-sm float-right" href="">{{__('Add to Menus')}}</a></li>
                                    <li class="list-group-item">{{$keywords['Contact'] ?? __('Contact')}} <a data-text="{{$keywords['Contact'] ?? __('Contact')}}" data-type="contact" class="addToMenus btn btn-primary btn-sm float-right" href="">{{__('Add to Menus')}}</a></li>

                                    @if (!empty($permissions) && in_array('Custom Page', $permissions))
                                        @foreach ($apages as $apage)
                                        <li class="list-group-item">
                                            {{$apage->title}} <span class="badge badge-primary">{{$keywords['custom_page'] ?? __('Custom Page')}}</span>
                                            <a data-text="{{$apage->title}}" data-type="{{$apage->page_id}}" data-custom="yes" class="addToMenus btn btn-primary btn-sm float-right" href="">{{__('Add to Menus')}}</a>
                                        </li>
                                        @endforeach
                                    @endif


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-primary mb-3">
                            <div class="card-header bg-primary text-white">{{__('Add / Edit Menu')}}</div>
                            <div class="card-body">
                                <form id="frmEdit" class="form-horizontal">
                                    <input class="item-menu" type="hidden" name="type" value="">

                                    <div id="withUrl">
                                        <div class="form-group">
                                            <label for="text">{{__('Text')}}</label>
                                            <input type="text" class="form-control item-menu" maxlength="35" name="text" placeholder="{{__('Text')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="href">{{__('URL')}}</label>
                                            <input type="text" class="form-control item-menu" name="href" placeholder="{{__('URL')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="target">{{__('Target')}}</label>
                                            <select name="target" id="target" class="form-control item-menu">
                                                <option value="_self">{{__('Self')}}</option>
                                                <option value="_blank">{{__('Blank')}}</option>
                                                <option value="_top">{{__('Top')}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="withoutUrl" class="dis-none">
                                        <div class="form-group">
                                            <label for="text">{{__('Text')}}</label>
                                            <input type="text" class="form-control item-menu" name="text" placeholder="{{__('Text')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="href">{{__('URL')}}</label>
                                            <input type="text" class="form-control item-menu" name="href" placeholder="{{__('URL')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="target">{{__('Target')}}</label>
                                            <select name="target" class="form-control item-menu">
                                                <option value="_self">{{__('Self')}}</option>
                                                <option value="_blank">{{__('Blank')}}</option>
                                                <option value="_top">{{__('Top')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> {{__('Update')}}</button>
                                <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> {{__('Add')}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">{{__('Website Menus')}}</div>
                            <div class="card-body">
                                <ul id="myEditor" class="sortableLists list-group">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer pt-3">
                <div class="form">
                    <div class="form-group from-show-notify row">
                        <div class="col-12 text-center">
                            <button id="btnOutput" class="btn btn-success">{{__('Update Menu')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('scripts')
<script type="text/javascript" src="{{asset('assets/admin/js/plugin/jquery-menu-editor/jquery-menu-editor.js')}}"></script>
<script>
    "use strict";
    var prevMenus = @php echo json_encode($prevMenu) @endphp;
    var langid = {{$lang_id}};
    var menuUpdate = "{{route('user.menu_builder.update')}}";
</script>
<script type="text/javascript" src="{{asset('assets/admin/js/menu-builder.js')}}"></script>
@endsection
