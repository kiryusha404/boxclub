<?php $__env->startSection('content'); ?>

    <div class="about">
        <h1 class="name_page">Заявки</h1>
        <h3 class="name_page">Необработанные заявки</h3>
        <?php if(isset($expectation[0]->name)): ?>
        <?php $__currentLoopData = $expectation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card card_feedback position-relative" style="width: 100%;">
                <div class="card-body">
                    <h6><?php echo e($application->surname); ?> <?php echo e($application->name); ?> <?php echo e($application->patronymic); ?></h6>
                    <p class="card-text" style="margin-bottom: 0px;">Почта: <?php echo e($application->email); ?></p>
                    <p class="card-text">Номер телефона: <?php echo e($application->tel); ?></p>
                    <p class="date_news date_feedback"><?php echo e(date('H:i d.m.y', strtotime($application->date))); ?></p>
                </div>

                <div class=" position-absolute top-0 end-0">
                    <form action="<?php echo e(route('processing_application')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($application->application); ?>">
                        <div class="input-group text-danger">
                            <button type="submit" class="btn btn-link " data-mdb-ripple-init style="padding: 20px; padding-top: 15px;">Обработать</button>
                        </div>
                    </form>
                </div>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="name_page">Пока пусто.</p>
        <?php endif; ?>
        <h3 class="name_page">Заявки в обработке</h3>
        <?php if(isset($processing[0]->name)): ?>
        <?php $__currentLoopData = $processing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card card_feedback position-relative" style="width: 100%;">
                    <div class="card-body">
                        <h6><?php echo e($application->surname); ?> <?php echo e($application->name); ?> <?php echo e($application->patronymic); ?></h6>
                        <p class="card-text" style="margin-bottom: 0px;">Почта: <?php echo e($application->email); ?></p>
                        <p class="card-text">Номер телефона: <?php echo e($application->tel); ?></p>
                        <p class="date_news date_feedback"><?php echo e(date('H:i d.m.y', strtotime($application->date))); ?></p>
                    </div>

                    <div class=" position-absolute top-0 end-0">
                        <form action="<?php echo e(route('completed_application')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($application->application); ?>">
                            <div class="input-group text-danger">
                                <button type="submit" class="btn btn-link " data-mdb-ripple-init style="padding: 20px; padding-top: 15px;">Завершить</button>
                            </div>
                        </form>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="name_page">Пока пусто.</p>
        <?php endif; ?>
        <h3 class="name_page">Завершенные заявки</h3>

        <?php if(isset($completed[0]->name)): ?>
        <?php $__currentLoopData = $completed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card card_feedback " style="width: 100%;">
                <div class="card-body">
                    <h6><?php echo e($application->surname); ?> <?php echo e($application->name); ?> <?php echo e($application->patronymic); ?></h6>
                    <p class="card-text" style="margin-bottom: 0px;">Почта: <?php echo e($application->email); ?></p>
                    <p class="card-text">Номер телефона: <?php echo e($application->tel); ?></p>
                    <p class="date_news date_feedback"><?php echo e(date('H:i d.m.y', strtotime($application->date))); ?></p>
                </div>


            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="name_page">Пока пусто.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\box\project\resources\views/application.blade.php ENDPATH**/ ?>