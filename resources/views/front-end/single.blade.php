<html>
	<head>
		<title>JBlog | {{ $post->title }}</title>

		<link rel="shortcut icon" href="{{ $post->image_path }}" type="image/png">
		<meta name="decription" content="{{ str_limit($post->excerpt,250,'...') }}" />

		{{--  facebook  --}}
		<meta property="fb:app_id" content="" />
		<meta property="og:site_name" content="Jblog.com" />
		<meta property="og:decription" content="{{ str_limit($post->excerpt,250,'...') }}" />
		<meta property="og:title" content="{{ $post->title }}" />
		<meta property="og:url" content="{{ 'http://localhost:8000/post/'.$post->slug }}" />
		<meta property="og:type" content="blog" />
		<meta property="og:image" content="{{ 'http://localhost:8000'.$post->image_path }}" />

		{{--  twitter  --}}
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@jblog" />
		<meta name="twitter:title" content="{{ $post->title }}" />
		<meta name="twitter:decription" content="{{ str_limit($post->excerpt,250,'...') }}" />
		<meta name="twitter:domain" content="{{ 'http://localhost:8000/post/'.$post->slug }}" />
		<meta name="twitter:image:src" content="{{ 'http://localhost:8000'.$post->image_path }}" />
	</head>
</html>

@include('inc-front.header')

<section class="main">
	@include('includes.messages')
    <div class="container-fluid container-main">
        <div class="col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1 colom-main">
            <article class="full-post">
                <a href="{{ route('index_front') }}">
                    <p class="info-pagination label label-danger">
                        <span style="font-size: 20px">< </span>  Back</p>
                </a>
                <p class="info-pagination label label-info"> <span style="font-size: 20px"></span>{{ $post->title }}</p>
                <img src="{{  $post->image_path }}" alt="{{$post->slug}}">

                {!!  $post->content !!}
            </article>
        </div>
				<section class="row new-post">
					<div class="col-md-6 col-md-offset-3">
						<header><h3>What do you want to say ? </h3></header>
						<form action="{{ route('comment.create') }}" method="post">
							<div class="form-group">
								<textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Comment.."></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Create Comment</button>
							<input type="hidden" name="_token" value="{{Session::token()}}">
						</form>
					</div>
				</section>
				<section class="row">
					<div class="col-md-6 col-md-offset-3">
						<header><h3>What other people say ........ </h3></header>
						@foreach ($comments as $comment)
							<article class="comment">
							<p>{{$comment->body}}</p>
							<div class="info">
								Commented by {{$comment->user->name}} on {{ $comment->created_at->diffForHumans() }}.
							</div>
							<div class="interaction">
								<a href="">Like</a> |
								<a href="">Dislike</a> 
								@if(Auth::user() == $comment->user)
									|
									<a href="#" class="edit" data-toggle="modal" data-target=".bs-example-modal-sm{{$comment->id}}">Edit</a> |
									<a href="{{ route('comment.delete' , ['comment_id' => $comment->id]) }}">Delete</a>
								@endif				
							</div>
							</article>
						@endforeach
						
					</div>
				</section>
				
				@foreach ($comments as $comment)
				<div class="modal fade bs-example-modal-sm{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Edit Comment</h4>
							</div>
							
							<form action="{{ route('comment.update',$comment->id) }}" method="post">
							<div class="modal-body">
								<label for="post-body">Edit the Comment</label>
								<textarea class="form-control" name="body" id="post-body" rows="5">{{$comment->body}}</textarea>
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" id="modal-save">Save changes</button>
								<input type="hidden" name="_token" value="{{Session::token()}}">
							</div>
							</form>
						</div>
						</div>
					</div>
				</div>
				@endforeach
    </div>
</section>
<section class="pagination-section">
    <div class="container container-pagination">
        @if($next)
        <a href="{{ route('show.post',$next->slug) }}" class="next-page">Newest post</a>
        @endif

        @if($previous)
        <a href="{{ route('show.post',$previous->slug) }}" class="older-page">Older post</a>
        @endif

    </div>
    </a>
</section>
@include('inc-front.footer')
