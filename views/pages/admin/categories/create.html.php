<div class="container-fluid py-4 bg-light min-vh-100">
    <div class="mb-4">
        <a href="admin.php?page=categories" class="btn btn-link text-decoration-none p-0 text-muted">
            <i class="bi bi-arrow-left"></i> Back to Categories
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom py-3 text-center">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="bi bi-folder-plus text-primary me-2"></i>Create New Category
                    </h5>
                    <p class="text-muted small mb-0 mt-1">Add a new genre for your movie collection</p>
                </div>
                
                <div class="card-body p-4">
                    <form action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=categories&action=store" method="post">
                        
                        <div class="mb-3">
                            <label for="name" class="form-label small fw-bold text-muted text-uppercase">Category Type</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="bi bi-tag"></i>
                                </span>
                                <input type="text" name="type" id="name" 
                                       class="form-control border-start-0 ps-0 shadow-none" 
                                       placeholder="e.g. Action, Romance, Horror" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2 pt-2">
                            <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm">
                                <i class="bi bi-check-lg me-1"></i> CREATE CATEGORY
                            </button>
                            <a href="admin.php?page=categories" 
                               class="btn btn-light text-muted border-0">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-white border-0 py-3 text-center border-top">
                    <span class="text-muted small">Created by <strong>Lê Huỳnh Đức</strong></span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Loại bỏ viền xanh khi focus vào ô input để giữ giao diện dashboard phẳng */
    .form-control:focus, .form-select:focus {
        border-color: #dee2e6;
        box-shadow: none;
    }
    .input-group:focus-within {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1) !important;
        border-radius: 0.375rem;
    }
</style>