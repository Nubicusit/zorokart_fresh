@extends('admin.inc.includes')
@section('content')

    <div class="main-content">
        <!-- Alert Section -->
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
        <!-- Alert Section End-->
         <!-- Header Section -->
        <div class="header-section d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Sub Category Requests</h2>
            <!-- <button id="deleteSelectedBtn" class="btn btn-danger" disabled>
                    <i class="fas fa-trash me-2"></i>Delete Selected
                </button> -->
            <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEnquiryModal">
                            <i class="fas fa-plus me-2"></i>Add
                        </button> -->
        </div>
        <!-- Header Section End-->
         <!-- Table Section -->
     <div class="card mt-4 container-fluid">
        <div class="card-body">
            <div class="table-responsive table-container" >
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Sl</th>
                        <th>Sub Category</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($subcat_requests as $e => $subcat_request)
                    <tr>
                    <td>{{ $e + 1 }}</td>
                    <td><p class="fw-bold mb-1">{{ $subcat_request->sub_name }}</p></td>
                    <td>{{ $subcat_request->sub_desc }}</td>
                    <td>{{ $subcat_request->user_id }}</td>
                    <td>
                        @php
                            // Get the status value
                            $status = $subcat_request->status;
                        @endphp

                        @switch($status)
                            @case(0)
                                <span class="badge bg-warning">Pending</span>
                                @break
                            @case(1)
                                <span class="badge bg-success">Responded</span>
                                @break
                            @default
                                <span class="badge bg-light">Unknown</span>
                        @endswitch
                    </td>
                    <td>
                        <form action="{{ route('subcategoryRequest.approve') }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT') <!-- PUT request for updating -->
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="sub_cat_id" value="{{ $subcat_request->sub_cat_id }}">
                            <input type="hidden" name="status" value="0">
                            <label class="switch">
                            <input type="checkbox" name="status" value="1" class="status-toggle" {{ $subcat_request->status == 1 ? 'checked' : '' }}
                            onchange="this.form.submit()"><span class="slider round"></span>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
               
            </div>
        </div>
    </div>
    <!-- Table Section End -->
    </div>

@endsection