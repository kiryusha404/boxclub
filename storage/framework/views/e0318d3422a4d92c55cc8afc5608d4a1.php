<?php $__env->startSection('content'); ?>

    <div class="about">
        <h1 class="name_page">Админ панель</h1>
        <h3 class="name_page">Добавить модератора</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">


                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('add_moder')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row mb-3">
                                    <label for="moder" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Пользователь')); ?></label>

                                    <div class="col-md-6">
                                        <select class="form-select" aria-label="Disabled select example" name="moder">
                                            <option selected disabled>Выберете</option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->surname); ?> <?php echo e($user->name); ?> <?php echo e($user->patronymic); ?> - <?php echo e($user->email); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo e(__('Добавить')); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h3 class="name_page">Удалить модератора</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">


                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('del_moder')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row mb-3">
                                    <label for="moder" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Пользователь')); ?></label>

                                    <div class="col-md-6">
                                        <select class="form-select" aria-label="Disabled select example" name="moder">
                                            <option selected disabled>Выберете</option>
                                            <?php $__currentLoopData = $moders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($moder->id); ?>"><?php echo e($moder->surname); ?> <?php echo e($moder->name); ?> <?php echo e($moder->patronymic); ?> - <?php echo e($moder->email); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo e(__('Удалить')); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\box\project\resources\views/admin.blade.php ENDPATH**/ ?>