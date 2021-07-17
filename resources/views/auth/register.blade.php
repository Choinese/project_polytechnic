@extends('app')

@section('content')

<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <br><br>
                <h2 class="text-info">Registration</h2>
                <p>To register, please enter your personal information below.</p>
            </div>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name<span class="text-danger">*</span></label>
                    <input class="form-control item {{$errors->any() ? ($errors->has('name') ? 'is-invalid' : 'is-valid') : ''}}" type="text" name="name" value="{{old('name')}}" placeholder="Your name">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input class="form-control item {{$errors->any() ? ($errors->has('email') ? 'is-invalid' : 'is-valid') : ''}}" type="email" name="email" value="{{old('email')}}" placeholder="Your email">
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password<span class="text-danger">*</span></label>
                    <input class="form-control item {{$errors->has('password') ? 'is-invalid' : ''}}" type="password" name="password" placeholder="Password" >
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-5">
                    <label for="password_confirmation">Confirm Password<span class="text-danger">*</span></label>
                    <input class="form-control item {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" type="password" name="password_confirmation" placeholder="Confirm password">
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
            </form>

            <div class="block-heading">
                <p>Already have an account?</p>
                <p><a href="{{route('login')}}">login</a></p>
            </div>

        </div>
    </section>
</main>
@endcontent