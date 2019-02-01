<?php $__env->startSection('title'); ?>
    all posts
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcamp'); ?>
    all posts
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="c-table-responsive@wide">
                <table class="c-table">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Image</th>
                        <th class="c-table__cell c-table__cell--head">Title</th>
                        <th class="c-table__cell c-table__cell--head">Date</th>
                        <th class="c-table__cell c-table__cell--head">Edit</th>
                        <th class="c-table__cell c-table__cell--head">Delete</th>
                    </tr>
                    </thead>
                   <?php if((count($posts)>0)): ?>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                        <tr class="c-table__row">
                            <td class="c-table__cell">
                                <div class="o-media">
                                    <div class="o-media__img u-mr-xsmall">
                                        <div class="c-avatar c-avatar--small">
                                            <img class="c-avatar__img" src="<?php echo e($post->image_path); ?>" alt="Jessica Alba" width="50px" height="50px">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="c-table__cell"><?php echo e($post->title); ?> </td>
                            <td class="c-table__cell"><?php echo e($post->created_at->diffForHumans()); ?></td>
                            <td class="c-table__cell">
                                <a class="c-btn c-btn--warning u-mb-xsmall" href="<?php echo e(route('post.edit',[$post->id])); ?>">Edit</a>
                            </td>
                            <td class="c-table__cell">
                                <form action="<?php echo e(route('post.destroy',[$post->id])); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button class="c-btn c-btn--danger u-mb-xsmall" type="submit">Trash</button>
                                </form>
                            </td>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tbody>
                        <td class="c-table__cell"> <?php echo e(trans('No posts yet')); ?> </td>
                        </tbody>
                    <?php endif; ?>
                </table>
                <?php echo e($posts->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inc-back.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>