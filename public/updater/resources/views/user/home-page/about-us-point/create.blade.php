<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Add About Us Point') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ajaxForm" class="modal-form create"
                      action="{{ route('user.home_page.store_about-us-point', ['language' => request()->input('language')]) }}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Language') . '*' }}</label>
                        <select name="user_language_id" class="form-control">
                            <option selected disabled>{{ __('Select a Language') }}</option>
                            @foreach ($langs as $lang)
                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        <p id="erruser_language_id" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="">{{__('Icon')}} **</label>
                        <div class="btn-group d-block">
                            <button type="button" class="btn btn-primary iconpicker-component"><i class="fab fa-adn"></i></button>
                            <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                    data-selected="fa-car" data-toggle="dropdown">
                            </button>
                            <div class="dropdown-menu"></div>
                        </div>
                        <input id="inputIcon" type="hidden" name="about_us_point_icon">
                        <div class="mt-2">
                            <small>{{__('NB: click on the dropdown icon to select a about us point icon.')}}</small>
                        </div>
                        <p id="errabout_us_point_icon" class="mt-2 mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Title') . '*' }}</label>
                        <input type="text" class="form-control" name="about_us_point_title" placeholder="Enter Title">
                        <p id="errabout_us_point_title" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Text') . '*' }}</label>
                        <textarea class="form-control" name="about_us_point_text" placeholder="Enter Text"
                                  rows="5"></textarea>
                        <p id="errabout_us_point_text" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Serial Number') . '*' }}</label>
                        <input type="number" class="form-control ltr" name="serial_number"
                               placeholder="Enter Serial Number">
                        <p id="errserial_number" class="mt-1 mb-0 text-danger em"></p>
                        <p class="text-warning mt-2 mb-0">
                            <small>{{ __('The higher the serial number is, the later the About Us Point will be shown.') }}</small>
                        </p>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    {{ __('Close') }}
                </button>
                <button id="submitBtn" type="button" class="btn btn-primary btn-sm">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </div>
</div>
