@section('title')
    Sign In
@endsection

@include('inc-back.header')

<div class="o-page o-page--center">
<div class="o-page__card">
<div class="c-card c-card--center">

    @include('includes.errors')

    <h4 class="u-mb-medium">Welcome Back :)</h4>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="c-field">
            <label class="c-field__label">Email Address</label>
            <input class="c-input u-mb-small" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Your Email">
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
		<a href="{{ route('google') }}" class="btn btn-danger">
			<i class="fa fa-google"></i>
			<span style="margin-left:10px">Google</span>
		</a>
		<a href="{{ route('facebook') }}" class="btn btn-primary">
			<i class="fa fa-facebook"></i>
			<span style="margin-left:10px">Facebook</span>
		</a>
    <br><br>
		<hr>
		<br>
    <a href="{{ route('password.request') }}">Forgotten account?</a> | <a href="{{ route('show_register') }}">Sign Up</a>

</div>
</div>
</div>

@include('inc-back.footer')
