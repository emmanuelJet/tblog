<div class="row u-mt-small mr-auto">
    <div class="col-md-12 col-xs-12">

        <?php if($paginator->hasPages()): ?>
            <ul class="c-pagination u-mb-medium">
                
                <?php if($paginator->onFirstPage()): ?>
                    <li><a class="c-pagination__link" href="#"><i class="feather icon-chevron-left"></i> </a></li>
                <?php else: ?>
                    <li><a class="c-pagination__link" href="<?php echo e($paginator->previousPageUrl()); ?>"><i class="feather icon-chevron-left"></i> </a></li>
                <?php endif; ?>

                
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if(is_string($element)): ?>
                        <li><a class="c-pagination__link is-active" href="#"><?php echo e($element); ?></a></li>
                    <?php endif; ?>

                    
                    <?php if(is_array($element)): ?>
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $paginator->currentPage()): ?>
                                <li><a class="c-pagination__link is-active" href="#"><?php echo e($page); ?></a></li>
                            <?php else: ?>
                                <li><a class="c-pagination__link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <?php if($paginator->hasMorePages()): ?>
                    <li><a class="c-pagination__link" href="<?php echo e($paginator->nextPageUrl()); ?>"> <i class="feather icon-chevron-right"></i> </a></li>
                <?php else: ?>
                    <li><a class="c-pagination__link" href=""> <i class="feather icon-chevron-right"></i> </a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>

    </div>


</div>