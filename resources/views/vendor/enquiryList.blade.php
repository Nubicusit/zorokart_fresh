@extends('vendor.inc.includes')
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
        <h2 class="mb-0">Enquiries</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEnquiryModal">
            <i class="fas fa-plus me-2"></i>Add
        </button>
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
                        <th>Title</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Response</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($enquiries as $e => $enquiry)
                    <tr>
                    <td>{{ $e + 1 }}</td>
                    <td><p class="fw-bold mb-1">{{ $enquiry->enquiry_title }}</p></td>
                    <td>{{ $enquiry->enquiry_message }}</td>
                    <td>
                        @php
                            // Get the status value
                            $status = $enquiry->enquiry_status;
                        @endphp

                        @switch($status)
                            @case(1)
                                <span class="badge bg-warning">Pending</span>
                                @break
                            @case(2)
                                <span class="badge bg-success">Responded</span>
                                @break
                            @case(3)
                                <span class="badge bg-danger">Closed</span>
                                @break
                            @default
                                <span class="badge bg-light">Unknown</span>
                        @endswitch
                    </td>
                    <td>{{ $enquiry->created_at}}</td>
                    <td>{{ $enquiry->response_message ?? '--' }}</td>
                    <td>{{ $enquiry->response_date ?? '--' }}</td>
                    <td><button
                            class="btn btn-sm btn-primary updateEnquiry" 
                            title                 = "Update Enquiry"
                            data-bs-toggle        = "modal"
                            data-bs-target        = "#updateEnquiryModal" 
                            data-enquiry_id       = "{{ $enquiry->enquiry_id }}"
                            data-enquiry_title    = "{{ $enquiry->enquiry_title }}"
                            data-enquiry_message  = "{{ $enquiry->enquiry_message }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <a href="" 
                            class="btn btn-sm btn-danger closeEnquiryBtn" 
                            data-id="{{ $enquiry->enquiry_id }}"
                            title="Close Enquiry">
                            <i class="fas fa-close"></i>
                        </a>
                        <a href="" 
                            class="btn btn-sm btn-danger deleteEnquiryBtn" 
                            data-id="{{ $enquiry->enquiry_id }}"
                            title="Delete Enquiry">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
               
            </div>
        </div>
    </div>
    <!-- Table Section End -->

    <!-- Add Enquiries Modal -->
    <div class="modal fade" id="addEnquiryModal" tabindex="-1" aria-labelledby="addEnquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEnquiryModalLabel">Add Enquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addEnquiryForm" action="{{ route('vendor.addEnquiry') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="enquiryTitle" class="form-label">Subject</label>
                                <input type="text" id="enquiryTitle" name="enquiry_title" class="form-control" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="enquiryMessage" class="form-label">Message</label>
                                <textarea id="enquiryMessage" name="enquiry_message" class="form-control" rows="4" required></textarea>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Add Enquiry</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Enquiries Modal End-->

    <!-- Update Enquiry modal -->
    <div class="modal fade" id="updateEnquiryModal" tabindex="-1" aria-labelledby="updateEnquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateEnquiryModalLabel">Update Enquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="enquiryTitleEdit" class="form-label">Subject</label>
                                <input type="text" id="enquiryTitleEdit" name="enquiry_title" class="form-control" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="enquiryMessageEdit" class="form-label">Message</label>
                                <textarea id="enquiryMessageEdit" name="enquiry_message" class="form-control" rows="4" required></textarea>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Update Enquiry</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Enquiry modal End -->

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        // Delete Enquiry
        $('.deleteEnquiryBtn').on('click', function (e) {
            e.preventDefault(); 
            var enquiry_id = $(this).data('id'); 
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("vendor.deleteEnquiry", ":id") }}'.replace(':id', enquiry_id),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            console.log(response);
                            if (response.success) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function (xhr) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while deleting the Enquiry.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        });


        // Close Enquiry
        $('.closeEnquiryBtn').on('click', function (e) {
            e.preventDefault(); 
            var enquiry_id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to close this enquiry?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, close it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("vendor.closeEnquiry", ":id") }}'.replace(':id', enquiry_id),
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Closed!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function (xhr) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while closing the Enquiry.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        });

    });
</script>

<script>
    $(document).ready(function() {
        // Update Enquiry
        $('.updateEnquiry').on('click', function() {
           
            var enquiryId       = $(this).data('enquiry_id');
            var enquiryTitle    = $(this).data('enquiry_title');
            var enquiryMessage  = $(this).data('enquiry_message');

            $('#enquiryTitleEdit').val(enquiryTitle);
            $('#enquiryMessageEdit').val(enquiryMessage);

            $('form').attr('action', '/vendor/update-enquiry/' + enquiryId);
        });

        // Handle form submission
        $('form').on('submit', function(e) {
            e.preventDefault(); 

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Enquiry updated successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $('#updateEnquiryModal').modal('hide');
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while updating the Enquiry.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>
@endsection