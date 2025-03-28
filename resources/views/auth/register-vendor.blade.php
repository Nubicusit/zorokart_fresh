@extends('../auth.header_footer') 
@section('content')
<div class="min-vh-100 d-flex flex-column">
    
    <div class="flex-grow-1">
        <div class="container py-5">
            <div class="row justify-content-center g-4">
           
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 mb-4 mb-lg-0">
                    <img src="{{asset('img/login/login.png')}}"
                         class="img-fluid" alt="Sample image">
                </div>
             
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <form class="bg-white p-4 rounded shadow-sm" method="POST" action="{{ route('register-vendor') }}">
                        @csrf
                        
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3 mb-4">
                            <p class="lead fw-normal mr-2 mb-0">{{ __('Sign up with') }}</p>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-primary btn-floating mx-1 facebook-btn">
                                    <i class="fab fa-facebook"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-floating google-btn">
                                    <a href="{{ route('auth.google') }}">
                                        <i class="fab fa-google"></i>
                                    </a>
                                </button>
                            </div>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>
                       
                        <div class="mb-3">
                            <label class="form-label" for="name">{{ __('Full Name') }}</label>
                            <input type="text" id="name" class="form-control form-control-lg
                                @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" 
                                required autocomplete="name" autofocus placeholder="Enter your full name" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- <div class="mb-3">
                            <label class="form-label" for="phone">{{ __('Phone Number') }}</label>
                            <input type="phone" id="phone" class="form-control form-control-lg 
                                @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" 
                                required autocomplete="phone" placeholder="Enter a valid phone address" />
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->

                        <div class="mb-3">
                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                            <input type="email" id="email" class="form-control form-control-lg 
                                @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" 
                                required autocomplete="email" placeholder="Enter a valid email address" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input type="password" id="password" class="form-control form-control-lg 
                                @error('password') is-invalid @enderror" name="password" required 
                                autocomplete="new-password" placeholder="Enter password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input type="password" id="password_confirmation" class="form-control form-control-lg"
                                name="password_confirmation" required autocomplete="new-password" 
                                placeholder="Confirm your password" />
                        </div>

                       
                        <!-- <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    I agree to the <a href="#" class="link-primary">Terms & Conditions</a>
                                </label>
                            </div>
                        </div> -->

                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5 mb-3 w-100">
                            {{ __('Register') }}
                            </button>
                            <p class="small fw-bold mb-0">
                                {{ __('Already have an account?') }} 
                                <a href="{{ route('login') }}" class="link-danger">{{ __('Login') }}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection