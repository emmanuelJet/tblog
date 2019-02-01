<?php $__env->startSection('title'); ?>
	404
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inc-back.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>

<div class="c-404">
    <div class="c-404__content">
        <h1 class="c-404__title">404</h1>
        <p class="c-404__des">Sorry, but we couldn’t find the page you are looking for, try searching for something else</p>

        <form class="u-mb-medium">
            <div class="c-field has-icon-right">
                <input class="c-input u-mb-small" type="text" placeholder="Search for something..">
                <i class="c-field__icon feather icon-search"></i>
            </div>

            <button class="c-btn c-btn--info c-btn--fullwidth">Search</button>
        </form>

        <a class="c-404__link" href="<?php echo e(route('index_front')); ?>"><i class="feather icon-arrow-left"></i> Retrun to Homepage</a>
    </div>

    <span class="c-404__shape1"></span>
    <span class="c-404__shape2"></span>
</div>

<?php echo $__env->make('inc-back.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>