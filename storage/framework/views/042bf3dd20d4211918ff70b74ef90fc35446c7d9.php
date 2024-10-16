<?php
    use App\Models\User\Language;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;
    $userDefaultLang = Language::where([
        ['user_id',Auth::guard('web')->user()->id],
        ['is_default',1]
    ])->first();
    $userLanguages = Language::where('user_id',Auth::guard('web')->user()->id)->get()
?>
<?php if(!is_null($userDefaultLang)): ?>
    <?php if(!empty($userLanguages)): ?>
        <select name="userLanguage" class="form-control"
                onchange="window.location='<?php echo e(url()->current() . '?language='); ?>'+this.value">
            <option value="" selected disabled><?php echo e(__('Select a Language')); ?></option>
            <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($lang->code); ?>" <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?>><?php echo e($lang->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\coursemagix\resources\views/user/partials/languages.blade.php ENDPATH**/ ?>