<html>
	<head>

		<meta name="decription" content="Welcome to Jblog" />

		<link rel="shortcut icon" href="<?php echo e(asset('img/jet.png')); ?>" type="image/png">

		
		<meta property="fb:app_id" content="" />
		<meta property="og:site_name" content="Jblog.com" />
		<meta property="og:decription" content="Welcome to Jblog" />
		<meta property="og:title" content="JBlog" />
		<meta property="og:url" content="http://localhost:8000" />
		<meta property="og:type" content="blog" />
		<meta property="og:image" content="<?php echo e(asset('img/jet.png')); ?>" />

		
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@jblog" />
		<meta name="twitter:title" content="JBlog" />
		<meta name="twitter:decription" content="Welcome to jblog" />
		<meta name="twitter:domain" content="http://localhost:8000" />
		<meta name="twitter:image:src" content="<?php echo e(asset('img/jet.png')); ?>" />
	</head>
</html>

<?php echo $__env->make('inc-front.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
<div  class="cover-single">
<div class="logo-single-page">
<a href="index.html" class="link-home">
   <span class="title_start">TBlog</span>
</a>
</div>
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e(route('category.page',$category->slug)); ?>"><span class="label label-primary"><?php echo e($category->category); ?></span></a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<br>
<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e(route('tag.page',$tag->slug)); ?>"><span class="label label-danger"><?php echo e($tag->tag); ?></span></a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<section class="main">
    <div class="container-fluid container-main">
        <br>
        <br>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1 colom-main">
            <?php if($post->image_path): ?>
            <img src="<?php echo e($post->image_path); ?>" alt="<?php echo e($post->slug); ?>">
            <?php endif; ?>
            <article class="post-item"><a href="<?php echo e(route('show.post',$post->slug)); ?>" class="link-title"><h1 class="post-title"><?php echo e($post->title); ?></h1></a>
                <ul class="list-inline post-meta">
                    <li>By " <?php echo e($post->user->name); ?> "</li>
                    <li><?php echo e($post->created_at->diffForHumans()); ?></li>
                </ul>
                <p><?php echo e(str_limit($post->excerpt,500,'...')); ?></p>
                <section class="section-meta">
									<a href="<?php echo e(route('category.page',$category->slug)); ?>" class="a-tag"><?php echo e($post->category->category); ?></a>
									<a href="<?php echo e(route('show.post',$post->slug)); ?>" class="a-readmore">read more...</a>
								</section>
            </article>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <section class="pagination-section">
          <nav>
              <ul class="pagination">
                  <li><?php echo e($posts->links( )); ?></li>
              </ul>
          </nav>
          <div class="container container-pagination">
              <?php echo e($posts->links()); ?>

          </div>
    </section>
</section>


<?php echo $__env->make('inc-front.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>