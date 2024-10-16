@extends('user.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('user.partials.rtl-style')

@php
    $module_count = \App\Http\Helpers\LimitCheckerHelper::currentModulesCount(Auth::guard('web')->user()->id, $language->id);//module added count of selected language
    $module_limit = \App\Http\Helpers\LimitCheckerHelper::moduleLimit(Auth::guard('web')->user()->id);//module limit count of current package
    $lesson_count = \App\Http\Helpers\LimitCheckerHelper::currentLessonsCount(Auth::guard('web')->user()->id, $language->id);//module added count of selected language
    $lesson_limit = \App\Http\Helpers\LimitCheckerHelper::lessonLimit(Auth::guard('web')->user()->id);//lesson limit count of current package
@endphp

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Modules') }}</h4>
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
              <a href="#">{{ __('Course Management') }}</a>
            </li>
            <li class="separator">
              <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
              <a href="{{route('user.course_management.courses', ['language' => $defaultLang->code])}}">{{ __('Courses') }}</a>
            </li>
            <li class="separator">
              <i class="flaticon-right-arrow"></i>
            </li>
            @if (!empty($courseInformation))
              <li class="nav-item">
                <a href="#">{{ strlen($courseInformation->title) > 35 ? mb_substr($courseInformation->title, 0, 35, 'UTF-8') . '...' : $courseInformation->title }}</a>
              </li>
            @endif
            <li class="separator">
              <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
              <a href="#">{{ __('Modules') }}</a>
            </li>
        </ul>
    </div>
    @if($module_count > $module_limit)
        <div class="row justify-content-center align-items-center mb-1">
            <div class="col-12">
                <div class="alert border-left border-primary text-dark">
                    <strong class="text-danger">{{__("Buttons are disabled, because you have more module ($module_count) than your current package module limit ($module_limit).")}}</strong><br>
                </div>
            </div>
        </div>
    @endif
    @if($lesson_count > $lesson_limit)
        <div class="row justify-content-center align-items-center mb-1">
            <div class="col-12">
                <div class="alert border-left border-primary text-dark">
                    <strong class="text-danger">{{__("Buttons are disabled, because you have more lesson ($lesson_count) than your current package lesson limit ($lesson_limit).")}}</strong><br>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block">
                                {{ __('Modules') . ' (' . $language->name . ' ' . __('Language') . ')' }}
                            </div>
                        </div>

                        <div class="col-lg-3">
                          @if (!empty($langs))
                            <select name="language" class="form-control" onchange="window.location='{{ url()->current() . '?language=' }}' + this.value">
                              <option selected disabled>{{ __('Select a Language') }}</option>
                              @foreach ($langs as $lang)
                                <option value="{{ $lang->code }}" {{ $lang->code == $language->code ? 'selected' : '' }}>
                                  {{ $lang->name }}
                                </option>
                              @endforeach
                            </select>
                          @endif
                        </div>

                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a class="btn btn-info btn-sm float-right ml-2"
                               href="{{ route('user.course_management.courses', ['language' => $defaultLang->code]) }}">
                                <span class="btn-label">
                                <i class="fas fa-backward" ></i>
                                </span>
                                {{ __('Back') }}
                            </a>
                            @if($module_count > $module_limit)
                                <a type="button"
                                   class="btn btn-primary btn-sm float-lg-right float-left disabled-btn"
                                   disabled
                                >
                                    <i class="fas fa-plus"></i> {{ __('Add Module') }}
                                </a>
                            @else
                                <a href="#" data-toggle="modal" data-target="#createModal"
                                   class="btn btn-primary btn-sm float-lg-right float-left"><i
                                        class="fas fa-plus"></i> {{ __('Add Module') }}</a>
                            @endif
                            <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                    data-href="{{ route('user.course_management.course.bulk_delete_module') }}">
                                <i class="flaticon-interface-5"></i> {{ __('Delete') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($modules) == 0)
                                <h3 class="text-center mt-2">{{ __('NO MODULE FOUND') . '!' }}</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                        <tr>
                                            <th scope="col">
                                                <input type="checkbox" class="bulk-check" data-val="all">
                                            </th>
                                            <th scope="col">{{ __('Title') }}</th>
                                            <th scope="col">{{ __('Status') }}</th>
                                            <th scope="col">{{ __('Serial Number') }}</th>
                                            <th scope="col">{{ __('Actions') }}</th>
                                            <th scope="col">{{ __('Lesson') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($modules as $module)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="bulk-check"
                                                           data-val="{{ $module->id }}">
                                                </td>
                                                <td width="20%">
                                                  {{$module->title}}
                                                </td>
                                                <td>
                                                    @if ($module->status == 'draft')
                                                        <span
                                                            class="badge badge-warning">{{ ucfirst($module->status) }}</span>
                                                    @else
                                                        <span
                                                            class="badge badge-primary">{{ ucfirst($module->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $module->serial_number }}</td>
                                                <td>
                                                    @if($module_count > $module_limit)
                                                        <a class="btn btn-secondary btn-sm mr-1 disabled-btn" disabled
                                                           href="javascript:void(0)">
                                                          <span class="btn-label">
                                                            <i class="fas fa-edit"></i>
                                                          </span>
                                                            {{ __('Edit') }}
                                                        </a>
                                                    @else
                                                        <a class="btn btn-secondary btn-sm mr-1 editbtn"
                                                           href="#" data-toggle="modal"
                                                           data-target="#editModal"
                                                           data-id="{{ $module->id }}"
                                                           data-title="{{ $module->title }}"
                                                           data-status="{{ $module->status }}"
                                                           data-serial_number="{{ $module->serial_number }}">
                                                          <span class="btn-label">
                                                            <i class="fas fa-edit"></i>
                                                          </span>
                                                            {{ __('Edit') }}
                                                        </a>
                                                    @endif

                                                    <form class="deleteform d-inline-block"
                                                          action="{{ route('user.course_management.course.delete_module', ['id' => $module->id]) }}"
                                                          method="post">
                                                        
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    @if($lesson_count > $lesson_limit)
                                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm mr-1 disabled-btn" disabled
                                                        >
                                                          <span class="btn-label">
                                                            <i class="fas fa-plus"></i>
                                                          </span>
                                                            {{ __('Add') }}
                                                        </a>
                                                    @else
                                                        <a href="#" data-toggle="modal"
                                                           data-target="#createLessonModal-{{ $module->id }}"
                                                           class="btn btn-primary btn-sm mr-1">
                                                          <span class="btn-label">
                                                            <i class="fas fa-plus"></i>
                                                          </span>
                                                            {{ __('Add') }}
                                                        </a>
                                                    @endif

                                                    <a href="#" data-toggle="modal"
                                                       data-target="#viewLessonModal-{{ $module->id }}"
                                                       class="btn btn-success btn-sm">
                                                          <span class="btn-label">
                                                            <i class="fas fa-eye"></i>
                                                          </span>
                                                        {{ __('View') }}
                                                    </a>

                                                    {{-- create modal (lesson) --}}
                                                    @include('user.curriculum.lesson.create')
        
                                                    {{-- view modal (lesson) --}}
                                                    @include('user.curriculum.lesson.index')
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
    @include('user.curriculum.module.create')

    {{-- edit modal --}}
    @include('user.curriculum.module.edit')

    {{-- edit modal (lesson) --}}
    @include('user.curriculum.lesson.edit')
@endsection
