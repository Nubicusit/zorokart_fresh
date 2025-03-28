@extends('includes.inc')
@section('content')
    <style>
        /* General Styles */
        .profile-container {
            padding: 15px;
            max-width: 1600px;
            margin: 0 auto;
        }

        /* Sidebar Styles */
        .sidebar-account {
            background-color: #fff;
            border-right: 1px solid #e0e0e0;
            padding: 20px;
        }

        .sidebar-account a {
            color: #b4b4b4;
            font-weight: 600;
            display: block;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .sidebar-account a:hover,
        .sidebar-account .active {
            background-color: #ff5b00;
            color: #fff;
        }

        /* Mobile Menu Styles */
        .mobile-menu {
            padding: 15px;
            background-color: #fff;
        }

        .mobile-menu-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-top: 20px;
        }

        .menu-button {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            color: #b4b4b4;
            transition: all 0.3s ease;
        }

        .menu-button i {
            font-size: 20px;
            margin-bottom: 5px;
            color: #ff5b00;
            text-decoration: none;
        }

        .menu-button span {
            font-size: 12px;
            font-weight: 600;
        }

        .menu-button:hover,
        .menu-button.active {
            background-color: #ff5b00;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .menu-button:hover i,
        .menu-button.active i {
            color: #fff;
        }

        .profile-info {
            display: flex;
            align-items: center;
            padding: 15px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .profile-info img {
            border-radius: 50%;
            margin-right: 15px;
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        /* Form Card Styles */
        .custom-form-card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .custom-section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .custom-edit-link {
            color: #ff5b00;
            text-decoration: none;
        }

        .custom-edit-link:hover {
            text-decoration: underline;
        }

        .custom-faq-item {
            margin-bottom: 20px;
        }

        .custom-edit-form-container {
            position: sticky;
            top: 20px;
        }

        .custom-card {
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .custom-card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        /* Modal Styles */
        .custom-modal-content {
            margin-top: 100px;
        }

        .custom-modal-header {
            background-color: white;
            color: #ff5b00;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .custom-modal-header .btn-close {
            filter: invert(1);
        }

        .custom-modal-body {
            padding: 20px;
        }

        .custom-form-group {
            margin-bottom: 1rem;
        }

        .custom-form-label {
            font-weight: 600;
            color: #343a40;
            margin-bottom: 0.5rem;
            display: block;
        }

        .custom-form-control {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        .custom-form-control:focus {
            border-color: #ff5b00;
            outline: none;
            box-shadow: 0 0 0 2px rgba(255, 91, 0, 0.2);
        }

        .custom-btn-primary {
            background-color: #ff5b00;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            width: 100%;
        }

        .custom-btn-primary:hover {
            background-color: #e05200;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .mobile-menu-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 8px;
            }

            .menu-button {
                padding: 8px;
            }

            .menu-button i {
                font-size: 18px;
            }

            .menu-button span {
                font-size: 10px;
            }
        }

        @media (max-width: 480px) {
            .mobile-menu-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 6px;
            }

            .menu-button {
                padding: 6px;
            }

            .menu-button i {
                font-size: 16px;
            }

            .menu-button span {
                font-size: 9px;
            }
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (Visible on Desktop) -->
            <div class="col-md-3 sidebar-account d-none d-md-block">
                <div class="profile-info mb-4">
                    <img src="{{ asset('./img/profile/profile3.jfif') }}" alt="User profile picture">
                    <div>
                        <p class="font-weight-bold mb-0">Hello,</p>
                        <p class="mb-0">Sandra Suresh</p>
                    </div>
                </div>
                <nav>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a class="d-flex align-items-center {{ Request::is('order') ? 'active' : '' }}" href="/order">
                                <i class="fas fa-box mr-2"></i> MY ORDERS
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="d-flex align-items-center {{ Request::is('profile') ? 'active' : '' }}" href="/profile">
                                <i class="fas fa-cog mr-2"></i> PROFILE SETTINGS
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="d-flex align-items-center {{ Request::is('coupon') ? 'active' : '' }}" href="/coupon">
                                <i class="fa fa-gift mr-2"></i> Coupons
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="d-flex align-items-center {{ Request::is('wishlist') ? 'active' : '' }}" href="/wishlist">
                                <i class="fa-solid fa-heart mr-2"></i> Wishlist
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#helpCenterModal">
                                <i class="fa-solid fa-headset mr-2"></i> Help Center
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="d-flex align-items-center" href="#">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Mobile Menu -->
            <div class="d-md-none w-100">
                <div class="profile-info mb-3">
                    <img src="{{ asset('./img/profile/profile3.jfif') }}" alt="User profile picture">
                    <div>
                        <p class="font-weight-bold mb-0">Hello,</p>
                        <p class="mb-0">Sandra Suresh</p>
                    </div>
                </div>

                <div class="mobile-menu-grid">
                    <a href="/order" class="menu-button {{ Request::is('order') ? 'active' : '' }}">
                        <i class="fas fa-box"></i>
                        <span>MY ORDERS</span>
                    </a>
                    <a href="/profile" class="menu-button {{ Request::is('profile') ? 'active' : '' }}">
                        <i class="fas fa-cog"></i>
                        <span>PROFILE SETTINGS</span>
                    </a>
                    <a href="/coupon" class="menu-button {{ Request::is('coupon') ? 'active' : '' }}">
                        <i class="fa fa-gift"></i>
                        <span>Coupons</span>
                    </a>
                    <a href="/wishlist" class="menu-button {{ Request::is('wishlist') ? 'active' : '' }}">
                        <i class="fa-solid fa-heart"></i>
                        <span>Wishlist</span>
                    </a>
                    <a href="/help-center" class="menu-button {{ Request::is('help-center') ? 'active' : '' }}">
                        <i class="fa-solid fa-headset"></i>
                        <span>Help Center</span>
                    </a>
                    <a href="#" class="menu-button">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>


            <div class="modal fade" id="helpCenterModal" tabindex="-1" aria-labelledby="helpCenterModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content custom-modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header custom-modal-header">
                            <h5 class="modal-title" id="helpCenterModalLabel">Help Center</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body custom-modal-body">
                            <form>
                                <!-- Name Field -->
                                <div class="custom-form-group">
                                    <label for="name" class="custom-form-label">Your Name</label>
                                    <input type="text" class="custom-form-control" id="name" placeholder="Enter your name" required>
                                </div>
                                <!-- Email Field -->
                                <div class="custom-form-group">
                                    <label for="email" class="custom-form-label">Your Email</label>
                                    <input type="email" class="custom-form-control" id="email" placeholder="Enter your email"
                                        required>
                                </div>
                                <!-- Message Field -->
                                <div class="custom-form-group">
                                    <label for="message" class="custom-form-label">Your Message</label>
                                    <textarea class="custom-form-control" id="message" rows="3" placeholder="Write your message"
                                        required></textarea>
                                </div>
                                <!-- Submit Button -->
                                <button type="submit" class="custom-btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 content-area">
                <div class="custom-form-card">
                    <div class="custom-section-header">
                        <h5 class="mb-0">Personal Information</h5>
                        <a href="#" class="custom-edit-link" onclick="toggleEditForm('personal')">Edit</a>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="custom-form-control" value="Sandra" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="custom-form-control" value="Suresh" disabled>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="custom-form-label">Your Gender</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" checked>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-section-header">
                        <h5 class="mb-0">Email Address</h5>
                        <a href="#" class="custom-edit-link" onclick="toggleEditForm('email')">Edit</a>
                    </div>
                    <div class="mb-4">
                        <input type="email" class="custom-form-control" value="sandra.suresh@example.com" disabled>
                    </div>
                    <div class="custom-section-header">
                        <h5 class="mb-0">Mobile Number</h5>
                        <a href="#" class="custom-edit-link" onclick="toggleEditForm('mobile')">Edit</a>
                    </div>
                    <div class="mb-4">
                        <input type="tel" class="custom-form-control" value="+971567347755" disabled>
                    </div>
                    <div class="mt-5">
                        <h5 class="mb-4">FAQs</h5>
                        <div class="custom-faq-item">
                            <h6>What happens when I update my email address (or mobile number)?</h6>
                            <p class="text-secondary mb-0">Your login email id (or mobile number) changes, likewise. You'll receive all your account related communication on your updated email address (or mobile number).</p>
                        </div>
                        <div class="custom-faq-item">
                            <h6>When will my account be updated with the new email address (or mobile number)?</h6>
                            <p class="text-secondary mb-0">It happens as soon as you confirm the verification code sent to your email (or mobile) and save the changes.</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-outline-danger me-2">Deactivate Account</button>
                        <button class="btn btn-outline-danger">Delete Account</button>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>
        function toggleEditForm(section) {
            // Hide all edit forms first
            document.querySelectorAll('.custom-edit-form-container').forEach(form => {
                form.style.display = 'none';
            });

            // Show the selected edit form
            const formId = section + 'EditForm';
            const form = document.getElementById(formId);
            if (form) {
                form.style.display = form.style.display === 'none' ? 'block' : 'none';
            }
        }
    </script>
@endsection