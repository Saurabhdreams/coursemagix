<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Edit Coupon') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxEditForm" class="modal-form" action="{{ route('user.course_management.update_coupon') }}" method="post">
          
          @csrf
          <input type="hidden" id="inid" name="id">

          <div class="row no-gutters">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">{{ __('Name')  }}<span class="text-danger">*</span></label>
                <input type="text" id="inname" class="form-control" name="name" placeholder="Enter Coupon Name">
                <p id="eerrname" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">{{ __('Code')  }}<span class="text-danger">*</span></label>
                <input type="text" id="incode" class="form-control" name="code" placeholder="Enter Coupon Code">
                <p id="eerrcode" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>
          </div>

          <div class="row no-gutters">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">{{ __('Coupon Type')  }}<span class="text-danger">*</span></label>
                <select name="type" id="intype" class="form-control">
                  <option disabled>{{ __('Select a Type') }}</option>
                  <option value="fixed">{{ __('Fixed') }}</option>
                  <option value="percentage">{{ __('Percentage') }}</option>
                </select>
                <p id="eerrtype" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">{{ __('Value')  }}<span class="text-danger">*</span></label>
                <input type="number" step="0.01" id="invalue" class="form-control" name="value" placeholder="Enter Coupon Value">
                <p id="eerrvalue" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>
          </div>

          <div class="row no-gutters">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">{{ __('Start Date')  }}<span class="text-danger">*</span></label>
                <input type="text" id="instart_date" class="form-control datepicker" name="start_date" placeholder="Enter Start Date">
                <p id="eerrstart_date" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">{{ __('End Date')  }}<span class="text-danger">*</span></label>
                <input type="text" id="inend_date" class="form-control datepicker" name="end_date" placeholder="Enter End Date">
                <p id="eerrend_date" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>
          </div>

          <div class="row no-gutters">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="">{{ __('Courses') }}</label>
                <select id="in_courses" class="select2" name="courses[]" multiple="multiple" placeholder="Select Courses">
                    @foreach ($courses as $course)
                        @php
                            $courseInfo = $course->courseInformation()->where('language_id', $deLang->id)->select('title', 'id')->first();
                            $title = $courseInfo->title;
                            $id = $course->id;
                        @endphp
                        <option value="{{$id}}">
                          {{$title}}
                        </option>
                    @endforeach
                </select>
                <p id="editErr_courses" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
          {{ __('Close') }}
        </button>
        <button id="updateBtn" type="button" class="btn btn-sm btn-primary">
          {{ __('Update') }}
        </button>
      </div>
    </div>
  </div>
</div>
