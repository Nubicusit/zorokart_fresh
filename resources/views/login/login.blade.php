@extends('../login.header_footer') 

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mb-4" style="padding: 30px; background: rgb(255,196,101); background: linear-gradient(355deg, rgba(255,196,101,1) 6%, rgba(252,234,205,1) 90%); border-radius: 15px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);"> 
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <img src="" alt="Logo" class="mb-4" style="max-width: 150px;">
                            <h3 class="font-weight-bold text-dark">Sign In</h3>
                        </div>

                        <form>
                            <div class="mb-3">
                                <label for="emailOrPhone" class="form-label font-weight-bold text-dark">Email or Mobile Phone Number</label>
                                <input type="text" class="form-control" id="emailOrPhone" required style="border-radius: 10px;">
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label font-weight-bold text-dark">Password</label>
                                <input type="password" class="form-control" id="password" required style="border-radius: 10px;">
                                <span class="position-absolute" style="top: 70%; right: 15px; transform: translateY(-50%); cursor: pointer;" id="togglePassword">
                                    <i class="fas fa-eye" id="eyeIcon" style="color: #6c757d;"></i>
                                </span>
                            </div>
                            <button type="submit" class="btn w-100 py-2" style="background-color: #ff9800; color: white; border-radius: 10px;">Continue</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="#" class="link text-decoration-none text-primary d-block">Forgot Password?</a>
                            <a href="#" class="link text-decoration-none text-primary d-block">Create New Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
