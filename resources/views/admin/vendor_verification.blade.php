@extends('admin.inc.includes')
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
    <div class="header-section d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Vendor Verification</h2>
        <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProdctsUser">
            <i class="fas fa-plus me-2"></i>Add Banners
        </button> -->
    </div>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vendor Verification</li>
        </ol>
    </nav>
    <div class="card mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Type</th>
                            <th scope="col">Aadhar Number</th>
                            <th scope="col">PAN Number</th>
                            <th scope="col">GST Number</th>
                            <th scope="col">Verification</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users && $users->count() > 0)
                        @foreach($users as $u => $user)
                        <tr>
                            <td>{{ $u + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->usertype}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <form action="{{ route('vendor_verification.update-status') }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <input type="hidden" name="flag" value="0">
                                    <label class="switch">
                                    <input type="checkbox" name="flag" value="1" class="status-toggle" {{ $user->flag == 1 ? 'checked' : '' }}
                                    onchange="this.form.submit()"><span class="slider round"></span>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <p>No products available.</p>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Offers Modal -->
    <div class="modal fade" id="addProdctsUser" tabindex="-1" aria-labelledby="addProdctsUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProdctsUserModalLabel">Add Banner Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProdctsUser" action="{{ route('banner.insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h5 class="mb-0">Add Banner Images</h5>
                                <input type="file" id="imageUpload1" name="b_images[]" multiple accept="image/*" class="form-control">
                                <small class="text-danger">Image must be 1500 × 651 px</small>
                                <div id="imagePreviewContainer1" class="mt-3 d-flex flex-wrap gap-2"></div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Add Banner</button>
                        </div>
                    </form>
                    <div id="responseMessage"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection