<?php $__env->startSection('content'); ?>
<div class="feedback">
    <h1 class="name_page">Отзывы</h1>

    <div class="feedback_user">

        <?php if(auth()->check()): ?>
        <div class="card card_feedback" style="width: 100%;">
            <div class="card-body">

                <?php if(!$form): ?>
                        <form action="<?php echo e(route('add_feedback')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <input type="text" name="feedback" class="form-control rounded" placeholder="Напишите ваш отзыв.." required aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Отправить</button>
                            </div>
                        </form>
                <?php else: ?>
                        <form action="<?php echo e(route('del_feedback')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Удалить свой отзыв</button>
                            </div>
                        </form>
                <?php endif; ?>

            </div>
        </div>
        <?php endif; ?>

        <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card card_feedback" style="width: 100%;">
                <div class="card-body">
                    <h6><?php echo e($feedback->surname); ?> <?php echo e($feedback->name); ?></h6>
                    <p class="card-text"><?php echo e($feedback->text); ?></p>
                    <p class="date_news date_feedback"><?php echo e(date('H:i d.m.y', strtotime($feedback->date))); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\box\project\resources\views/feedback.blade.php ENDPATH**/ ?>