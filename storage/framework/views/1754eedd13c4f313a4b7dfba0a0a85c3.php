<?php $__env->startSection('content'); ?>

    <div class="schedule">
        <h1 class="name_page">Расписание</h1>


        <?php if(Auth()->User() && isset($status[0]->status) && $status[0]->status != 'completed' ): ?>
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
                    <?php if($status[0]->status != 'processing'): ?>
                    <form action="<?php echo e(route('del_application')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Удалить заявку</button>
                        </div>
                    </form>
                    <?php else: ?>
                        <p class="name_page" style="margin-bottom: 0px;">Ваша заявка обрабатывается</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
            <?php elseif(!Auth()->User() || !isset($status[0]->status)): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="<?php echo e(route('add_application')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Записаться на первое занятие</button>
                            </div>
                        </form>
                    </div>
                </div>
            
        <?php endif; ?>


        <?php if(Auth()->User() && Auth()->User()->role_id > 1): ?>
            <div class=" block_news" style="width: 100%;">
                <div class="row justify-content-center">
                    <div  >
                        <div class="card">
                            <div class="card-header"><?php echo e(__('Добавить спортивные занятия')); ?></div>

                            <div class="card-body">

                                <form method="POST" action="<?php echo e(route('add_schedule')); ?>" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="weekday">Дни недели</label>
                                        <select class="form-select" aria-label="Disabled select example" name="weekday" id="weekday" required>
                                            <option selected disabled>Выберите</option>
                                            <?php $__currentLoopData = $weekday; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($day->id); ?>"><?php echo e($day->weekday); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Название группы</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="time1">Время занятия</label>
                                        <div class="d-flex justify-content-between">
                                        <p >C </p>
                                        <input type="time" class="form-control w-25" id="time1" name="time1" required>
                                        <p> до </p>
                                        <input type="time" class="form-control w-25" id="time2" name="time2" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Добавить</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3 ">
            <div class="card-body">
                <h5 class="card-title">Тренер: <?php echo e($coach->surname); ?> <?php echo e($coach->name); ?> <?php echo e($coach->patronymic); ?></h5>
                <?php $__currentLoopData = $coach->position; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="position-relative">
                        <h6 style="margin: 0;"><?php echo e($schedule->schedule_name); ?>:</h6>
                        <p class="card-text" style="margin-bottom: 10px;"><?php echo e($schedule->weekday); ?> с <?php echo e(date('H:i', strtotime($schedule->time1))); ?> до <?php echo e(date('H:i', strtotime($schedule->time2))); ?></p>

                            <?php if(Auth()->User() && Auth()->User()->id == $schedule->user_id): ?>
                                <div class=" position-absolute top-0 end-0">
                                    <form action="<?php echo e(route('del_schedule')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($schedule->schedule_id); ?>">
                                        <div class="input-group text-danger">
                                            <button type="submit" class="btn btn-link btn-sm" data-mdb-ripple-init style="padding: 0px;">Удалить</button>
                                        </div>
                                    </form>
                                </div>
                            <?php elseif(Auth()->User() && Auth()->User()->role_id == 3): ?>
                                <div class=" position-absolute top-0 end-0">
                                    <form action="<?php echo e(route('del_schedule_admin')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($schedule->schedule_id); ?>">
                                        <div class="input-group text-danger">
                                            <button type="submit" class="btn btn-link btn-sm" data-mdb-ripple-init style="padding: 0px;">Удалить</button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\box\project\resources\views/schedule.blade.php ENDPATH**/ ?>