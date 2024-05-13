<?php $__env->startSection('content'); ?>

    <div class="schedule">
        <div class="card mb-3">
            <div class="card-body" style="text-align: center;">
                <p>Ваша заявка отправлена. С вами свяжутся по контактам указаным при регистрации.</p>
                    <form action="<?php echo e(route('schedule')); ?>" method="get" >
                        <?php echo csrf_field(); ?>
                        <div class="input-group" style="display: inline; text-align: center;">
                            <button type="submit" class="btn btn-outline-primary " data-mdb-ripple-init>Ок</button>
                        </div>
                    </form>
            </div>
        </div>
    <div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\box\project\resources\views/application_information.blade.php ENDPATH**/ ?>