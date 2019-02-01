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
	<?php echo $__env->make('includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
				<section class="row new-post">
					<div class="col-md-6 col-md-offset-3">
						<header><h3>What do you want to say ? </h3></header>
						<form action="<?php echo e(route('comment.create')); ?>" method="post">
							<div class="form-group">
								<textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Comment.."></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Create Comment</button>
							<input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
						</form>
					</div>
				</section>
				<section class="row">
					<div class="col-md-6 col-md-offset-3">
						<header><h3>What other people say ........ </h3></header>
						<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<article class="comment">
							<p><?php echo e($comment->body); ?></p>
							<div class="info">
								Commented by <?php echo e($comment->user->name); ?> on <?php echo e($comment->created_at->diffForHumans()); ?>.
							</div>
							<div class="interaction">
								<a href="">Like</a> |
								<a href="">Dislike</a> 
								<?php if(Auth::user() == $comment->user): ?>
									|
									<a href="#" class="edit" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo e($comment->id); ?>">Edit</a> |
									<a href="<?php echo e(route('comment.delete' , ['comment_id' => $comment->id])); ?>">Delete</a>
								<?php endif; ?>				
							</div>
							</article>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</div>
				</section>
				
				<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="modal fade bs-example-modal-sm<?php echo e($comment->id); ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Edit Comment</h4>
							</div>
							
							<form action="<?php echo e(route('comment.update',$comment->id)); ?>" method="post">
							<div class="modal-body">
								<label for="post-body">Edit the Comment</label>
								<textarea class="form-control" name="body" id="post-body" rows="5"><?php echo e($comment->body); ?></textarea>
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" id="modal-save">Save changes</button>
								<input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
							</div>
							</form>
						</div>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<section class="pagination-section">
    <div class="container container-pagination">
        <?php if($next): ?>
        <a href="<?php echo e(route('show.post',$next->slug)); ?>" class="next-page">Newest post</a>
        <?php endif; ?>

        <?php if($previous): ?>
        <a href="<?php echo e(route('show.post',$previous->slug)); ?>" class="older-page">Older post</a>
        <?php endif; ?>

    </div>
    </a>
</section>
<?php echo $__env->make('inc-front.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
