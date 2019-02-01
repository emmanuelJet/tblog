<?php $__env->startSection('title'); ?>
    Reset Password
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inc-back.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>

<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center">

            <?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php if(Session::get('status')): ?>
            <div class="uk-alert-success" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                    <h5><?php echo e(Session::get('status')); ?></h5>
            </div>
            <?php endif; ?>

            <h4 class="u-mb-medium">Forgot Your Password</h4>
            <form action="<?php echo e(route('password.email')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="c-field">
                    <label class="c-field__label">Email Address</label>

                    <input class="c-input u-mb-small" type="email" placeholder="Your Email" id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e($email ?? old('email')); ?>">


                </div>



                <button class="c-btn c-btn--fullwidth c-btn--info" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php echo $__env->make('inc-back.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>