<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLanguageLink">
    <?php $__currentLoopData = array_keys(config('locale.languages')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($lang != app()->getLocale()): ?>
            <small><a href="<?php echo e('/lang/'.$lang); ?>" class="dropdown-item"><?php echo e(__('menus.language-picker.langs.'.$lang)); ?></a></small>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
