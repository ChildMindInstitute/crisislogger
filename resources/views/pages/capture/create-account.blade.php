@auth
    <script>window.location.href = '{{ \App\Providers\RouteServiceProvider::HOME }}';</script>
@endauth
@extends('layout.app')
@section('title', '')
@section('content')

    <div class="container content">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <center><h1 class="display-4">Please sign up to come back and record more</h1></center>
                <p>You can create an optional account to save your recordings and view them. Think of it as your personal diary.</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label>Email address<span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control"  value="{{old('password')}}"  aria-describedby="nameHelp" name="name" placeholder="Enter full name">
                        <span class="form-text text-muted">Your full name.</span>
                    </div>

                    <div class="form-group">
                        <label>Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" aria-describedby="passwordHelp" name="password">
                        <span class="form-text text-muted">Must be at least 8 characters.</span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Confirm Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control"  name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <label>Referral Code (if you were given one)</label>
                        <input type="text" class="form-control @error('referral_code') is-invalid @enderror" placeholder="Referral Code" value="{{old('referral_code')}}" aria-describedby="referralCodeHelp" name="referral_code">
                        <span class="form-text text-muted">Please enter the referral code if you have</span>
                        @error('referral_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ route('home') }}" class="btn btn-link">Skip</a>
                    </div>

                    <input type="hidden" value="{{ Session::get('filename') }}" name="filename" />
                </form>

                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </div>

@endsection
