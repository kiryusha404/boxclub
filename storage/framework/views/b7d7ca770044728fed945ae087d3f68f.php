<?php $__env->startSection('content'); ?>
<div class="news">
    <h1 class="name_page">Новости</h1>

    <?php if(Auth()->User() && Auth()->User()->role_id > 1): ?>
        <div class=" block_news" style="width: 70%;">
            <div class="row justify-content-center">
                <div class="" >
                    <div class="card">
                        <div class="card-header"><?php echo e(__('Добавить новость')); ?></div>

                        <div class="card-body">

                            <form method="POST" action="<?php echo e(route('add_news')); ?>" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="name">Название новости</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="body">Содержание</label>
                                    <textarea class="form-control" id="body" rows="3" name="body" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image" style="width: 100%;">Картинка для новости</label>
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

    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card block_news" style="width: 70%;">
        <img class="card-img-top" src="<?php echo e(Storage::url($new->img)); ?>" alt="фото новости">
        <div class="card-body pb-0">
            <h5 class="card-title"><?php echo e($new->name); ?></h5>
            <p class="card-text"><?php echo e($new->text); ?></p>
            <p class="card-text date_news"><?php echo e(date('H:i d.m.y', strtotime($new->date))); ?></p>
        </div>
        <?php if(Auth()->User() && Auth()->User()->role_id > 1): ?>

            <div class="news_comment" style="margin-bottom: 15px;">
                <form action="<?php echo e(route('del_news')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="new_id" value="<?php echo e($new->id); ?>">
                    <div class="input-group text-danger">
                        <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Удалить новость</button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
        <?php if(count($new->comments) > 0): ?>
            <div class="news_comment">
            <?php $__currentLoopData = $new->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="<?php echo e(!$loop->last ? 'date_comment' : ''); ?>">
                    <h6><?php echo e($comment->surname); ?> <?php echo e($comment->name); ?></h6>
                    <p><?php echo e($comment->text); ?></p>
                    <p class="date_news"><?php echo e(date('H:i d.m.y', strtotime($comment->date))); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <a href="<?php echo e(route('new', $new->id)); ?>" class="news_other">
        <div class="news_comment">
            <p>Подробнее ></p>
        </div>
        </a>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\box\project\resources\views/welcome.blade.php ENDPATH**/ ?>