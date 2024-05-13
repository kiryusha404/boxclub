<?php $__env->startSection('content'); ?>
    <div class="coach">
        <h1 class="name_page">Наша гордость</h1>

        <?php $__currentLoopData = $boxers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boxer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php echo e(Storage::url($boxer->img)); ?>" class="img-fluid rounded-start" alt="boxer">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($boxer->surname); ?> <?php echo e($boxer->name); ?> <?php echo e($boxer->patronymic); ?></h5>
                            <p class="card-text"><?php echo e($boxer->text); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\box\project\resources\views/boxer.blade.php ENDPATH**/ ?>