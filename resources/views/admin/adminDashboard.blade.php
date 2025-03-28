@extends('admin.inc.includes')
@section('content')
    <div class="main-content">
        <div class="header-section d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Welcome Admin</h2>
            <div class="user-section">
                <i class="fas fa-bell"></i>
                <!-- <div class="user-avatar"> -->
                
                <!-- </div> -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="fa fa-sign-out"></i>
                    </x-responsive-nav-link>
                </form>
                <div>
                    <strong>Admin</strong>
                    <div class="text-muted small">Administrator</div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i> Dashboard</a></li>
            </ol>
        </nav>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-primary-subtle text-primary">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">New Orders</h6>
                        <h3 class="mb-0">34,567</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up"></i> 2.00% (30 days)
                        </small>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-success-subtle text-success">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Total Income</h6>
                        <h3 class="mb-0">$74,567</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up"></i> 5.45% Increased
                        </small>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-info-subtle text-info">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Total Expense</h6>
                        <h3 class="mb-0">$24,567</h3>
                        <small class="text-danger">
                            <i class="fas fa-arrow-down"></i> 2.00% Expense
                        </small>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-warning-subtle text-warning">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">New Users</h6>
                        <h3 class="mb-0">34,567</h3>
                        <small class="text-danger">
                            <i class="fas fa-arrow-down"></i> 25.00% Earning
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="chart-container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="mb-1">Yearly Stats</h5>
                            <h3 class="mb-0">$245,479</h3>
                        </div>
                        <select class="form-select" style="width: auto;">
                            <option>Yearly</option>
                            <option>Monthly</option>
                            <option>Weekly</option>
                        </select>
                    </div>
                    <div style="height: 300px; background: #f8f9fa; border-radius: 8px;"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chart-container h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Sales/Revenue</h5>
                        <select class="form-select" style="width: auto;">
                            <option>Yearly</option>
                            <option>Monthly</option>
                            <option>Weekly</option>
                        </select>
                    </div>
                    <div style="height: 300px; background: #f8f9fa; border-radius: 8px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
@endsection
