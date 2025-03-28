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
        <h2 class="mb-0">User Ratings & Reviews</h2>
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
                        <th>User Name</th>
                        <th>Product</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Reviewed On</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($reviews as $r => $review)
                    <tr>
                    <td>{{ $r + 1 }}</td>
                    <td><p class="fw-bold mb-1">{{ $review->user->name }}</p></td>
                    <td>{{ $review->product->prodct_name }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->review_text }}</td>
                    <td>{{ $review->created_at }}</td>
                    <td><button
                            class="btn btn-sm btn-primary replyToReview" 
                            title                 = "Reply"
                            data-bs-toggle        = "modal"
                            data-bs-target        = "#replyToReviewModal" 
                            data-reply_id         = "{{ $review->reply->reply_id ?? '' }}"
                            data-review_id        = "{{ $review->review_id }}"
                            data-user_id          = "{{ $review->user->id }}"
                            data-reply_text       = "{{ $review->reply->reply_text ?? '' }}">
                            <i class="fas fa-edit"></i> Reply
                        </button>
                        <!-- <a href="" 
                            class="btn btn-sm btn-danger closeReviewBtn" 
                            data-review_id        = "{{ $review->review_id }}" 
                            title="Close Review">
                            <i class="fas fa-close"></i>
                        </a> -->
                        <!-- <a href="" 
                            class="btn btn-sm btn-danger deleteReview Btn" 
                            data-review_id        = "{{ $review->review_id }}"
                            title="Delete Review">
                            <i class="fas fa-trash"></i>
                        </a> -->
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
               
            </div>
        </div>
    </div>
    <!-- Table Section End -->

    <!-- Reply to Review modal -->
    <div class="modal fade" id="replyToReviewModal" tabindex="-1" aria-labelledby="replyToReviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyToReviewModalLabel">Reply</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="replyToReviewEdit" class="form-label">Reply</label>
                                <textarea id="replyToReviewEdit" name="reply_text" class="form-control" rows="4" required></textarea>
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
    <!-- Reply to Review modal End -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(document).ready(function() {
        // Add/Update Reply to User review
        $('.replyToReview').on('click', function() {
           
            var replyId         = $(this).data('reply_id');
            var reviewId        = $(this).data('review_id');
            var userId          = $(this).data('user_id');
            var replyText       = $(this).data('reply_text') || '';
            console.log("reply id"+replyId+" review id"+reviewId+" user id"+userId+" reply"+replyText);

            $('#replyToReviewEdit').val(replyText);


            if (replyId) {
                $('form').attr('action', '/vendor/update-review-reply/' + replyId);
            } else {
                $('form').attr('action', '/vendor/create-review-reply/' + reviewId);
            }
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
                        text: 'Reply saved successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $('#replyToReviewModal').modal('hide');
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while saving the reply.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>

@endsection