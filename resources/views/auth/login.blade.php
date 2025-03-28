@extends('includes.inc') 

@section('content')
<style>

 /* Custom CSS for Auth Pages */
.auth-container {
    background-color: #ffffff; /* White background */
}


.auth-form {
    border: 1px solid #e0e0e0;
    background-color: #ffffff;
}

.auth-input {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 12px;
    font-size: 16px;
}

.auth-input:focus {
    border-color: #ff5b00;
    box-shadow: 0 0 5px rgba(255, 91, 0, 0.5);
}

.auth-btn {
    background-color: #ff5b00;
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 8px;
    padding: 12px;
    font-size: 18px;
}

.auth-btn:hover {
    background-color: #e64a19; /* Darker shade for hover */
}

.auth-social-btn {
    background-color: #ff5b00;
    border: none;
    color: white;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.auth-social-btn:hover {
    background-color: #fff3e0; 
    color: #ff5b00;
}

.auth-social-btn .fa-google {
    color: white !important; /* Force white color */
}

.auth-social-btn .fa-google:hover {
    background-color: #fff3e0 !important; 
    color: #ff5b00 !important; 
}


.auth-link {
    color: #ff5b00;
    text-decoration: none;
}

.auth-link:hover {
    color: #e64a19; /* Darker shade for hover */
}

.auth-checkbox {
    accent-color: #ff5b00; /* Custom checkbox color */
}

.divider {
    color: #000000; /* Black color for divider text */
}

   
</style>
<div class="min-vh-100 d-flex flex-column auth-container">
    <div class="flex-grow-1">
        <div class="container py-5">
            <div class="row justify-content-center align-items-center g-4">
                <!-- Login Section -->
                <div class="col-12 col-sm-12 col-md-9 col-lg-6 col-xl-5">
                    <img src="{{asset('img/login/login.png')}}" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form class="bg-white p-4 rounded shadow-sm auth-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3 mb-4">
                            <p class="lead fw-normal mr-2 mb-0">{{ __('Sign in with') }}</p>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-floating mx-1 auth-social-btn">
                                    <i class="fab fa-facebook"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-floating google-btn auth-social-btn">
                                    <a href="{{ route('auth.google') }}">
                                        <i class="fab fa-google"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                        <div class="divider d-flex align-items-center justify-content-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                            <input type="email" id="email" class="form-control form-control-lg auth-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter a valid email address" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input type="password" id="password" class="form-control form-control-lg auth-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input me-2 auth-checkbox" type="checkbox" name="remember_me" id="remember_me" {{ old('remember_me') ? 'checked' : '' }}/>
                                <label class="form-check-label" for="remember_me">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-body text-decoration-none auth-link">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg px-5 mb-3 w-100 auth-btn">
                                {{ __('Login') }}
                            </button>
                            <p class="text-center small fw-bold mb-0">
                                {{ __('Register new account? ') }}
                                <a href="{{ route('register') }}" class="link-danger auth-link">{{ __('Register') }}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
