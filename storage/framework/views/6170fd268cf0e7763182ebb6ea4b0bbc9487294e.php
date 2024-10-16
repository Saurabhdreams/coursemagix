<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Add Blog')); ?></h4>
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
        <a href="#"><?php echo e(__('Blog Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Blog')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Add Blog')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block"><?php echo e(__('Add Blog')); ?></div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="<?php echo e(route('user.blog_management.blogs', ['language' => $defaultLang->code])); ?>">
            <span class="btn-label">
              <i class="fas fa-backward" ></i>
            </span>
            <?php echo e(__('Back')); ?>

          </a>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <div class="alert alert-danger pb-1 dis-none" id="blogErrors">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul></ul>
              </div>

              <form id="blogForm" action="<?php echo e(route('user.blog_management.store_blog')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="form-group">
                              <div class="col-12 mb-2">
                                  <label for="image"><strong><?php echo e(__('Image')); ?><span class="text-danger">*</span></strong></label>
                              </div>
                              <div class="col-md-12 showImage mb-3">
                                  <img
                                      src="<?php echo e(asset('assets/tenant/image/default.jpg')); ?>"
                                      alt="..."
                                      class="img-thumbnail">
                              </div>
                              <input type="file" name="image" id="image" class="form-control">
                          </div>
                          <p class="text-warning mb-0"><?php echo e(__('Upload 370 X 280 image for best quality')); ?></p>
                      </div>
                  </div>

                <div class="form-group">
                  <label><?php echo e(__('Serial Number')); ?><span class="text-danger">*</span></label>
                  <input class="form-control" type="number" name="serial_number" placeholder="Enter Serial Number">
                  <p class="text-warning mt-2 mb-0">
                    <small><?php echo e(__('The higher the serial number is, the later the blog will be shown.')); ?></small>
                  </p>
                </div>

                <div id="accordion" class="mt-3">
                  <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="version">
                      <div class="version-header" id="heading<?php echo e($language->id); ?>">
                        <h5 class="mb-0">
                          <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo e($language->id); ?>" aria-expanded="<?php echo e($language->is_default == 1 ? 'true' : 'false'); ?>" aria-controls="collapse<?php echo e($language->id); ?>">
                            <?php echo e($language->name . __(' Language')); ?> <?php echo e($language->is_default == 1 ? '(Default)' : ''); ?>

                          </button>
                        </h5>
                      </div>

                      <div id="collapse<?php echo e($language->id); ?>" class="collapse <?php echo e($language->is_default == 1 ? 'show' : ''); ?>" aria-labelledby="heading<?php echo e($language->id); ?>" data-parent="#accordion">
                        <div class="version-body">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Title')); ?><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="<?php echo e($language->code); ?>_title" placeholder="Enter Title">
                              </div>
                            </div>

                            <div class="col-lg-6">
                              <div class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                <?php
                                  $categories = DB::table('user_blog_categories')->where('language_id', $language->id)->where('user_id', \Illuminate\Support\Facades\Auth::guard('web')->user()->id)->where('status', 1)->orderByDesc('id')->get();
                                ?>

                                <label for=""><?php echo e(__('Category')); ?><span class="text-danger">*</span></label>
                                <select name="<?php echo e($language->code); ?>_category_id" class="form-control">
                                  <option selected disabled><?php echo e(__('Select Category')); ?></option>

                                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                              <div class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Author')); ?><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="<?php echo e($language->code); ?>_author" placeholder="Enter Author Name">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                              <div class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Content')); ?><span class="text-danger">*</span></label>
                                <textarea class="form-control summernote" name="<?php echo e($language->code); ?>_content" placeholder="Enter Blog Content" data-height="300"></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                              <div class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Meta Keywords')); ?></label>
                                <input class="form-control" name="<?php echo e($language->code); ?>_meta_keywords" placeholder="Enter Meta Keywords" data-role="tagsinput">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                              <div class="form-group <?php echo e($language->rtl == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Meta Description')); ?></label>
                                <textarea class="form-control" name="<?php echo e($language->code); ?>_meta_description" rows="5" placeholder="Enter Meta Description"></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                              <?php $currLang = $language; ?>

                              <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($language->id == $currLang->id) continue; ?>

                                <div class="form-check py-0">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" onchange="cloneInput('collapse<?php echo e($currLang->id); ?>', 'collapse<?php echo e($language->id); ?>', event)">
                                    <span class="form-check-sign"><?php echo e(__('Clone for')); ?> <strong class="text-capitalize text-secondary"><?php echo e($language->name); ?></strong> <?php echo e(__('language')); ?></span>
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
              <button type="submit" form="blogForm" class="btn btn-success">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/journal/blog/create.blade.php ENDPATH**/ ?>