@extends('user.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Social Medias') }}</h4>
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
                <a href="#">{{ __('Basic Settings') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Social Medias') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-title d-inline-block">{{ __('Social Medias') }}</div>
                        </div>

                        <div class="col-lg-4 mt-2 mt-lg-0">
                            <a href="#" data-toggle="modal" data-target="#createModal"
                               class="btn btn-primary btn-sm float-lg-right float-left"><i
                                    class="fas fa-plus"></i> {{ __('Add') }}</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($socials) == 0)
                                <h3 class="text-center mt-2">{{ __('NO SOCIAL MEDIA FOUND') . '!' }}</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('Icon') }}</th>
                                            <th scope="col">{{ __('URL') }}</th>
                                            <th scope="col">{{ __('Serial Number') }}</th>
                                            <th scope="col">{{ __('Actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($socials as $media)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><i class="{{ $media->icon }}"></i></td>
                                                <td>{{ $media->url }}</td>
                                                <td>{{ $media->serial_number }}</td>
                                                <td>
                                                    <a class="btn btn-secondary btn-sm mr-1 editbtn" href="#"
                                                       data-toggle="modal" data-target="#editModal"
                                                       data-id="{{ $media->id }}" data-icon="{{ $media->icon }}"
                                                       data-url="{{ $media->url }}"
                                                       data-serial_number="{{ $media->serial_number }}">
                                                          <span class="btn-label">
                                                            <i class="fas fa-edit"></i>
                                                          </span>
                                                        {{ __('Edit') }}
                                                    </a>

                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('user.social.delete')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="social_id" value="{{$media->id}}">
                                                        <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                                        <span class="btn-label">
                                                          <i class="fas fa-trash"></i>
                                                        </span>
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer"></div>
            </div>
        </div>
    </div>

    {{-- create modal --}}
    @include('user.settings.social-media.create')

    {{-- edit modal --}}
    @include('user.settings.social-media.edit')
@endsection
