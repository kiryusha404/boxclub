<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card block_news" style="width: 90%;">
            <img class="card-img-top" src="<?php echo e(Storage::url($new->img)); ?>" alt="Card image cap">
            <div class="card-body pb-0">
                <h5 class="card-title"><?php echo e($new->name); ?></h5>
                <p class="card-text"><?php echo e($new->text); ?></p>
                <p class="card-text date_news"><?php echo e(date('H:i d.m.y', strtotime($new->date))); ?></p>
            </div>

            <?php if(Auth()->User() && Auth()->User()->role_id > 1): ?>

                <div class="news_comment position-absolute top-0 end-0" style="margin-bottom: 15px;">
                    <form action="<?php echo e(route('del_news')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="new_id" value="<?php echo e($new->id); ?>">
                        <div class="input-group text-danger">
                            <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Удалить новость</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>

            <?php if(auth()->check()): ?>
            <div class="comment_feedback " >
                <form action="<?php echo e(route('add_comment')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <input type="text" name="comment" class="form-control rounded" placeholder="Ваш комментарий.." required aria-label="Search" aria-describedby="search-addon" />
                        <input type="hidden" name="new_id" value="<?php echo e($new->id); ?>">
                        <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Отправить</button>
                    </div>
                </form>
            </div>
            <?php endif; ?>

            <?php if(count($new->comments) > 0): ?>
                <div class="news_comment">
                    <?php $__currentLoopData = $new->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="<?php echo e(!$loop->last ? 'date_comment' : ''); ?> position-relative" >
                            <?php if(Auth()->User() && Auth()->User()->id == $comment->user_id): ?>
                            <div class=" position-absolute top-0 end-0">
                                <form action="<?php echo e(route('del_comment')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($comment->comment_id); ?>">
                                    <div class="input-group text-danger">
                                        <button type="submit" class="btn btn-link btn-sm" data-mdb-ripple-init style="padding: 0px;">Удалить</button>
                                    </div>
                                </form>
                            </div>
                            <?php elseif(Auth()->User() && Auth()->User()->role_id > 1): ?>
                                <div class=" position-absolute top-0 end-0">
                                    <form action="<?php echo e(route('del_comment_moder')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($comment->comment_id); ?>">
                                        <div class="input-group text-danger">
                                            <button type="submit" class="btn btn-link btn-sm" data-mdb-ripple-init style="padding: 0px;">Удалить</button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>

                            <h6 ><?php echo e($comment->surname); ?> <?php echo e($comment->name); ?></h6>
                            <p><?php echo e($comment->text); ?></p>
                            <p class="date_news"><?php echo e(date('H:i d.m.y', strtotime($comment->date))); ?></p>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\box\project\resources\views/new.blade.php ENDPATH**/ ?>