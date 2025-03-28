@extends('vendor.inc.includes')
@section('content')
    <div class="main-content">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Header Section -->
        <div class="header-section d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Request for Category</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryRequestModal">
                <i class="fas fa-plus me-2"></i>Request New Category
            </button>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/vendor"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>

        <!-- Table Section -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="10%">Sl No</th>
                                <th scope="col" width="25%">Image</th>
                                <th scope="col" width="25%">Category</th>
                                <th scope="col" width="20%">Description</th>
                                <th scope="col" width="30%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $c => $category)
                            <tr id="category-{{ $category->cat_id }}">
                                <td>{{$c + 1}}</td>
                                <td><img src="{{ asset($category->cat_img) }}" alt="Category image" style="height: 100px; width: 100px;"></td>
                                <td>{{$category->cat_name}}</td>
                                <td>{{$category->cat_desc}}</td>
                                <td> @php
                                        // Get the status value
                                        $status = $category->status;
                                    @endphp

                                    @switch($status)
                                        @case(0)
                                            <span class="badge bg-warning">Pending</span>
                                            @break
                                        @case(1)
                                            <span class="badge bg-success">Approved</span>
                                            @break
                                        @default
                                            <span class="badge bg-light">Unknown</span>
                                    @endswitch
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Category Modal -->
        <div class="modal fade" id="addCategoryRequestModal" tabindex="-1" aria-labelledby="addCategoryRequestModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryRequestModalLabel">Add New Category Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addCategoryForm" action="{{ route('categoryRequest.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="cat_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="categoryDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="categoryDescription" name="cat_desc" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="categoryImage" class="form-label">Category Image</label>
                                <input type="file" class="form-control" id="categoryImage" name="image" accept="image/*" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
   
@endsection