<?php $__env->startSection('title'); ?>
    All Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcamp'); ?>
    All Users
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="c-table-responsive@wide">
                <table class="c-table">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Image</th>
                        <th class="c-table__cell c-table__cell--head">Name</th>
                        <th class="c-table__cell c-table__cell--head">Role</th>
                        <th class="c-table__cell c-table__cell--head">Action</th>
                        <th class="c-table__cell c-table__cell--head">Delete</th>
                    </tr>
                    </thead>
                    <?php if((count($users)>0)): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                            <tr class="c-table__row">
                                <td class="c-table__cell">
                                    <div class="o-media">
                                        <div class="o-media__img u-mr-xsmall">
                                            <div class="c-avatar c-avatar--small">
                                                <img class="c-avatar__img" src="<?php echo e($user->profile->avatar); ?>" alt="Jessica Alba" width="50px" height="50px">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="c-table__cell"><?php echo e($user->name); ?> </td>
                                <td class="c-table__cell">
                                    <?php if($user->admin): ?>
                                        admin
                                    <?php else: ?>
                                        user
                                    <?php endif; ?>
                                </td>
                                <td class="c-table__cell">
                                    <?php if($user->admin == true): ?>

                                        <a class="c-badge c-badge--small c-badge--danger" href="<?php echo e(route('remove_permision',[$user->id])); ?>">Remove Permision</a>

                                    <?php else: ?>
                                        <a class="c-badge c-badge--small c-badge--success" href="<?php echo e(route('make_admin',$user->id)); ?>">Make Admin</a>
                                    <?php endif; ?>
                                </td>
                                <td class="c-table__cell">
                                    <form action="<?php echo e(route('users.destroy',[$user->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button class="c-btn c-btn--danger u-mb-xsmall" type="submit">Remove</button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                            </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tbody>
                        <td class="c-table__cell"> <?php echo e(trans('No User Yet')); ?> </td>
                        </tbody>
                    <?php endif; ?>
                </table>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inc-back.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>