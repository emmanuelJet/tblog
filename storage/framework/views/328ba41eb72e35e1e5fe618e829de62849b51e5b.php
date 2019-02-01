<html>
	<head>

		<meta name="decription" content="Welcome to Jblog search" />
		
		<link rel="shortcut icon" href="<?php echo e(asset('img/jet.png')); ?>" type="image/png">

		
		<meta property="fb:app_id" content="" />
		<meta property="og:site_name" content="Jblog.com" />
		<meta property="og:decription" content="Welcome to Jblog search" />
		<meta property="og:title" content="JBlog search" />
		<meta property="og:url" content="http://localhost:8000/search" />
		<meta property="og:type" content="blog" />
		<meta property="og:image" content="<?php echo e(asset('img/jet.png')); ?>" />

		
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@jblog" />
		<meta name="twitter:title" content="JBlog" />
		<meta name="twitter:decription" content="Welcome to jblog search" />
		<meta name="twitter:domain" content="http://localhost:8000/search" />
		<meta name="twitter:image:src" content="<?php echo e(asset('img/jet.png')); ?>" />
	</head>
</html>

<?php $__env->startSection('title'); ?>
	Search
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inc-front.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
<div  class="cover-single">
    <div class="logo-single-page">
    </div>
    <h3 style="color: #fff">Search For : <?php echo e($query); ?></h3>
</div>

<section class="main">
    <div class="container-fluid container-main">
        <br>
        <br>
        <br>

        <?php if(count($posts)>0): ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1 colom-main">

                    <article class="post-item"><a href="<?php echo e(route('show.post',$post->slug)); ?>" class="link-title"><h1 class="post-title"><?php echo e($post->title); ?></h1></a>
                        <ul class="list-inline post-meta">
                            <li>By " <?php echo e($post->user->name); ?> "</li>
                            <li><?php echo e($post->created_at->diffForHumans()); ?></li>
                        </ul>
                        <p><?php echo e(str_limit($post->excerpt,500,'...')); ?></p>
                        <section class="section-meta"><a href="<?php echo e($post->category->category); ?>" class="a-tag"><?php echo e($post->category->category); ?></a><a href="<?php echo e(route('show.post',$post->slug)); ?>" class="a-readmore">read more...</a></section>
                    </article>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <h1 class="text-center" style="margin-bottom: 25px"> Sorry No Result Like : <?php echo e($query); ?></h1>
        <?php endif; ?>

    </div>

</section>


<?php echo $__env->make('inc-front.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>