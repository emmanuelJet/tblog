<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toast.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/uikit.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/uikit-icons.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/neat.min.js?v=1.0')); ?>"></script>
<script>

    setTimeout(function(){$('._message').fadeOut();}, 2000);

    <?php if(Session::has('message')): ?>
        var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
        switch(type){
        case 'info':
        toastr.info("<?php echo e(Session::get('message')); ?>");
        break;
        case 'warning':
        toastr.warning("<?php echo e(Session::get('message')); ?>");
        break;
        case 'success':
        toastr.success("<?php echo e(Session::get('message')); ?>");
        break;
        case 'error':
        toastr.error("<?php echo e(Session::get('message')); ?>");
        break;
        }
    <?php endif; ?>


</script>
    <script src="<?php echo e(asset('js/summernote.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

    <script>
        var content = $("#summernote").val()

        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 150,
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
            });
        });
    </script>
   </body>
</html>
