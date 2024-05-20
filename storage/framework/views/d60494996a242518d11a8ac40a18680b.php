<?php $__env->startSection('content'); ?>
    <div class="coach">
        <h1 class="name_page">Наша гордость</h1>

        <?php if(Auth()->User() && Auth()->User()->role_id > 1): ?>
            <div class=" block_news" style="width: 100%;">
                <div class="row justify-content-center">
                    <div  >
                        <div class="card">
                            <div class="card-header"><?php echo e(__('Добавить карточку боксёра')); ?></div>

                            <div class="card-body">

                                <form method="POST" action="<?php echo e(route('add_boxer')); ?>" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="name">Имя спортмена</label>
                                        <select class="form-select" aria-label="Disabled select example" name="id" id="name" required>
                                            <option selected disabled>Выберите</option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->surname); ?> <?php echo e($user->name); ?> <?php echo e($user->patronymic); ?> - <?php echo e($user->email); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Описание спортмена</label>
                                        <textarea class="form-control" id="body" rows="3" name="body" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" style="width: 100%;">Фотография спортсмена</label>
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
                            <?php if(Auth()->User() && Auth()->User()->role_id > 1): ?>

                                <div class="news_comment " style="margin-bottom: 15px; ">
                                    <form action="<?php echo e(route('del_boxer')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($boxer->id); ?>">
                                        <div class="input-group text-danger">
                                            <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Удалить карточку спортмена</button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\box\project\resources\views/boxer.blade.php ENDPATH**/ ?>