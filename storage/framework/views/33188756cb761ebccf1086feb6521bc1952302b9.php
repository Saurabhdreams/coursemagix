<?php
    use App\Http\Helpers\UserPermissionHelper;
    use App\Models\User\BasicSetting;
    use App\Models\User\Language;
    use Illuminate\Support\Facades\Auth;
    $default = Language::where('is_default', 1)
        ->where('user_id', Auth::user()->id)
        ->first();
    $user = Auth::guard('web')->user();
    $package = UserPermissionHelper::currentPackage($user->id);
    if (!empty($user)) {
        $permissions = UserPermissionHelper::packagePermission($user->id);
        $permissions = json_decode($permissions, true);
        $userBs = BasicSetting::where('user_id', $user->id)->first();
    }
?>

<div class="sidebar sidebar-style-2" <?php if(request()->cookie('user-theme') == 'dark'): ?> data-background-color="dark2" <?php endif; ?>>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
             
            <ul class="nav nav-primary">
                <div class="row mb-2">
                    <div class="col-12">
                        <form action="">
                            <div class="form-group py-0">
                                <input name="term" type="text" class="form-control sidebar-search ltr"
                                    value="" placeholder="<?php echo e(__('Search Menu Here')); ?>...">
                            </div>
                        </form>
                    </div>
                </div>
                <li class="nav-item
            <?php if(request()->path() == 'user/dashboard'): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('user-dashboard')); ?>">
                        <i class="la flaticon-paint-palette"></i>
                        <p><?php echo e(__('Dashboard')); ?></p>
                    </a>
                </li>

                <?php if(!is_null($package)): ?>
                    
                    <li class="nav-item
                <?php if(request()->path() == 'user/menu-builder'): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('user.menu_builder.index') . '?language=' . $default->code); ?>">
                            <i class="fas fa-bars"></i>
                            <p><?php echo e(__('Menu Builder')); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(!is_null($package)): ?>
                    
                    <li
                        class="nav-item <?php if(request()->routeIs('user.instructors')): ?> active
                <?php elseif(request()->routeIs('user.create_instructor')): ?> active
                <?php elseif(request()->routeIs('user.edit_instructor')): ?> active
                <?php elseif(request()->routeIs('user.instructor.social_links')): ?> active
                <?php elseif(request()->routeIs('user.instructor.edit_social_link')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('user.instructors', ['language' => $default->code])); ?>">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <p><?php echo e(__('Instructors')); ?></p>
                        </a>
                    </li>
                    
                    
                    <li
                        class="nav-item <?php if(request()->routeIs('user.course_management.settings')): ?> active
                <?php elseif(request()->routeIs('user.course_management.categories')): ?> active
                <?php elseif(request()->routeIs('user.course_management.courses')): ?> active
                <?php elseif(request()->routeIs('user.course_management.create_course')): ?> active
                <?php elseif(request()->routeIs('user.course_management.edit_course')): ?> active
                <?php elseif(request()->routeIs('user.course_management.course.faqs')): ?> active
                <?php elseif(request()->routeIs('user.course_management.course.thanks_page')): ?> active
                <?php elseif(request()->routeIs('user.course_management.course.certificate_settings')): ?> active
                <?php elseif(request()->routeIs('user.course_management.course.modules')): ?> active
                <?php elseif(request()->routeIs('user.course_management.lesson.contents')): ?> active
                <?php elseif(request()->routeIs('user.course_management.lesson.create_quiz')): ?> active
                <?php elseif(request()->routeIs('user.course_management.lesson.manage_quiz')): ?> active
                <?php elseif(request()->routeIs('user.course_management.lesson.edit_quiz')): ?> active
                <?php elseif(request()->routeIs('user.course_management.coupons')): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#course">
                            <i class="fas fa-book"></i>
                            <p><?php echo e(__('Course Management')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div id="course"
                            class="collapse
                    <?php if(request()->routeIs('user.course_management.settings')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.categories')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.courses')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.create_course')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.edit_course')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.course.faqs')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.course.thanks_page')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.course.certificate_settings')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.course.modules')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.lesson.contents')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.lesson.create_quiz')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.lesson.manage_quiz')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.lesson.edit_quiz')): ?> show
                    <?php elseif(request()->routeIs('user.course_management.coupons')): ?> show <?php endif; ?>">
                            <ul class="nav nav-collapse">
                                <li
                                    class="<?php echo e(request()->routeIs('user.course_management.categories') ? 'active' : ''); ?>">
                                    <a
                                        href="<?php echo e(route('user.course_management.categories', ['language' => $default->code])); ?>">
                                        <span class="sub-item"><?php echo e(__('Categories')); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="<?php if(request()->routeIs('user.course_management.courses')): ?> active
                            <?php elseif(request()->routeIs('user.course_management.create_course')): ?> active
                            <?php elseif(request()->routeIs('user.course_management.edit_course')): ?> active
                            <?php elseif(request()->routeIs('user.course_management.course.faqs')): ?> active
                            <?php elseif(request()->routeIs('user.course_management.course.thanks_page')): ?> active
                            <?php elseif(request()->routeIs('user.course_management.course.certificate_settings')): ?> active
                            <?php elseif(request()->routeIs('user.course_management.course.modules')): ?> active
                            <?php elseif(request()->routeIs('user.course_management.lesson.contents')): ?> active
                            <?php elseif(request()->routeIs('user.course_management.lesson.create_quiz')): ?> active
                            <?php elseif(request()->routeIs('user.course_management.lesson.manage_quiz')): ?> active
                            <?php elseif(request()->routeIs('user.course_management.lesson.edit_quiz')): ?> active <?php endif; ?>">
                                    <a
                                        href="<?php echo e(route('user.course_management.courses', ['language' => $default->code])); ?>">
                                        <span class="sub-item"><?php echo e(__('Courses')); ?></span>
                                    </a>
                                </li>
                                <?php if(!empty($permissions) && in_array('Coupon', $permissions)): ?>
                                    <li
                                        class="<?php echo e(request()->routeIs('user.course_management.coupons') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('user.course_management.coupons')); ?>">
                                            <span class="sub-item"><?php echo e(__('Coupons')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>
                    

                    
                    <li
                        class="nav-item
                <?php if(request()->routeIs('user.course_enrolments')): ?> active
                <?php elseif(request()->routeIs('user.course_enrolment.details')): ?> active
                <?php elseif(request()->routeIs('user.course_enrolments.report')): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#enrolment">
                            <i class="far fa-users-class"></i>
                            <p><?php echo e(__('Course Enrolments')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div id="enrolment"
                            class="collapse
                    <?php if(request()->routeIs('user.course_enrolments')): ?> show
                    <?php elseif(request()->routeIs('user.course_enrolment.details')): ?> show
                    <?php elseif(request()->routeIs('user.course_enrolments.report')): ?> show <?php endif; ?>">
                            <ul class="nav nav-collapse">
                                <li
                                    class="<?php echo e(request()->routeIs('user.course_enrolments') && empty(request()->input('status')) ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.course_enrolments')); ?>">
                                        <span class="sub-item"><?php echo e(__('All Enrolments')); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="<?php echo e(request()->routeIs('user.course_enrolments') && request()->input('status') == 'completed' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.course_enrolments', ['status' => 'completed'])); ?>">
                                        <span class="sub-item"><?php echo e(__('Completed Enrolments')); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="<?php echo e(request()->routeIs('user.course_enrolments') && request()->input('status') == 'pending' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.course_enrolments', ['status' => 'pending'])); ?>">
                                        <span class="sub-item"><?php echo e(__('Pending Enrolments')); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="<?php echo e(request()->routeIs('user.course_enrolments') && request()->input('status') == 'rejected' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.course_enrolments', ['status' => 'rejected'])); ?>">
                                        <span class="sub-item"><?php echo e(__('Rejected Enrolments')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php echo e(request()->routeIs('user.course_enrolments.report') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.course_enrolments.report')); ?>">
                                        <span class="sub-item"><?php echo e(__('Report')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                
                <?php if ($__env->exists('user.partials.web_pages')) echo $__env->make('user.partials.web_pages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php if(!is_null($package)): ?>
                    
                    <li
                        class="nav-item
            <?php if(request()->path() == 'user/registered-users'): ?> active
            <?php elseif(request()->routeIs('user.user_details')): ?> active
            <?php elseif(request()->routeIs('user.user.change_password')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('user.registered_users')); ?>">
                            <i class="fas fa-poll-people"></i>
                            <p><?php echo e(__('Registered Users')); ?></p>
                        </a>
                    </li>

                    
                    <li
                        class="nav-item <?php if(request()->routeIs('user.home_page.hero_section')): ?> active
                <?php elseif(request()->routeIs('user.home_page.section_titles')): ?> active
                <?php elseif(request()->routeIs('user.home_page.action_section')): ?> active
                <?php elseif(request()->routeIs('user.home_page.features_section')): ?> active
                <?php elseif(request()->routeIs('user.home_page.video_section')): ?> active
                <?php elseif(request()->routeIs('user.home_page.fun_facts_section')): ?> active
                <?php elseif(request()->routeIs('user.home_page.testimonials_section')): ?> active
                <?php elseif(request()->routeIs('user.home_page.instructor_section')): ?> active
                <?php elseif(request()->routeIs('user.home_page.newsletter_section')): ?> active
                <?php elseif(request()->routeIs('user.home_page.about_us_section')): ?> active
                <?php elseif(request()->routeIs('user.home_page.course_categories_section')): ?> active
                <?php elseif(request()->routeIs('user.home_page.section_customization')): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#home_page">
                            <i class="fas fa-layer-group"></i>
                            <p><?php echo e(__('Home Page')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div id="home_page"
                            class="collapse
                    <?php if(request()->routeIs('user.home_page.hero_section')): ?> show
                    <?php elseif(request()->routeIs('user.home_page.section_titles')): ?> show
                    <?php elseif(request()->routeIs('user.home_page.action_section')): ?> show
                    <?php elseif(request()->routeIs('user.home_page.features_section')): ?> show
                    <?php elseif(request()->routeIs('user.home_page.video_section')): ?> show
                    <?php elseif(request()->routeIs('user.home_page.fun_facts_section')): ?> show
                    <?php elseif(request()->routeIs('user.home_page.testimonials_section')): ?> show
                    <?php elseif(request()->routeIs('user.home_page.instructor_section')): ?> show
                    <?php elseif(request()->routeIs('user.home_page.newsletter_section')): ?> show
                    <?php elseif(request()->routeIs('user.home_page.about_us_section')): ?> show
                    <?php elseif(request()->routeIs('user.home_page.course_categories_section')): ?> show
                    <?php elseif(request()->routeIs('user.home_page.section_customization')): ?> show <?php endif; ?>">
                            <ul class="nav nav-collapse">
                                <li class="<?php echo e(request()->routeIs('user.home_page.hero_section') ? 'active' : ''); ?>">
                                    <a
                                        href="<?php echo e(route('user.home_page.hero_section', ['language' => $default->code])); ?>">
                                        <span class="sub-item"><?php echo e(__('Hero Section')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php echo e(request()->routeIs('user.home_page.section_titles') ? 'active' : ''); ?>">
                                    <a
                                        href="<?php echo e(route('user.home_page.section_titles', ['language' => $default->code])); ?>">
                                        <span class="sub-item"><?php echo e(__('Section Titles')); ?></span>
                                    </a>
                                </li>
                                <?php if(
                                    $userBs->theme_version == 1 ||
                                        $userBs->theme_version == 2 ||
                                        $userBs->theme_version == 3 ||
                                        $userBs->theme_version == 5): ?>
                                    <li
                                        class="<?php echo e(request()->routeIs('user.home_page.action_section') ? 'active' : ''); ?>">
                                        <a
                                            href="<?php echo e(route('user.home_page.action_section', ['language' => $default->code])); ?>">
                                            <span class="sub-item"><?php echo e(__('Call To Action Section')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <li
                                    class="<?php echo e(request()->routeIs('user.home_page.features_section') ? 'active' : ''); ?>">
                                    <a
                                        href="<?php echo e(route('user.home_page.features_section', ['language' => $default->code])); ?>">
                                        <span class="sub-item">

                                            <?php if($userBs->theme_version != 6): ?>
                                                <?php echo e(__('Features Section')); ?>

                                            <?php else: ?>
                                                <?php echo e(__('Video Section')); ?>

                                            <?php endif; ?>


                                        </span>
                                    </a>
                                </li>

                                <?php if($userBs->theme_version == 1 || $userBs->theme_version == 2 || $userBs->theme_version == 3): ?>
                                    <li
                                        class="<?php echo e(request()->routeIs('user.home_page.video_section') ? 'active' : ''); ?>">
                                        <a
                                            href="<?php echo e(route('user.home_page.video_section', ['language' => $default->code])); ?>">
                                            <span class="sub-item"><?php echo e(__('Video Section')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if($userBs->theme_version != 5): ?>
                                    <li
                                        class="<?php echo e(request()->routeIs('user.home_page.fun_facts_section') ? 'active' : ''); ?>">
                                        <a
                                            href="<?php echo e(route('user.home_page.fun_facts_section', ['language' => $default->code])); ?>">
                                            <span class="sub-item"><?php echo e(__('Fun Facts Section')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if($userBs->theme_version == 4 || $userBs->theme_version == 6): ?>
                                    <li
                                        class="<?php echo e(request()->routeIs('user.home_page.instructor_section') ? 'active' : ''); ?>">
                                        <a
                                            href="<?php echo e(route('user.home_page.instructor_section', ['language' => $default->code])); ?>">
                                            <span class="sub-item"><?php echo e(__('Instructor Section')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li
                                    class="<?php echo e(request()->routeIs('user.home_page.testimonials_section') ? 'active' : ''); ?>">
                                    <a
                                        href="<?php echo e(route('user.home_page.testimonials_section', ['language' => $default->code])); ?>">
                                        <span class="sub-item"><?php echo e(__('Testimonials Section')); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="<?php echo e(request()->routeIs('user.home_page.newsletter_section') ? 'active' : ''); ?>">
                                    <a
                                        href="<?php echo e(route('user.home_page.newsletter_section', ['language' => $default->code])); ?>">
                                        <span class="sub-item"><?php echo e(__('Newsletter Section')); ?></span>
                                    </a>
                                </li>
                                <?php if(
                                    $userBs->theme_version == 1 ||
                                        $userBs->theme_version == 2 ||
                                        $userBs->theme_version == 3 ||
                                        $userBs->theme_version == 4): ?>
                                    <li
                                        class="<?php echo e(request()->routeIs('user.home_page.about_us_section') ? 'active' : ''); ?>">
                                        <a
                                            href="<?php echo e(route('user.home_page.about_us_section', ['language' => $default->code])); ?>">
                                            <span class="sub-item"><?php echo e(__('About Us Section')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if($userBs->theme_version == 1 || $userBs->theme_version == 2 || $userBs->theme_version == 3): ?>
                                    <li
                                        class="<?php echo e(request()->routeIs('user.home_page.course_categories_section') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('user.home_page.course_categories_section')); ?>">
                                            <span class="sub-item"><?php echo e(__('Course Categories Section')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li
                                    class="<?php echo e(request()->routeIs('user.home_page.section_customization') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.home_page.section_customization')); ?>">
                                        <span class="sub-item"><?php echo e(__('Section Customization')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    <li
                        class="nav-item
                <?php if(request()->routeIs('user.footer.content')): ?> active
                <?php elseif(request()->routeIs('user.footer.quick_links')): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#footer">
                            <i class="far fa-shoe-prints"></i>
                            <p><?php echo e(__('Footer')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div id="footer"
                            class="collapse
                    <?php if(request()->routeIs('user.footer.content')): ?> show
                    <?php elseif(request()->routeIs('user.footer.quick_links')): ?> show <?php endif; ?>">
                            <ul class="nav nav-collapse">
                                <li class="<?php echo e(request()->routeIs('user.footer.content') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.footer.content') . '?language=' . $default->code); ?>">
                                        <span class="sub-item"><?php echo e(__('Footer Content')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php echo e(request()->routeIs('user.footer.quick_links') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.footer.quick_links') . '?language=' . $default->code); ?>">
                                        <span class="sub-item"><?php echo e(__('Quick Links')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                
                <?php if(!empty($permissions) && in_array('Custom Page', $permissions)): ?>
                    <li
                        class="nav-item <?php if(request()->routeIs('user.custom_pages')): ?> active
                <?php elseif(request()->routeIs('user.custom_pages.create_page')): ?> active
                <?php elseif(request()->routeIs('user.custom_pages.edit_page')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('user.custom_pages', ['language' => $default->code])); ?>">
                            <i class="la flaticon-file"></i>
                            <p><?php echo e(__('Custom Pages')); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                
                <?php if(!empty($permissions) && in_array('Blog', $permissions)): ?>
                    <li
                        class="nav-item <?php if(request()->routeIs('user.blog_management.categories')): ?> active
                <?php elseif(request()->routeIs('user.blog_management.blogs')): ?> active
                <?php elseif(request()->routeIs('user.blog_management.create_blog')): ?> active
                <?php elseif(request()->routeIs('user.blog_management.edit_blog')): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#blog">
                            <i class="fas fa-blog"></i>
                            <p><?php echo e(__('Blog Management')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div id="blog"
                            class="collapse
                    <?php if(request()->routeIs('user.blog_management.categories')): ?> show
                    <?php elseif(request()->routeIs('user.blog_management.blogs')): ?> show
                    <?php elseif(request()->routeIs('user.blog_management.create_blog')): ?> show
                    <?php elseif(request()->routeIs('user.blog_management.edit_blog')): ?> show <?php endif; ?>">
                            <ul class="nav nav-collapse">
                                <li
                                    class="<?php echo e(request()->routeIs('user.blog_management.categories') ? 'active' : ''); ?>">
                                    <a
                                        href="<?php echo e(route('user.blog_management.categories', ['language' => $default->code])); ?>">
                                        <span class="sub-item"><?php echo e(__('Categories')); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="<?php if(request()->routeIs('user.blog_management.blogs')): ?> active
                            <?php elseif(request()->routeIs('user.blog_management.create_blog')): ?> active
                            <?php elseif(request()->routeIs('user.blog_management.edit_blog')): ?> active <?php endif; ?>">
                                    <a
                                        href="<?php echo e(route('user.blog_management.blogs', ['language' => $default->code])); ?>">
                                        <span class="sub-item"><?php echo e(__('Blog')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(!is_null($package)): ?>
                    
                    <li class="nav-item <?php echo e(request()->routeIs('user.faq_management') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('user.faq_management', ['language' => $default->code])); ?>">
                            <i class="la flaticon-round"></i>
                            <p><?php echo e(__('FAQ Management')); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                
                <?php if(!empty($permissions) && in_array('QR Builder', $permissions)): ?>
                    <li
                        class="nav-item
                <?php if(request()->routeIs('user.qrcode')): ?> active
                <?php elseif(request()->routeIs('user.qrcode.index')): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#qrcode">
                            <i class="fas fa-qrcode"></i>
                            <p><?php echo e(__('QR Codes')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                    <?php if(request()->routeIs('user.qrcode')): ?> show
                    <?php elseif(request()->routeIs('user.qrcode.index')): ?> show <?php endif; ?>"
                            id="qrcode">
                            <ul class="nav nav-collapse">
                                <li class="<?php if(request()->routeIs('user.qrcode')): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.qrcode')); ?>">
                                        <span class="sub-item"><?php echo e(__('Generate QR Code')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->routeIs('user.qrcode.index')): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.qrcode.index')); ?>">
                                        <span class="sub-item"><?php echo e(__('Saved QR Codes')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>


                <?php if(!empty($permissions) && in_array('vCard', $permissions)): ?>
                    <li
                        class="nav-item
                <?php if(request()->path() == 'user/vcard'): ?> active
                <?php elseif(request()->path() == 'user/vcard/create'): ?> active
                <?php elseif(request()->is('user/vcard/*/edit')): ?> active
                <?php elseif(request()->routeIs('user.vcard.services')): ?> active
                <?php elseif(request()->routeIs('user.vcard.projects')): ?> active
                <?php elseif(request()->routeIs('user.vcard.testimonials')): ?> active
                <?php elseif(request()->routeIs('user.vcard.about')): ?> active
                <?php elseif(request()->routeIs('user.vcard.preferences')): ?> active
                <?php elseif(request()->routeIs('user.vcard.color')): ?> active
                <?php elseif(request()->routeIs('user.vcard.keywords')): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#vcard">
                            <i class="far fa-address-card"></i>
                            <p><?php echo e(__('vCards Management')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                    <?php if(request()->path() == 'user/vcard'): ?> show
                    <?php elseif(request()->path() == 'user/vcard/create'): ?> show
                    <?php elseif(request()->is('user/vcard/*/edit')): ?> show
                    <?php elseif(request()->routeIs('user.vcard.services')): ?> show
                    <?php elseif(request()->routeIs('user.vcard.projects')): ?> show
                    <?php elseif(request()->routeIs('user.vcard.testimonials')): ?> show
                    <?php elseif(request()->routeIs('user.vcard.about')): ?> show
                    <?php elseif(request()->routeIs('user.vcard.preferences')): ?> show
                    <?php elseif(request()->routeIs('user.vcard.color')): ?> show
                    <?php elseif(request()->routeIs('user.vcard.keywords')): ?> show <?php endif; ?>"
                            id="vcard">
                            <ul class="nav nav-collapse">
                                <li
                                    class="<?php if(request()->path() == 'user/vcard'): ?> active
                            <?php elseif(request()->is('user/vcard/*/edit')): ?> active
                            <?php elseif(request()->routeIs('user.vcard.services')): ?> active
                            <?php elseif(request()->routeIs('user.vcard.projects')): ?> active
                            <?php elseif(request()->routeIs('user.vcard.testimonials')): ?> active
                            <?php elseif(request()->routeIs('user.vcard.about')): ?> active
                            <?php elseif(request()->routeIs('user.vcard.preferences')): ?> active
                            <?php elseif(request()->routeIs('user.vcard.color')): ?> active
                            <?php elseif(request()->routeIs('user.vcard.keywords')): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.vcard')); ?>">
                                        <span class="sub-item"><?php echo e(__('vCards')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/vcard/create'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.vcard.create')); ?>">
                                        <span class="sub-item"><?php echo e(__('Add vCard')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(!empty($permissions) && in_array('Follow/Unfollow', $permissions)): ?>
                    <li
                        class="nav-item
                    <?php if(request()->path() == 'user/follower-list'): ?> active
                    <?php elseif(request()->path() == 'user/following-list'): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#follow">
                            <i class="fas fa-user-friends"></i>
                            <p><?php echo e(__('Follower/Following')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                        <?php if(request()->path() == 'user/follower-list'): ?> show
                        <?php elseif(request()->path() == 'user/following-list'): ?> show <?php endif; ?>"
                            id="follow">
                            <ul class="nav nav-collapse">
                                <li class="<?php if(request()->path() == 'user/follower-list'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.follower.list')); ?>">
                                        <span class="sub-item"><?php echo e(__('Follower')); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="
                                <?php if(request()->path() == 'user/following-list'): ?> active
                                <?php elseif(request()->is('user/following-list')): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.following.list')); ?>">
                                        <span class="sub-item"><?php echo e(__('Following')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(!is_null($package)): ?>
                    
                    <li
                        class="nav-item
                <?php if(request()->path() == 'user/subscribers'): ?> active
                <?php elseif(request()->path() == 'user/mailsubscriber'): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#subscribers">
                            <i class="la flaticon-envelope"></i>
                            <p><?php echo e(__('Subscribers')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                    <?php if(request()->path() == 'user/subscribers'): ?> show
                    <?php elseif(request()->path() == 'user/mailsubscriber'): ?> show <?php endif; ?>"
                            id="subscribers">
                            <ul class="nav nav-collapse">
                                <li class="<?php if(request()->path() == 'user/subscribers'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.subscriber.index')); ?>">
                                        <span class="sub-item"><?php echo e(__('Subscribers')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/mailsubscriber'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.mailsubscriber')); ?>">
                                        <span class="sub-item"><?php echo e(__('Mail to Subscribers')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                <?php endif; ?>

                
                <?php if(!empty($permissions) && in_array('Advertisement', $permissions)): ?>
                    <li
                        class="nav-item
                <?php if(request()->routeIs('user.advertise.settings')): ?> active
                <?php elseif(request()->routeIs('user.advertisements')): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#ad">
                            <i class="fab fa-buysellads"></i>
                            <p><?php echo e(__('Advertisements')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div id="ad"
                            class="collapse
                    <?php if(request()->routeIs('user.advertise.settings')): ?> show
                    <?php elseif(request()->routeIs('user.advertisements')): ?> show <?php endif; ?>">
                            <ul class="nav nav-collapse">
                                <li class="<?php echo e(request()->routeIs('user.advertise.settings') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.advertise.settings')); ?>">
                                        <span class="sub-item"><?php echo e(__('Settings')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php echo e(request()->routeIs('user.advertisements') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.advertisements')); ?>">
                                        <span class="sub-item"><?php echo e(__('Advertisements')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(!is_null($package)): ?>
                    
                    <li
                        class="nav-item <?php if(request()->routeIs('user.announcement_popups')): ?> active
                <?php elseif(request()->routeIs('user.announcement_popups.select_popup_type')): ?> active
                <?php elseif(request()->routeIs('user.announcement_popups.create_popup')): ?> active
                <?php elseif(request()->routeIs('user.announcement_popups.edit_popup')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('user.announcement_popups', ['language' => $default->code])); ?>">
                            <i class="fas fa-bullhorn"></i>
                            <p><?php echo e(__('Announcement Popups')); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(!is_null($package)): ?>
                    
                    <li
                        class="nav-item
                <?php if(request()->path() == 'user/gateways'): ?> active
                <?php elseif(request()->path() == 'user/offline/gateways'): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#gateways">
                            <i class="la flaticon-paypal"></i>
                            <p><?php echo e(__('Payment Gateways')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                    <?php if(request()->path() == 'user/gateways'): ?> show
                    <?php elseif(request()->path() == 'user/offline/gateways'): ?> show <?php endif; ?>"
                            id="gateways">
                            <ul class="nav nav-collapse">
                                <li class="<?php if(request()->path() == 'user/gateways'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.gateway.index')); ?>">
                                        <span class="sub-item"><?php echo e(__('Online Gateways')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/offline/gateways'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.gateway.offline') . '?language=' . $default->code); ?>">
                                        <span class="sub-item"><?php echo e(__('Offline Gateways')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li
                        class="nav-item
                <?php if(request()->path() == 'user/favicon'): ?> active
                <?php elseif(request()->path() == 'user/theme/version'): ?> active
                <?php elseif(request()->path() == 'user/logo'): ?> active
                <?php elseif(request()->path() == 'user/footer-logo'): ?> active
                <?php elseif(request()->path() == 'user/currency'): ?> active
                <?php elseif(request()->path() == 'user/appearance'): ?> active
                <?php elseif(request()->path() == 'user/social'): ?> active
                <?php elseif(request()->is('user/social/*')): ?> active
                <?php elseif(request()->path() == 'user/basic_settings/seo'): ?> active
                <?php elseif(request()->is('user/breadcrumb')): ?> active
                <?php elseif(request()->is('user/information')): ?> active
                <?php elseif(request()->is('user/page-headings')): ?> active
                <?php elseif(request()->is('user/plugins')): ?> active
                <?php elseif(request()->is('user/maintenance-mode')): ?> active
                <?php elseif(request()->is('user/cookie-alert')): ?> active
                <?php elseif(request()->routeIs('user.mail_templates')): ?> active
                <?php elseif(request()->routeIs('user.edit_mail_template')): ?> active
                <?php elseif(request()->routeIs('user.mail.info')): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#basic">
                            <i class="la flaticon-settings"></i>
                            <p><?php echo e(__('Basic Settings')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                    <?php if(request()->path() == 'user/favicon'): ?> show
                    <?php elseif(request()->path() == 'user/theme/version'): ?> show
                    <?php elseif(request()->path() == 'user/logo'): ?> show
                    <?php elseif(request()->path() == 'user/footer-logo'): ?> show
                    <?php elseif(request()->path() == 'user/currency'): ?> show
                    <?php elseif(request()->path() == 'user/appearance'): ?> show
                    <?php elseif(request()->path() == 'user/social'): ?> show
                    <?php elseif(request()->is('user/social/*')): ?> show
                    <?php elseif(request()->path() == 'user/basic_settings/seo'): ?> show
                    <?php elseif(request()->is('user/breadcrumb')): ?> show
                    <?php elseif(request()->is('user/information')): ?> show
                    <?php elseif(request()->is('user/page-headings')): ?> show
                    <?php elseif(request()->is('user/plugins')): ?> show
                    <?php elseif(request()->is('user/maintenance-mode')): ?> show
                    <?php elseif(request()->is('user/cookie-alert')): ?> show
                    <?php elseif(request()->routeIs('user.mail_templates')): ?> show
                    <?php elseif(request()->routeIs('user.edit_mail_template')): ?> show
                    <?php elseif(request()->routeIs('user.mail.info')): ?> show <?php endif; ?>"
                            id="basic">
                            <ul class="nav nav-collapse">
                                <li class="<?php if(request()->path() == 'user/favicon'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.favicon')); ?>">
                                        <span class="sub-item"><?php echo e(__('Favicon')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/logo'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.logo')); ?>">
                                        <span class="sub-item"><?php echo e(__('Logo')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/information'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.basic_settings.information')); ?>">
                                        <span class="sub-item"><?php echo e(__('Information')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/theme/version'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.theme.version')); ?>">
                                        <span class="sub-item"><?php echo e(__('Theme & Home')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/currency'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.currency')); ?>">
                                        <span class="sub-item"><?php echo e(__('Currency')); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="submenu
                            <?php if(request()->routeIs('user.mail_templates')): ?> selected
                            <?php elseif(request()->routeIs('user.edit_mail_template')): ?> selected
                            <?php elseif(request()->routeIs('user.mail.info')): ?> selected <?php endif; ?>">
                                    <a data-toggle="collapse" href="#mail_settings">
                                        <span class="sub-item"><?php echo e(__('Email Settings')); ?></span>
                                        <span class="caret"></span>
                                    </a>
                                    <div id="mail_settings"
                                        class="collapse
                                <?php if(request()->routeIs('user.mail_templates')): ?> show
                                <?php elseif(request()->routeIs('user.mail.info')): ?> show
                                <?php elseif(request()->routeIs('user.edit_mail_template')): ?> show <?php endif; ?>">
                                        <ul class="nav nav-collapse subnav">
                                            <li class="<?php if(request()->routeIs('user.mail.info')): ?> active <?php endif; ?>">
                                                <a href="<?php echo e(route('user.mail.info')); ?>">
                                                    <span class="sub-item"><?php echo e(__('Mail Information')); ?></span>
                                                </a>
                                            </li>
                                            <li
                                                class="<?php if(request()->routeIs('user.mail_templates')): ?> active
                                        <?php elseif(request()->routeIs('user.edit_mail_template')): ?> active <?php endif; ?>">
                                                <a href="<?php echo e(route('user.mail_templates')); ?>">
                                                    <span class="sub-item"><?php echo e(__('Mail Templates')); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="<?php if(request()->path() == 'user/appearance'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.appearance')); ?>">
                                        <span class="sub-item"><?php echo e(__('Website Appearance')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/breadcrumb'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.breadcrumb')); ?>">
                                        <span class="sub-item"><?php echo e(__('Breadcrumb')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php echo e(request()->routeIs('user.page_headings') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.page_headings', ['language' => $default->code])); ?>">
                                        <span class="sub-item"><?php echo e(__('Page Headings')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php echo e(request()->routeIs('user.plugins') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.plugins')); ?>">
                                        <span class="sub-item"><?php echo e(__('Plugins')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/basic_settings/seo'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.basic_settings.seo', ['language' => $default->code])); ?>">
                                        <span class="sub-item"><?php echo e(__('SEO Information')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php echo e(request()->routeIs('user.maintenance_mode') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.maintenance_mode')); ?>">
                                        <span class="sub-item"><?php echo e(__('Maintenance Mode')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php echo e(request()->routeIs('user.cookie_alert') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('user.cookie_alert', ['language' => $default->code])); ?>">
                                        <span class="sub-item"><?php echo e(__('Cookie Alert')); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/footer-logo'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.footer.logo')); ?>">
                                        <span class="sub-item"><?php echo e(__('Footer Logo')); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="<?php if(request()->path() == 'user/social'): ?> active
                            <?php elseif(request()->is('user/social/*')): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.social.index')); ?>">
                                        <span class="sub-item"><?php echo e(__('Social Medias')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

              <?php if(!is_null($package)): ?>
                    <li
                        class="nav-item
            <?php if(request()->path() == 'user/domains'): ?> active
            <?php elseif(request()->path() == 'user/subdomain'): ?> active <?php endif; ?>">
                        <a data-toggle="collapse" href="#domains">
                            <i class="fas fa-link"></i>
                            <p><?php echo e(__('Domains & URLs')); ?></p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                <?php if(request()->path() == 'user/domains'): ?> show
                <?php elseif(request()->path() == 'user/subdomain'): ?> show <?php endif; ?>"
                            id="domains">
                            <ul class="nav nav-collapse">
                                <?php if(!empty($permissions) && in_array('Custom Domain', $permissions)): ?>
                                    <li
                                        class="
                        <?php if(request()->path() == 'user/domains'): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('user-domains')); ?>">
                                            <span class="sub-item"><?php echo e(__('Custom Domain')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!empty($permissions) && in_array('Subdomain', $permissions)): ?>
                                    <li
                                        class="
                        <?php if(request()->path() == 'user/subdomain'): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('user-subdomain')); ?>">
                                            <span class="sub-item"><?php echo e(__('Subdomain & Path URL')); ?></span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li
                                        class="
                        <?php if(request()->path() == 'user/subdomain'): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('user-subdomain')); ?>">
                                            <span class="sub-item"><?php echo e(__('Path Based URL')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>

                    
                    
                <?php endif; ?>

                <li
                    class="nav-item
        <?php if(request()->path() == 'user/package-list'): ?> active
        <?php elseif(request()->is('user/package/checkout/*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('user.plan.extend.index')); ?>">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p><?php echo e(__('Buy Plan')); ?></p>
                    </a>
                </li>

                <li class="nav-item
        <?php if(request()->path() == 'user/payment-log'): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('user.payment-log.index')); ?>">
                        <i class="fas fa-list-ol"></i>
                        <p><?php echo e(__('Payment Logs')); ?></p>
                    </a>
                </li>

                <?php if(!is_null($package)): ?>
                    <li class="nav-item
            <?php if(request()->path() == 'user/profile'): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('user-profile')); ?>">
                            <i class="far fa-user-circle"></i>
                            <p><?php echo e(__('Edit Profile')); ?></p>
                        </a>
                    </li>

                    <li class="nav-item <?php if(request()->path() == 'user/change-password'): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('user.changePass')); ?>">
                            <i class="fas fa-key"></i>
                            <p><?php echo e(__('Change Password')); ?></p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/partials/side-navbar.blade.php ENDPATH**/ ?>