<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title">Mail Subscribers</h4>
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
        <a href="#">Subscribers</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Mail Subscribers</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <form action="<?php echo e(route('user.subscribers.sendmail')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="card-header">
            <div class="card-title">Send Mail</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8 offset-lg-2">
                  <div class="form-group">
                    <label for="">Subject **</label>
                    <input type="text" class="form-control" name="subject" value="" placeholder="Enter subject of E-mail">
                    <?php if($errors->has('subject')): ?>
                      <p class="text-danger mb-0"><?php echo e($errors->first('subject')); ?></p>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <label for="">Message **</label>
                    <textarea name="message" class="form-control summernote" data-height="150"></textarea>
                    <?php if($errors->has('message')): ?>
                      <p class="text-danger mb-0"><?php echo e($errors->first('message')); ?></p>
                    <?php endif; ?>
                  </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-success">
  						<span class="btn-label">
  							<i class="fa fa-check"></i>
  						</span>
  				Send Mail
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/subscribers/mail.blade.php ENDPATH**/ ?>