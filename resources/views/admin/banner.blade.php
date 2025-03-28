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
        <h2 class="mb-0">Home page Banner</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProdctsUser">
            <i class="fas fa-plus me-2"></i>Add Banners
        </button>
    </div>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Banners</li>
        </ol>
    </nav>
    <div class="card mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Banner Image</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($banner && $banner->count() > 0)
                        @foreach($banner as $b => $banners)
                        <tr>
                            <td>{{ $b + 1 }}</td>
                            <td><img src="{{ asset($banners->b_images) }}" alt="Product Image" style="height: 65px; width: 150px;"></td>
                            <td>
                                <form action="{{ route('banner.updatestatus') }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="id" value="{{ $banners->id }}">
                                    <input type="hidden" name="status" value="0">
                                    <label class="switch">
                                    <input type="checkbox" name="status" value="1" class="status-toggle" {{ $banners->status == 1 ? 'checked' : '' }}
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.getElementById("imageUpload1").addEventListener("change", function(event) {
    const container = document.getElementById("imagePreviewContainer1");
    container.innerHTML = ""; // Clear previous previews
    let filesArray = Array.from(event.target.files); // Convert FileList to array

    filesArray.forEach((file, index) => {
        if (!file.type.startsWith("image/")) {
            alert("Only image files are allowed!");
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            const img = new Image();
            img.src = e.target.result;
            img.onload = function() {
                if (img.width !== 1500 || img.height !== 651) {
                    alert(`Image ${file.name} must be 1500 × 651 px.`);
                    return;
                }
                
                const div = document.createElement("div");
                div.className = "position-relative";
                div.style.display = "inline-block";
                
                const image = document.createElement("img");
                image.src = e.target.result;
                image.className = "rounded border";
                image.style.width = "150px"; 
                image.style.height = "auto"; 
                image.style.margin = "5px";
                
                const deleteBtn = document.createElement("button");
                deleteBtn.innerHTML = "&times;";
                deleteBtn.className = "btn btn-danger btn-sm position-absolute top-0 end-0";
                deleteBtn.style.margin = "3px";

                // Delete function
                deleteBtn.onclick = function() {
                    div.remove();
                    filesArray.splice(index, 1); // Remove from array
                    updateFileInput(filesArray);
                };

                div.appendChild(image);
                div.appendChild(deleteBtn);
                container.appendChild(div);
            };
        };
        reader.readAsDataURL(file);
    });

    function updateFileInput(files) {
        const dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        document.getElementById("imageUpload1").files = dataTransfer.files;
    }
});
</script>
@endsection