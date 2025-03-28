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
        <h2 class="mb-0">Enquiries</h2>
        <button id="deleteSelectedBtn" class="btn btn-danger" disabled>
            <i class="fas fa-trash me-2"></i>Delete Selected
        </button>
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
                        <th><input type="checkbox" id="selectAll"></th>
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
                    <td><input type="checkbox" class="selectItem" name="selected_enquiries[]" value="{{ $enquiry->enquiry_id }}"></td>
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
                            class="btn btn-sm btn-primary respondToEnquiry" 
                            data-bs-toggle        = "modal"
                            data-bs-target        = "#respondToEnquiryModal" 
                            data-enquiry_id       = "{{ $enquiry->enquiry_id }}"
                            data-enquiry_title    = "{{ $enquiry->enquiry_title }}"
                            data-enquiry_message  = "{{ $enquiry->enquiry_message }}"
                            data-response_message  = "{{ $enquiry->response_message }}"
                            >
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
               
            </div>
        </div>
    </div>
    <!-- Table Section End -->

    <!-- Respond To Enquiry modal -->
    <div class="modal fade" id="respondToEnquiryModal" tabindex="-1" aria-labelledby="respondToEnquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="respondToEnquiryModalLabel">Add Response</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="enquiryTitleEdit" class="form-label">Subject</label>
                                <input type="text" id="enquiryTitleEdit" name="enquiry_title" class="form-control" disabled required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="enquiryMessageEdit" class="form-label">Message</label>
                                <textarea id="enquiryMessageEdit" name="enquiry_message" class="form-control" rows="4" disabled required></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="responseMessageEdit" class="form-label">Response Message</label>
                                <textarea id="responseMessageEdit" name="response_message" class="form-control" rows="4" required></textarea>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

<!-- JavaScript to handle Select All functionality -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const selectAllCheckbox = document.getElementById("selectAll");
    const checkboxes        = document.querySelectorAll(".selectItem");
    const deleteSelectedBtn = document.getElementById("deleteSelectedBtn");

    function updateDeleteButtonState() {
        const anyChecked = document.querySelectorAll(".selectItem:checked").length > 0;
        deleteSelectedBtn.disabled = !anyChecked;
    }

    selectAllCheckbox.addEventListener("change", function () {
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
        updateDeleteButtonState();
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            if (!this.checked) {
                selectAllCheckbox.checked = false;
            } else if (document.querySelectorAll(".selectItem:checked").length === checkboxes.length) {
                selectAllCheckbox.checked = true;
            }
            updateDeleteButtonState(); // Update delete button state
        });
    });

    deleteSelectedBtn.addEventListener("click", function () {
        let selectedIds = [];
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                selectedIds.push(checkbox.value);
            }
        });

        if (selectedIds.length === 0) {
            Swal.fire({
                title: 'Error!',
                text: 'Please select at least one enquiry to delete.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

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
                fetch("{{ route('enquiries.deleteMultiple') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ enquiry_ids: selectedIds })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Selected enquiries deleted successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while deleting enquiries.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while deleting enquiries.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            }
        });
    });
    updateDeleteButtonState();
});
</script>

<!-- JavaScript for response to vendor's enquiry -->
<script>
    $(document).ready(function() {
        $('.respondToEnquiry').on('click', function() {
           
            var enquiryId       = $(this).data('enquiry_id');
            var enquiryTitle    = $(this).data('enquiry_title');
            var enquiryMessage  = $(this).data('enquiry_message');
            var responseMessage = $(this).data('response_message');

            console.log(enquiryId+","+enquiryTitle+","+enquiryMessage);

            $('#enquiryTitleEdit').val(enquiryTitle);
            $('#enquiryMessageEdit').val(enquiryMessage);
            $('#responseMessageEdit').val(responseMessage);

            // Set the form action to update the specific product
            $('form').attr('action', '/admin/update-enquiry/' + enquiryId);
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
                        text: 'Response added successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $('#respondToEnquiryModal').modal('hide');
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while adding the Enquiry Response.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>

@endsection