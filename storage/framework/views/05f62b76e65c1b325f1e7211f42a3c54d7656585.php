<?php
    $symbol = $currencyInfo->base_currency_symbol;
?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Add Course')); ?></h4>
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
                <a href="#"><?php echo e(__('Course Management')); ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a
                    href="<?php echo e(route('user.course_management.courses', ['language' => $defaultLang->code])); ?>"><?php echo e(__('Courses')); ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?php echo e(__('Add Course')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block"><?php echo e(__('Add Course')); ?></div>
                    <a class="btn btn-info btn-sm float-right d-inline-block"
                        href="<?php echo e(route('user.course_management.courses', ['language' => $defaultLang->code])); ?>">
                        <span class="btn-label">
                            <i class="fas fa-backward"></i>
                        </span>
                        <?php echo e(__('Back')); ?>

                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="alert alert-danger pb-1 dis-none" id="courseErrors">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <ul></ul>
                            </div>

                            <form id="courseForm" action="<?php echo e(route('user.course_management.store_course')); ?>" method="POST"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label
                                                    for="image"><strong><?php echo e(__('Thumbnail Image')); ?><span class="text-danger">*</span></strong></label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <img src="<?php echo e(asset('assets/tenant/image/default.jpg')); ?>" alt="..."
                                                    class="img-thumbnail" id="uploaded-thumb-img">
                                            </div>
                                            <input type="file" name="thumbnail_image" id="thumb-img-input"
                                                class="form-control">
                                            <p class="text-warning mb-0">Upload 370 X 250 image for best quality</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-1">
                                    <label for=""><?php echo e(__('Introduction Video')); ?><span class="text-danger">*</span></label>
                                    <input type="url" class="form-control" name="video_link"
                                        placeholder="Enter Video Link">
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label
                                                    for="image"><strong><?php echo e(__('Cover Image')); ?><span class="text-danger">*</span></strong></label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <img src="<?php echo e(asset('assets/tenant/image/default.jpg')); ?>" alt="..."
                                                    class="img-thumbnail" id="uploaded-cover-img">
                                            </div>
                                            <input type="file" name="cover_image" id="cover-img-input"
                                                class="form-control">
                                            <p class="text-warning mb-0">
                                                <?php echo e(__('Upload 1920 X 550 image for best quality')); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-1">
                                    <label for=""><?php echo e(__('Pricing Type')); ?><span class="text-danger">*</span></label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="pricing_type" value="free"
                                                class="selectgroup-input" checked>
                                            <span class="selectgroup-button"><?php echo e(__('Free')); ?></span>
                                        </label>

                                        <label class="selectgroup-item">
                                            <input type="radio" name="pricing_type" value="premium"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button"><?php echo e(__('Premium')); ?></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row d-none" id="price-input">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo e(__('Current Price')); ?>(<?php echo e($symbol); ?>)*</label>
                                            <input type="number" step="0.01" name="current_price"
                                                placeholder="Enter Current Price" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo e(__('Previous Price')); ?>(<?php echo e($symbol); ?>)</label>
                                            <input type="number" step="0.01" name="previous_price"
                                                placeholder="Enter Previous Price" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label><?php echo e(__('Duration Time')); ?> - (<?php echo e(__('second')); ?>) <span class="text-danger">*</span></label>
                                            <input type="number" name="duration_time" class="form-control duration"
                                                placeholder="Enter Duration Second" required>
                                            <span class="timeConvert text-sm text-warning"></span>

                                        </div>
                                    </div>
                                 
                                        
                                   

                                </div>

                                <div id="accordion" class="mt-3">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="version">
                                            <div class="version-header" id="heading<?php echo e($language->id); ?>">
                                                <h5 class="mb-0">
                                                    <button type="button" class="btn btn-link" data-toggle="collapse"
                                                        data-target="#collapse<?php echo e($language->id); ?>"
                                                        aria-expanded="<?php echo e($language->is_default == 1 ? 'true' : 'false'); ?>"
                                                        aria-controls="collapse<?php echo e($language->id); ?>">
                                                        <?php echo e($language->name . __(' Language')); ?>

                                                        <?php echo e($language->is_default == 1 ? '(Default)' : ''); ?>

                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse<?php echo e($language->id); ?>"
                                                class="collapse <?php echo e($language->is_default == 1 ? 'show' : ''); ?>"
                                                aria-labelledby="heading<?php echo e($language->id); ?>" data-parent="#accordion">
                                                <div class="version-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div
                                                                class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                                                <label><?php echo e(__('Title')); ?><span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    name="<?php echo e($language->code); ?>_title"
                                                                    placeholder="Enter Title">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div
                                                                class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                                                <?php
                                                                    $categories = \App\Models\User\Curriculum\CourseCategory::where('language_id', $language->id)
                                                                        ->where('user_id', \Illuminate\Support\Facades\Auth::guard('web')->user()->id)
                                                                        ->where('status', 1)
                                                                        ->orderByDesc('id')
                                                                        ->get();
                                                                ?>

                                                                <label for=""><?php echo e(__('Category')); ?><span class="text-danger">*</span></label>
                                                                <select name="<?php echo e($language->code); ?>_category_id"
                                                                    class="form-control">
                                                                    <option selected disabled><?php echo e(__('Select Category')); ?>

                                                                    </option>

                                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($category->id); ?>">
                                                                            <?php echo e($category->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                                                <?php
                                                                    $instructors = \App\Models\User\Teacher\Instructor::where('language_id', $language->id)
                                                                        ->where('user_id', \Illuminate\Support\Facades\Auth::guard('web')->user()->id)
                                                                        ->orderByDesc('id')
                                                                        ->get();
                                                                ?>

                                                                <label for=""><?php echo e(__('Instructor')); ?><span class="text-danger">*</span></label>
                                                                <select name="<?php echo e($language->code); ?>_instructor_id"
                                                                    class="form-control mb-2">
                                                                    <option selected disabled><?php echo e(__('Select Instructor')); ?>

                                                                    </option>

                                                                    <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($instructor->id); ?>">
                                                                            <?php echo e($instructor->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>

                                                                <a href="<?php echo e(route('user.instructors', ['language' => $defaultLang->code])); ?>"
                                                                    target="_blank" id="instructor-link"
                                                                    class="text-warning">
                                                                    <?php echo e(__('Click this link to add a new instructor') . '.'); ?>

                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                                                <label><?php echo e(__('Features')); ?><span class="text-danger">*</span></label>
                                                                <textarea class="form-control" name="<?php echo e($language->code); ?>_features" placeholder="Enter Course Features"
                                                                    rows="7"></textarea>
                                                                <p class="text-warning mt-1 mb-0">
                                                                    <?php echo e(__('To separate the features, enter a new line after each feature.')); ?>

                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                                                <label><?php echo e(__('Description')); ?><span class="text-danger">*</span></label>
                                                                <textarea class="form-control summernote" name="<?php echo e($language->code); ?>_description"
                                                                    placeholder="Enter Course Description" data-height="300">
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                                                <label><?php echo e(__('Meta Keywords')); ?></label>
                                                                <input class="form-control"
                                                                    name="<?php echo e($language->code); ?>_meta_keywords"
                                                                    placeholder="Enter Meta Keywords"
                                                                    data-role="tagsinput">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                                                <label><?php echo e(__('Meta Description')); ?></label>
                                                                <textarea class="form-control" name="<?php echo e($language->code); ?>_meta_description" rows="5"
                                                                    placeholder="Enter Meta Description"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <?php $currLang = $language ?>

                                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($language->id == $currLang->id) continue; ?>

                                                                <div class="form-check py-0">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            onchange="cloneInput('collapse<?php echo e($currLang->id); ?>', 'collapse<?php echo e($language->id); ?>', event)">
                                                                        <span
                                                                            class="form-check-sign"><?php echo e(__('Clone for')); ?>

                                                                            <strong
                                                                                class="text-capitalize text-secondary"><?php echo e($language->name); ?></strong>
                                                                            <?php echo e(__('language')); ?></span>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" form="courseForm" class="btn btn-success">
                                <?php echo e(__('Save')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/tenant/js/partial.js')); ?>"></script>
    <script>
        $(document).on('change', '.duration', function() {
            const that = $(this);
            let time = that.val();
            let totalSeconds = parseInt(time);
            $(".timeConvert").text(toTime(totalSeconds));

            function toTime(totalSeconds) {
                var hours = Math.floor(totalSeconds / 3600); // Calculate the hour component
                var minutes = Math.floor((totalSeconds % 3600) / 60); // Calculate the minute component
                var seconds = totalSeconds % 60; // Calculate the second component
                // Format the time as HH:MM:SS
                var time = hours.toString().padStart(2, '0') + ' h '+':' + minutes.toString().padStart(2, '0') + ' m ' +':' + seconds.toString().padStart(2, '0') +' s';

                return time;
            }

        });

  
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/curriculum/course/create.blade.php ENDPATH**/ ?>