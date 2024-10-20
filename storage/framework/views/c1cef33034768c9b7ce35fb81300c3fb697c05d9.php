<html>
	<head>
        <title><?php echo e($userBs->website_title); ?> - Maintainance Mode</title>
		<!-- favicon -->
		<link rel="shortcut icon" href="<?php echo e(asset('assets/front/img/'.$userBs->favicon)); ?>" type="image/x-icon">
		<!-- bootstrap css -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/bootstrap.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/503.css')); ?>">
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-lg-4 offset-lg-4">
						<div class="maintain-img-wrapper">
							<img src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_MAINTENANCE_IMAGE,$userBs->maintenance_img,$userBs)); ?>" alt="">
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-lg-6 offset-lg-3">
						<h3 class="maintain-txt">
							<?php echo replaceBaseUrl($userBs->maintenance_msg); ?>

						</h3>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/errors/user-503.blade.php ENDPATH**/ ?>