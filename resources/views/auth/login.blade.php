@extends('app')

@section('content')
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Log In</h2>
                <p>Enter your e-mail and password to log in to the site. </p>
            </div>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group"><label for="email">Email</label>
                    <input class="form-control item" type="email" name="email"></div>
                <div class="form-group"><label for="password">Password</label>
                    <input class="form-control" type="password" name="password"></div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember_me"><label class="form-check-label" for="checkbox">Remember me</label></div>
                </div>
                @if($errors->any())
                <div class="alert alert-danger">
                    Invalid email or password. Please check again.
                </div>
                @endif
                <button class="btn btn-primary btn-block" type="submit">Log In</button>
            </form>
            <div class="block-heading">
                <p>Don't have an account yet?</p>
                <p><a href="{{route('register')}}">register now</a></p>
            </div>
        </div>
    </section>
</main>
@endsection