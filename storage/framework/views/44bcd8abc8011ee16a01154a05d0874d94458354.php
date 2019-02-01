<?php $__env->startSection('title'); ?>
    categories
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcamp'); ?>
    categories
    <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
    <div class="row">
        
        <div class="col-lg-6 col-sm-12 col-md-4">
            <div class="row u-mb-medium">
                <div class="col-12">

                    <?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <form action="<?php echo e(route('category.store')); ?>" method="POST" >
                        <?php echo csrf_field(); ?>

                        <div class="c-card">
                            <div class="row u-mb-medium">

                                <div class="col-lg-12 u-mb-xsmall">
                                    <div class="c-field">
                                        <label class="c-field__label" for="input1">Category </label>
                                        <input class="c-input" type="text" id="input1" placeholder="Enter Category Name" name="category">
                                    </div>
                                </div>

                                <div class="col-lg-12 u-mb-xsmall">
                                    <button class="c-btn c-btn--info u-mb-xsmall" type="submit">add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-sm-12 col-md-8 ">
            <div class="c-table-responsive@wide">
                <table class="c-table">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Category</th>
                        <th class="c-table__cell c-table__cell--head">Update</th>
                        <th class="c-table__cell c-table__cell--head">Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                     <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="c-table__row">
                        <form action="<?php echo e(route('category.update',$cat->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                        <td class="c-table__cell">
                                <input class="c-input" type="text" id="input1" value="<?php echo e($cat->category); ?>" name="category">
                        </td>
                        <td class="c-table__cell">
                            <button type="submit" class="c-btn c-btn--warning u-mb-xsmall"><span uk-icon="icon: refresh"></span></button>
                        </td>
                        </form>
                        <td class="c-table__cell">
                            <form action="<?php echo e(route('category.destroy',$cat->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button onclick="return confirm('Are you Sure to Delete ?')" type="submit" class="c-btn c-btn--danger u-mb-xsmall"><span uk-icon="icon: close"></span></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                        <?php echo e($category->links()); ?>

            </div>
        </div>

    </div>
    </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('inc-back.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>