<div class="container-fluid py-4 bg-light min-vh-100">
    <div class="mb-4">
        <a href="admin.php?page=categories" class="btn btn-link text-decoration-none p-0 text-muted">
            <i class="bi bi-arrow-left"></i> Back to Categories
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="bi bi-pencil-square text-warning me-2"></i>Edit Category
                    </h5>
                    <small class="text-muted">Updating ID: #<?= htmlspecialchars($category['id']) ?></small>
                </div>
                
                <div class="card-body p-4">
                    <form action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=categories&action=update&id=<?= htmlspecialchars($category['id']) ?>" method="post">
                        
                        <div class="mb-3">
                            <label for="name" class="form-label small fw-bold text-muted text-uppercase">Category Type</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="bi bi-tag-fill"></i>
                                </span>
                                <input type="text" name="type" id="name" 
                                       class="form-control border-start-0 ps-0 shadow-none" 
                                       value="<?= htmlspecialchars($category['type']) ?>" required>
                            </div>
                        </div>

                       

                        <div class="d-grid gap-2 pt-2">
                            <button type="submit" class="btn btn-warning fw-bold py-2 shadow-sm text-dark">
                                <i class="bi bi-save me-1"></i> SAVE CHANGES
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