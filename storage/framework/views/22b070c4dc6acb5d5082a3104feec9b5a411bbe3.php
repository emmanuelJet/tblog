<?php $__env->startSection('title'); ?>
    New Post
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcamp'); ?>
    New post
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

   <div class="container">
       <div class="row">
           <div class="col-12">
               <div class="row u-mb-medium">
                   <div class="col-12">
                       <?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                       <form action="<?php echo e(route('post.store')); ?>" method="post" enctype="multipart/form-data">
                           <?php echo csrf_field(); ?>
                       <div class="c-card">
                           <div class="row u-mb-medium">
                               <div class="col-lg-8 u-mb-xsmall">
                                   <label for="">Title : </label>
                                   <br><br>
                                   <div class="c-field">
                                       <input class="c-input" type="text" id="input1" placeholder="Enter post title" name="title" value="<?php echo e(old('title')); ?>">
                                   </div>
                               </div>
                               <div class="col-lg-4 u-mb-xsmall">
                                   <label for="">Category : </label>
                                   <br><br>
                                   <div class="c-select">
                                       <select class="c-select__input" name="id_category">
                                           <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <option value="<?php echo e($category->id); ?>"><?php echo e($category->category); ?></option>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </select>
                                   </div>
                               </div>
                           </div>
                                    <div class="row">
                                    <div class="col-3">
                                        <div class="c-field">
                                            <label for="">Image : </label>
                                            <input type="file" name="imagepath" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                            <label for="">Tags : </label>

                                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label><input class="uk-checkbox" type="checkbox" name="tag[]" value="<?php echo e($tag->id); ?>"> <?php echo e($tag->tag); ?> </label>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    </div><br>
                           <div class="row">
                               <div class="c-field">
                                   <div class="col-lg-12 u-mb-xsmall">
                                       <label for="">Content : </label>
                                       <textarea name="content" id="summernote" cols="50" rows="50" class="uk-textarea"><?php echo e(old('content')); ?></textarea>
                                   </div>
                                   <div class="col-lg-12 u-mb-xsmall">
                                       <label for="">excerpt : </label>
                                       <textarea name="excerpt" id="" cols="10" rows="5" class="uk-textarea"></textarea>
                                   </div>
                                   <div class="c-field">
                                       <div class="col-lg-12 u-mb-xsmall">
                                       <button class="c-btn c-btn--secondary u-mb-xsmall" type="submit">post</button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('inc-back.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>