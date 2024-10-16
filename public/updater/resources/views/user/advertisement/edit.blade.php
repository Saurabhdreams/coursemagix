<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Edit Advertisement') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxEditForm" class="modal-form" action="{{ route('user.advertise.update_advertisement') }}" method="post" enctype="multipart/form-data">
          
          @csrf
          <input type="hidden" id="inid" name="id">

          <div class="form-group">
            <label for="">{{ __('Advertisement Type') . '*' }}</label>
            <select name="ad_type" class="form-control edit-ad-type" id="inad_type">
              <option disabled>{{ __('Select a Type') }}</option>
              <option value="banner">{{ __('Banner') }}</option>
              <option value="adsense">{{ __('Google AdSense') }}</option>
            </select>
            <p id="editErr_ad_type" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for="">{{ __('Advertisement Resolution') . '*' }}</label>
            <select name="resolution_type" class="form-control" id="inresolution_type">
              <option disabled>{{ __('Select a Resolution') }}</option>
              <option value="1">{{__('300 x 250')}}</option>
              <option value="2">{{__('300 x 600')}}</option>
              <option value="3">{{__('728 x 90')}}</option>
            </select>
            <p id="editErr_resolution_type" class="mt-2 mb-0 text-danger em"></p>
          </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group d-none" id="edit-image-input">
                        <div class="col-12 mb-2">
                            <label for="image"><strong>{{ __('Image') . '*' }}</strong></label>
                        </div>
                        <div class="col-md-12 showImage mb-3">
                            <img
                                src=""
                                alt="..."
                                id="in_image"
                                class="img-thumbnail">
                        </div>
                        <input type="file" name="image" id="image"
                               class="form-control">
                        <p id="editErr_image" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                </div>
            </div>

          <div class="form-group d-none" id="edit-url-input">
            <label for="">{{ __('Redirect URL') . '*' }}</label>
            <input type="url" class="form-control" name="url" placeholder="Enter Redirect URL" id="inurl">
            <p id="editErr_url" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group d-none" id="edit-slot-input">
            <label for="">{{ __('Ad Slot') . '*' }}</label>
            <input type="text" class="form-control" name="slot" placeholder="Enter Ad Slot" id="inslot">
            <p id="editErr_slot" class="mt-2 mb-0 text-danger em"></p>
            <p class="mt-2 mb-0">
              <a href="//prnt.sc/1uwa420" target="_blank" class="redirect-link">{{ __('Click Here') }}</a> {{ __('to see where you can find the ad slot') . '.' }}
            </p>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          {{ __('Close') }}
        </button>
        <button id="updateBtn" type="button" class="btn btn-primary btn-sm">
          {{ __('Update') }}
        </button>
      </div>
    </div>
  </div>
</div>
