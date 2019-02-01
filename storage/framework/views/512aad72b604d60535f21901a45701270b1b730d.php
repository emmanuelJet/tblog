<?php $__env->startSection('title'); ?>
    Home
    <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php echo $__env->make('includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php if(auth()->user()->admin): ?>
<div class="container text-center">
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="c-card">
                <span class="c-icon c-icon--info u-mb-small">
                  <i class="feather icon-edit"></i>
                </span>

                <h3 class="c-text--subtitle">Posts</h3>
                <h1><?php echo e($posts_number); ?></h1>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="c-card">
                <span class="c-icon c-icon--danger u-mb-small">
                  <i class="feather icon-trash"></i>
                </span>

                <h3 class="c-text--subtitle">Trashed posts</h3>
                <h1><?php echo e($trashed_posts); ?></h1>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="c-card">
                <span class="c-icon c-icon--success u-mb-small">
                  <i class="feather icon-book"></i>
                </span>

                <h3 class="c-text--subtitle">Categories</h3>
                <h1><?php echo e($categories_number); ?></h1>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="c-card">
                <span class="c-icon c-icon--secondary u-mb-small">
                  <i class="feather icon-tag"></i>
                </span>

                <h3 class="c-text--subtitle">Tags</h3>
                <h1><?php echo e($tags_number); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="c-card">
                <span class="c-icon c-icon--warning u-mb-small">
                  <i class="feather icon-users"></i>
                </span>

            <h3 class="c-text--subtitle">Users</h3>
            <h1><?php echo e($users_number); ?></h1>
        </div>
    </div>
    </div>

</div>
<?php endif; ?>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('inc-back.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>