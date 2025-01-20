@extends('../login.header_footer') 

@section('content')
<div class="min-vh-100 d-flex flex-column">
    <div class="flex-grow-1">
        <div class="container py-5">
            <div class="row justify-content-center align-items-center g-4">
              
                <div class="col-12 col-sm-12 col-md-9 col-lg-6 col-xl-5">
                    <img src="{{asset('img/login/login.png')}}"
                         class="img-fluid" alt="Sample image">
                </div>
                
               
                <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form class="bg-white p-4 rounded shadow-sm">
                        
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3 mb-4">
                            <p class="lead fw-normal mr-2 mb-0">Sign in with</p>
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

                       
                        <div class="mb-4">
                            <input type="email" id="form3Example3" class="form-control form-control-lg"
                                   placeholder="Enter a valid email address" />
                            <label class="form-label" for="form3Example3">Email address</label>
                        </div>

                       
                        <div class="mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                   placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body text-decoration-none">Forgot password?</a>
                        </div>

                       
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-lg px-5 mb-3 w-100">
                                Login
                            </button>
                            <p class="text-center small fw-bold mb-0">
                                Don't have an account? 
                                <a href="/signup" class="link-danger">Register</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection