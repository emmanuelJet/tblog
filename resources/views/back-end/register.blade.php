@section('title')
    Sign Up
@endsection

@include('inc-back.header')

<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center" style="margin-top:-60px">

            @include('includes.errors')

            <h4 class="u-mb-medium">Sing Up to Get Started</h4>
            <form action="{{ route('register_new_user') }}" method="POST">
                @csrf
                <div class="c-field">
                    <label class="c-field__label">Name</label>
                    <input class="c-input u-mb-small" type="text" placeholder="Your Name" name="name" value="{{ old('name') }}">
                </div>

                <div class="c-field">
                    <label class="c-field__label">Email Address</label>
                    <input class="c-input u-mb-small" type="email" placeholder="Your Email" name="email" value="{{ old('email') }}">
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label">Password</label>
                    <input class="c-input" type="password" placeholder="Your Password" name="password" >
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label">Confirm Password</label>
                    <input class="c-input" type="password" placeholder="Rewrite Your Password" name="password_confirmation">
                </div>

                <button class="c-btn c-btn--fullwidth c-btn--info" type="submit">Register</button>
            </form>
						<br>
						<h5 class="u-mb-medium">Social Sign Up</h5>
						<a href="{{ route('google') }}" class="btn btn-danger">
							<i class="fa fa-google"></i>
							<span style="margin-left:10px">Google</span>
						</a>
						<a href="{{ route('facebook') }}" class="btn btn-primary">
							<i class="fa fa-facebook"></i>
							<span style="margin-left:10px">Facebook</span>
						</a>
						<br>
            <a href="{{ route('password.request') }}">Forgotten account?</a> | <a href="{{ route('login') }}">Sign In</a>

        </div>
    </div>
</div>

@include('inc-back.footer')