<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub Category Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @include('admin.styles')
</head>
<body>
    @include('admin.sidebar')

    <div class="main-content">

        <!-- Header Section -->
        <div class="header-section d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Sub Category Management</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubCategoryModal">
                <i class="fas fa-plus me-2"></i>Add New Sub Category
            </button>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sub Category Management</li>
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
                                <th scope="col" width="20%">Sub Category</th>
                                <th scope="col" width="20%">Category</th>
                                <th scope="col" width="35%">Description</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Smartphones</td>
                                <td>Electronics</td>
                                <td>Mobile phones and accessories</td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-2">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>T-Shirts</td>
                                <td>Clothing</td>
                                <td>Casual and formal t-shirts</td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-2">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Sub Category Modal -->
        <div class="modal fade" id="addSubCategoryModal" tabindex="-1" aria-labelledby="addSubCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSubCategoryModalLabel">Add New Sub Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addSubCategoryForm">
                            <div class="mb-3">
                                <label for="categorySelect" class="form-label">Category</label>
                                <select class="form-select" id="categorySelect" required>
                                    <option value="" selected disabled>Select Category</option>
                                    <option value="1">Electronics</option>
                                    <option value="2">Clothing</option>
                                    <option value="3">Books</option>
                                    <option value="4">Home & Kitchen</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subCategoryName" class="form-label">Sub Category Name</label>
                                <input type="text" class="form-control" id="subCategoryName" required>
                            </div>
                            <div class="mb-3">
                                <label for="subCategoryDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="subCategoryDescription" rows="3" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="addSubCategoryForm" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    @include('admin.scripts')
</body>
</html>