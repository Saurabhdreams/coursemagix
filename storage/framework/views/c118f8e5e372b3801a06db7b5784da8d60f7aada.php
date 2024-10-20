<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Edit Popup')); ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?php echo e(route('user-dashboard')); ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?php echo e(__('Announcement Popups')); ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?php echo e(__('Edit Popup')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">
                        <?php echo e(__('Edit Popup') . ' (' . __('Type') . ' - ' . $popup->type . ')'); ?>

                    </div>
                    <a class="btn btn-info btn-sm float-right d-inline-block"
                       href="<?php echo e(route('user.announcement_popups', ['language' => $defaultLang->code])); ?>">
            <span class="btn-label">
              <i class="fas fa-backward" ></i>
            </span>
                        <?php echo e(__('Back')); ?>

                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <form id="ajaxEditForm"
                                  action="<?php echo e(route('user.announcement_popups.update_popup', ['id' => $popup->id])); ?>"
                                  method="POST" enctype="multipart/form-data">
                                
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="type" value="<?php echo e($popup->type); ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label for="image"><strong><?php echo e(__('Image') . '*'); ?></strong></label>
                                            </div>
                                            <div class="col-md-12 showImage mb-3">
                                                <img
                                                    src="<?php echo e(isset($popup->image) ? \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ANNOUNCEMENT_POPUP_IMAGE,$popup->image,$userBs) : asset('assets/tenant/image/default.jpg')); ?>"
                                                    alt="..."
                                                    class="img-thumbnail">
                                            </div>
                                            <input type="file" name="image" id="image" class="form-control">
                                            <p id="errimage" class="mb-0 text-danger em"></p>
                                            <?php if($popup->type == 1): ?>
                                                <p class="text-warning mb-0"><?php echo e(__('Upload 960 X 600 image for best quality')); ?></p>
                                            <?php elseif($popup->type == 2 || $popup->type == 3): ?>
                                                <p class="text-warning mb-0"><?php echo e(__('Upload 1145 X 765 image for best quality')); ?></p>
                                            <?php elseif($popup->type == 4 || $popup->type == 5): ?>
                                                <p class="text-warning mb-0"><?php echo e(__('Upload 517 X 689 image for best quality')); ?></p>
                                            <?php elseif($popup->type == 6): ?>
                                                <p class="text-warning mb-0"><?php echo e(__('Upload 960 X 660 image for best quality')); ?></p>
                                            <?php elseif($popup->type == 7): ?>
                                                <p class="text-warning mb-0"><?php echo e(__('Upload 550 X 765 image for best quality')); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label><?php echo e(__('Name') . '*'); ?></label>
                                            <input type="text" class="form-control" name="name"
                                                   placeholder="Enter Popup Name" value="<?php echo e($popup->name); ?>">
                                            <p id="editErr_name" class="mt-2 mb-0 text-danger em"></p>
                                            <p class="text-warning mt-2 mb-0">
                                                <small><?php echo e(__('This name will not appear in UI. Rather then, it will help the admin to identify the popup.')); ?></small>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <?php if($popup->type == 2 || $popup->type == 3 || $popup->type == 7): ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label><?php echo e(__('Background Color Code') . '*'); ?></label>
                                                <input class="jscolor form-control ltr" name="background_color"
                                                       value="<?php echo e($popup->background_color); ?>">
                                                <p id="editErr_background_color" class="mt-2 mb-0 text-danger em"></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($popup->type == 2 || $popup->type == 3): ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label><?php echo e(__('Background Color Opacity') . '*'); ?></label>
                                                <input type="number" class="form-control ltr" step="0.01"
                                                       name="background_color_opacity"
                                                       value="<?php echo e($popup->background_color_opacity); ?>">
                                                <p id="editErr_background_color_opacity"
                                                   class="mt-2 mb-0 text-danger em"></p>
                                                <p class="mt-2 mb-0 text-warning">
                                                    <?php echo e(__('This will decide the transparency level of the color.')); ?>

                                                    <br>
                                                    <?php echo e(__('Value must be between 0 to 1.')); ?><br>
                                                    <?php echo e(__('Transparency level will be lower with the increment of the value.')); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($popup->type == 2 || $popup->type == 3 || $popup->type == 4 || $popup->type == 5 || $popup->type == 6 || $popup->type == 7): ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label><?php echo e(__('Title') . '*'); ?></label>
                                                <input type="text" class="form-control" name="title"
                                                       placeholder="Enter Popup Title" value="<?php echo e($popup->title); ?>">
                                                <p id="editErr_title" class="mt-2 mb-0 text-danger em"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label><?php echo e(__('Text') . '*'); ?></label>
                                                <textarea class="form-control" name="text"
                                                          placeholder="Enter Popup Text"
                                                          rows="5"><?php echo e($popup->text); ?></textarea>
                                                <p id="editErr_text" class="mt-2 mb-0 text-danger em"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Button Text') . '*'); ?></label>
                                                <input type="text" class="form-control" name="button_text"
                                                       placeholder="Enter Button Text"
                                                       value="<?php echo e($popup->button_text); ?>">
                                                <p id="editErr_button_text" class="mt-2 mb-0 text-danger em"></p>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Button Color Code') . '*'); ?></label>
                                                <input class="jscolor form-control ltr" name="button_color"
                                                       value="<?php echo e($popup->button_color); ?>">
                                                <p id="editErr_button_color" class="mt-2 mb-0 text-danger em"></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($popup->type == 2 || $popup->type == 4 || $popup->type == 6 || $popup->type == 7): ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label><?php echo e(__('Button URL') . '*'); ?></label>
                                                <input type="url" class="form-control ltr" name="button_url"
                                                       placeholder="Enter Button URL" value="<?php echo e($popup->button_url); ?>">
                                                <p id="editErr_button_url" class="mt-2 mb-0 text-danger em"></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($popup->type == 6 || $popup->type == 7): ?>
                                    <?php
                                        $endDate = Carbon\Carbon::parse($popup->end_date);
                                        $endDate = date_format($endDate, 'm/d/Y');
                                        $endTime = date('h:i A', strtotime($popup->end_time))
                                    ?>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('End Date') . '*'); ?></label>
                                                <input type="text" class="form-control datepicker ltr" name="end_date"
                                                       placeholder="Enter End Date" readonly autocomplete="off"
                                                       value="<?php echo e($endDate); ?>">
                                                <p id="editErr_end_date" class="mt-2 mb-0 text-danger em"></p>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('End Time') . '*'); ?></label>
                                                <input type="text" class="form-control timepicker ltr" name="end_time"
                                                       placeholder="Enter End Time" readonly autocomplete="off"
                                                       value="<?php echo e($endTime); ?>">
                                                <p id="editErr_end_time" class="mt-2 mb-0 text-danger em"></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label><?php echo e(__('Delay') . ' (' . __('milliseconds') . ')*'); ?></label>
                                            <input type="number" class="form-control ltr" name="delay"
                                                   placeholder="Enter Popup Delay" value="<?php echo e($popup->delay); ?>">
                                            <p id="editErr_delay" class="mt-2 mb-0 text-danger em"></p>
                                            <p class="text-warning mt-2 mb-0">
                                                <small><?php echo e(__('Popup will appear in UI after this delay time.')); ?></small>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label><?php echo e(__('Serial Number') . '*'); ?></label>
                                            <input type="number" class="form-control ltr" name="serial_number"
                                                   placeholder="Enter Serial Number"
                                                   value="<?php echo e($popup->serial_number); ?>">
                                            <p id="editErr_serial_number" class="mt-2 mb-0 text-danger em"></p>
                                            <p class="mt-2 mb-0 text-warning">
                                                <?php echo e(__('If there are multiple active popups, then popups will be shown in UI according to serial number.')); ?>

                                                <br>
                                                <?php echo e(__('The higher the serial number is, the later the Popup will be shown.')); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success" id="updateBtn">
                                <?php echo e(__('Update')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/popup/edit.blade.php ENDPATH**/ ?>