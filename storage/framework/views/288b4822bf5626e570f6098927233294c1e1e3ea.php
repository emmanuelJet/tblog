<?php $__env->startSection('title'); ?>
    Sign Up
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inc-back.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center" style="margin-top:-60px">

            <?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <h4 class="u-mb-medium">Sing Up to Get Started</h4>
            <form action="<?php echo e(route('register_new_user')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="c-field">
                    <label class="c-field__label">Name</label>
                    <input class="c-input u-mb-small" type="text" placeholder="Your Name" name="name" value="<?php echo e(old('name')); ?>">
                </div>

                <div class="c-field">
                    <label class="c-field__label">Email Address</label>
                    <input class="c-input u-mb-small" type="email" placeholder="Your Email" name="email" value="<?php echo e(old('email')); ?>">
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label">Password</label>
                    <input class="c-input" type="password" placeholder="Your Password" name="password" >
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label">Confirm Password</label>
                    <input class="c-input" type="password" placeholder="Rewrite Your Password" name="password_confirmation">
                </div>

                <button class="c-btn c-btn--fullwidth c-btn--info" type="submit">Register</button>
            </form>
						<br>
						<h5 class="u-mb-medium">Social Sign Up</h5>
						<a href="<?php echo e(route('google')); ?>" class="btn btn-danger">
							<i class="fa fa-google"></i>
							<span style="margin-left:10px">Google</span>
						</a>
						<a href="<?php echo e(route('facebook')); ?>" class="btn btn-primary">
							<i class="fa fa-facebook"></i>
							<span style="margin-left:10px">Facebook</span>
						</a>
						<br>
            <a href="<?php echo e(route('password.request')); ?>">Forgotten account?</a> | <a href="<?php echo e(route('login')); ?>">Sign In</a>

        </div>
    </div>
</div>

<?php echo $__env->make('inc-back.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>