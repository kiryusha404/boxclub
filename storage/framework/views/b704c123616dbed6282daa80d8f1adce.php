<?php $__env->startSection('content'); ?>
    <div class="coach">
        <h1 class="name_page">Тренеры</h1>

        <?php if(Auth()->User() && Auth()->User()->role_id = 3): ?>
            <div class=" block_news" style="width: 100%;">
                <div class="row justify-content-center">
                    <div class="" >
                        <div class="card">
                            <div class="card-header"><?php echo e(__('Добавить карточку тренера')); ?></div>

                            <div class="card-body">

                                <form method="POST" action="<?php echo e(route('add_coach')); ?>" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="name">Имя тренера</label>
                                        <select class="form-select" aria-label="Disabled select example" name="id">
                                            <option selected disabled>Выберите</option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->surname); ?> <?php echo e($user->name); ?> <?php echo e($user->patronymic); ?> - <?php echo e($user->email); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Описание тренера</label>
                                        <textarea class="form-control" id="body" rows="3" name="body" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" style="width: 100%;">Фотография тренера</label>
                                        <input type="file" class="form-control-file" id="image" name="image" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Опубликовать</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php $__currentLoopData = $coachs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo e(Storage::url($coach->img)); ?>" class="img-fluid rounded-start" alt="coach">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($coach->surname); ?> <?php echo e($coach->name); ?> <?php echo e($coach->patronymic); ?></h5>
                        <p class="card-text"><?php echo e($coach->text); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\box\project\resources\views/coach.blade.php ENDPATH**/ ?>