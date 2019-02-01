

<?php if(Session::has('messageRNU')): ?>
    <div class="uk-alert-success u-text-center _message" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <h4><?php echo e(Session::get('messageRNU')); ?></h4>
    </div>
<?php endif; ?>


<?php if(Session::has('w_back')): ?>
    <div class="uk-alert-primary u-text-center _message" uk-alert>
        <h4> <?php echo e(Session::get('w_back')); ?>  </h4>
    </div>
<?php endif; ?>

