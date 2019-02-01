<?php $__env->startSection('title'); ?>
    Sign In
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inc-back.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="o-page o-page--center">
<div class="o-page__card">
<div class="c-card c-card--center">

    <?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <h4 class="u-mb-medium">Welcome Back :)</h4>
    <form action="<?php echo e(route('login')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="c-field">
            <label class="c-field__label">Email Address</label>
            <input class="c-input u-mb-small" id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Your Email">
        </div>

        <div class="c-field">
            <label class="c-field__label">Password</label>
            <input class="c-input u-mb-small" type="password" placeholder="Your Password" name="password">
        </div>

        <button type="submit" class="c-btn c-btn--fullwidth c-btn--info">Login</button>
    </form>
		<br><br>
		<hr>
		<br>
		<h5 class="u-mb-medium">Social Sign In</h5>
		<a href="<?php echo e(route('google')); ?>" class="btn btn-danger">
			<i class="fa fa-google"></i>
			<span style="margin-left:10px">Google</span>
		</a>
		<a href="<?php echo e(route('facebook')); ?>" class="btn btn-primary">
			<i class="fa fa-facebook"></i>
			<span style="margin-left:10px">Facebook</span>
		</a>
    <br><br>
		<hr>
		<br>
    <a href="<?php echo e(route('password.request')); ?>">Forgotten account?</a> | <a href="<?php echo e(route('show_register')); ?>">Sign Up</a>

</div>
</div>
</div>

<?php echo $__env->make('inc-back.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
