@extends('../login.header_footer') 

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
                    <form class="bg-white p-4 rounded shadow-sm">
                        
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3 mb-4">
                            <p class="lead fw-normal mr-2 mb-0">Sign up with</p>
                            <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary btn-floating mx-1 facebook-btn">
                                    <i class="fab fa-facebook"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-floating google-btn">
                                    <i class="fab fa-google"></i>
                                </button>
                            </div>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>

                       
                        <div class="mb-3">
                            <input type="text" id="form3Example1" class="form-control form-control-lg"
                                   placeholder="Enter your full name" />
                            <label class="form-label" for="form3Example1">Full Name</label>
                        </div>

                        <div class="mb-3">
                            <input type="email" id="form3Example2" class="form-control form-control-lg"
                                   placeholder="Enter a valid email address" />
                            <label class="form-label" for="form3Example2">Email Address</label>
                        </div>

                        <div class="mb-3">
                            <input type="tel" id="form3Example3" class="form-control form-control-lg"
                                   placeholder="Enter your mobile phone number" />
                            <label class="form-label" for="form3Example3">Mobile Phone Number</label>
                        </div>

                        <div class="mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                   placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <div class="mb-3">
                            <input type="password" id="form3Example5" class="form-control form-control-lg"
                                   placeholder="Confirm your password" />
                            <label class="form-label" for="form3Example5">Confirm Password</label>
                        </div>

                       
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    I agree to the <a href="#" class="link-primary">Terms & Conditions</a>
                                </label>
                            </div>
                        </div>

                        
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-lg px-5 mb-3 w-100">
                                Sign Up
                            </button>
                            <p class="small fw-bold mb-0">
                                Already have an account? 
                                <a href="/login" class="link-danger">Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection