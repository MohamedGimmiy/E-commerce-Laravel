@extends('layouts.master')
@section('title', 'login')
@section('content')
<section class="login-page">
    <div class="login-form-box">
        <div class="login-title">Login</div>
        <div class="login-form">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="John@gmail.com" value="{{old('email')}}" class="@error('email') has-error @enderror">
                    @error('email')
                    <span class="field-error">{{$message}}</span>
                @enderror
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="********" class="@error('password') has-error @enderror">
                    @error('password')
                    <span class="field-error">{{$message}}</span>
                @enderror
                </div>
                <div class="field">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>

                <a href="{{route('register')}}">New User? Register Now...</a>
            </form>
        </div>
    </div>
</section>
@endsection
