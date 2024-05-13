<?php $__env->startSection('content'); ?>

    <div class="schedule">
        <h1 class="name_page">Расписание</h1>
        <div class="card mb-3">
            <div class="card-body">
                <?php if($form == 0): ?>
                <form action="<?php echo e(route('add_application')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Записаться на первое занятие</button>
                    </div>
                </form>
                <?php else: ?>
                    <form action="<?php echo e(route('del_application')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Удалить заявку</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
        <?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Тренер: <?php echo e($coach->surname); ?> <?php echo e($coach->name); ?> <?php echo e($coach->patronymic); ?></h5>
                <?php $__currentLoopData = $coach->position; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h6 style="margin: 0;"><?php echo e($schedule->schedule_name); ?>:</h6>
                <p class="card-text"><?php echo e($schedule->weekday); ?> с <?php echo e(date('H:i', strtotime($schedule->time1))); ?> до <?php echo e(date('H:i', strtotime($schedule->time2))); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\box\project\resources\views/schedule.blade.php ENDPATH**/ ?>