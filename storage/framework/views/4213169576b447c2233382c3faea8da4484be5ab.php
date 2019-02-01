<html>
	<head>
		<title>JBlog | <?php echo e($post->title); ?></title>

		<link rel="shortcut icon" href="<?php echo e($post->image_path); ?>" type="image/png">
		<meta name="decription" content="<?php echo e(str_limit($post->excerpt,250,'...')); ?>" />

		
		<meta property="fb:app_id" content="" />
		<meta property="og:site_name" content="Jblog.com" />
		<meta property="og:decription" content="<?php echo e(str_limit($post->excerpt,250,'...')); ?>" />
		<meta property="og:title" content="<?php echo e($post->title); ?>" />
		<meta property="og:url" content="<?php echo e('http://localhost:8000/post/'.$post->slug); ?>" />
		<meta property="og:type" content="blog" />
		<meta property="og:image" content="<?php echo e('http://localhost:8000'.$post->image_path); ?>" />

		
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@jblog" />
		<meta name="twitter:title" content="<?php echo e($post->title); ?>" />
		<meta name="twitter:decription" content="<?php echo e(str_limit($post->excerpt,250,'...')); ?>" />
		<meta name="twitter:domain" content="<?php echo e('http://localhost:8000/post/'.$post->slug); ?>" />
		<meta name="twitter:image:src" content="<?php echo e('http://localhost:8000'.$post->image_path); ?>" />
	</head>
</html>

<?php echo $__env->make('inc-front.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section class="main">
    <div class="container-fluid container-main">
        <div class="col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1 colom-main">
            <article class="full-post">
                <a href="<?php echo e(route('index_front')); ?>">
                    <p class="info-pagination label label-danger">
                        <span style="font-size: 20px">< </span>  Back</p>
                </a>
                <p class="info-pagination label label-info"> <span style="font-size: 20px"></span><?php echo e($post->title); ?></p>
                <img src="<?php echo e($post->image_path); ?>" alt="<?php echo e($post->slug); ?>">

                <?php echo $post->content; ?>

            </article>
        </div>
    </div>
</section>
<section class="pagination-section">
    <div class="container container-pagination">
        <?php if($next): ?>
        <a href="<?php echo e(route('show.post',$next->slug)); ?>" class="next-page">newest post</a>
        <?php endif; ?>

        <?php if($previous): ?>
        <a href="<?php echo e(route('show.post',$previous->slug)); ?>" class="older-page">older post</a>
        <?php endif; ?>

    </div>
    </a>
</section>
<?php echo $__env->make('inc-front.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
