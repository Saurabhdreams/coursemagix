<aside class="sidebar-widget-area">


    <div class="widget widget-post mb-30">
        <h3 class="title"><?php echo e(__('Recent Posts')); ?></h3>
        <?php $__currentLoopData = $allBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article class="article-item mb-30">
            <div class="image">
                <a href="<?php echo e(route('front.blogdetails',['id' => $blog->id,'slug' => $blog->slug])); ?>" class="lazy-container aspect-ratio-1-1 d-block">
                    <img class="lazyload lazy-image" src="<?php echo e(asset('assets/front/img/blogs/'.$blog->main_image)); ?>"
                         data-src="<?php echo e(asset('assets/front/img/blogs/'.$blog->main_image)); ?>" alt="Blog Image">
                </a>
            </div>
            <div class="content">
                <h6>
                    <a href="<?php echo e(route('front.blogdetails',['id' => $blog->id,'slug' => $blog->slug])); ?>">
                        <?php echo e(strlen($blog->title) > 60 ? mb_substr($blog->title, 0, 60, 'utf-8') . '...' : $blog->title); ?>

                    </a>
                </h6>
                <div class="time">
                    <?php echo e($blog->created_at->diffForHumans()); ?>

                </div>
            </div>
        </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="widget widget-categories mb-30">
        <h3 class="title"><?php echo e(__('Categories')); ?></h3>
        <ul class="list-unstyled m-0">
            <?php $__currentLoopData = $bcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="d-flex align-items-center justify-content-between <?php if(request()->input('category') == $bcat->id): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('front.blogs', ['category'=>$bcat->id])); ?>"><i class="fal fa-folder"></i><?php echo e($bcat->name); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

</aside>


<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/front/partials/blog-sidebar.blade.php ENDPATH**/ ?>