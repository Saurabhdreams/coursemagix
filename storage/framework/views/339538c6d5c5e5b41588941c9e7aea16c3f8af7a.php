<?php $__env->startSection('pagename'); ?>
    - <?php echo e(__('Blog')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta-description', !empty($seo) ? $seo->blogs_meta_description : ''); ?>
<?php $__env->startSection('meta-keywords', !empty($seo) ? $seo->blogs_meta_keywords : ''); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <?php echo e(__('Blog')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb-link'); ?>
    <?php echo e(__('Blog')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--====== Start saas-blog section ======-->


    <section class="blog-area pb-90 pt-120">
        <div class="container">

            <div class="row justify-content-center">

                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4">
                        <article class="card mb-30" data-aos="fade-up" data-aos-delay="100">
                            <div class="card-image">
                                <a href="<?php echo e(route('front.blogdetails',['id' => $blog->id,'slug' => $blog->slug])); ?>" class="lazy-container aspect-ratio-16-9">
                                    <img class="lazyload lazy-image" data-src="<?php echo e(asset('assets/front/img/blogs/'.$blog->main_image)); ?>" alt="Banner Image">
                                </a>
                                <ul class="info-list">
                                    <li><i class="fal fa-user"></i><?php echo e(__('Admin')); ?></li>
                                    <li><i class="fal fa-calendar"></i><?php echo e(\Carbon\Carbon::parse($blog->created_at)->format("F j, Y")); ?></li>
                                    <li><i class="fal fa-tag"></i><?php echo e($blog->bcategory->name); ?></li>
                                </ul>
                            </div>
                            <div class="content">
                                <h3 class="card-title">
                                    <a href="<?php echo e(route('front.blogdetails',['id' => $blog->id,'slug' => $blog->slug])); ?>">
                                        <?php echo e(strlen($blog->title) > 55 ? mb_substr($blog->title, 0, 55, 'utf-8') . '...' : $blog->title); ?>

                                    </a>
                                </h3>
                                <p class="card-text">
                                    <?php echo substr(strip_tags($blog->content), 0, 150); ?>


                                </p>
                                <a href="#" class="card-btn">Read More</a>
                            </div>
                        </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="pagination mb-30 justify-content-center">
                <?php echo e($blogs->appends(['category' => request()->input('category')])->links()); ?>

            </div>
        </div>
        <!-- Bg Overlay -->
        <img class="bg-overlay" src="<?php echo e(asset('assets/front/img/shadow-bg-2.png')); ?>" alt="Bg">
        <img class="bg-overlay" src="<?php echo e(asset('assets/front/img/shadow-bg-1.png')); ?>" alt="Bg">
        <!-- Bg Shape -->
        <div class="shape">
            <img class="shape-1" src="<?php echo e(asset('assets/front/img/shape/shape-10.png')); ?>" alt="Shape">
            <img class="shape-2" src="<?php echo e(asset('assets/front/img/shape/shape-6.png')); ?>" alt="Shape">
            <img class="shape-3" src="<?php echo e(asset('assets/front/img/shape/shape-7.png')); ?>" alt="Shape">
            <img class="shape-4" src="<?php echo e(asset('assets/front/img/shape/shape-4.png')); ?>" alt="Shape">
            <img class="shape-5" src="<?php echo e(asset('assets/front/img/shape/shape-3.png')); ?>" alt="Shape">
            <img class="shape-6" src="<?php echo e(asset('assets/front/img/shape/shape-8.png')); ?>" alt="Shape">
        </div>
    </section>

    <!--====== End saas-blog section ======-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/front/blogs.blade.php ENDPATH**/ ?>