<?php echo $__env->make('inc-back.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
<div class="o-page">

    <?php echo $__env->make('inc-back.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <main class="o-page__content">

        <?php echo $__env->make('inc-back.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="container">

            <?php echo $__env->yieldContent('content'); ?>

        </div>

    </main>
</div>




<?php echo $__env->make('inc-back.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>