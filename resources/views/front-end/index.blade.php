<html>
	<head>

		<meta name="decription" content="Welcome to Jblog" />

		<link rel="shortcut icon" href="{{ asset('img/jet.png') }}" type="image/png">

		{{--  facebook  --}}
		<meta property="fb:app_id" content="" />
		<meta property="og:site_name" content="Jblog.com" />
		<meta property="og:decription" content="Welcome to Jblog" />
		<meta property="og:title" content="JBlog" />
		<meta property="og:url" content="http://localhost:8000" />
		<meta property="og:type" content="blog" />
		<meta property="og:image" content="{{ asset('img/jet.png') }}" />

		{{--  twitter  --}}
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@jblog" />
		<meta name="twitter:title" content="JBlog" />
		<meta name="twitter:decription" content="Welcome to jblog" />
		<meta name="twitter:domain" content="http://localhost:8000" />
		<meta name="twitter:image:src" content="{{ asset('img/jet.png') }}" />
	</head>
</html>

@include('inc-front.header')
<body>
<div  class="cover-single">
<div class="logo-single-page">
<a href="index.html" class="link-home">
   <span class="title_start">TBlog</span>
</a>
</div>
@foreach($categories as $category)
<a href="{{ route('category.page',$category->slug) }}"><span class="label label-primary">{{ $category->category }}</span></a>
@endforeach
<br>
@foreach($tags as $tag)
<a href="{{ route('tag.page',$tag->slug) }}"><span class="label label-danger">{{ $tag->tag }}</span></a>
@endforeach
</div>

<section class="main">
    <div class="container-fluid container-main">
        <br>
        <br>
        @foreach($posts as $post)
        <div class="col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1 colom-main">
            @if($post->image_path)
            <img src="{{  $post->image_path }}" alt="{{$post->slug}}">
            @endif
            <article class="post-item"><a href="{{ route('show.post',$post->slug) }}" class="link-title"><h1 class="post-title">{{ $post->title }}</h1></a>
                <ul class="list-inline post-meta">
                    <li>By " {{ $post->user->name }} "</li>
                    <li>{{ $post->created_at->diffForHumans() }}</li>
                </ul>
                <p>{{ str_limit($post->excerpt,500,'...') }}</p>
                <section class="section-meta">
									<a href="{{ route('category.page',$category->slug) }}" class="a-tag">{{ $post->category->category }}</a>
									<a href="{{ route('show.post',$post->slug) }}" class="a-readmore">read more...</a>
								</section>
            </article>
        </div>
        @endforeach

    </div>
    <section class="pagination-section">
          <nav>
              <ul class="pagination">
                  <li>{{ $posts->links( ) }}</li>
              </ul>
          </nav>
          <div class="container container-pagination">
              {{ $posts->links() }}
          </div>
    </section>
</section>


@include('inc-front.footer')