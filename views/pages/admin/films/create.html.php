<div class="container-fluid py-4 bg-light min-vh-100">
    <div class="mb-3">
        <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=films" class="btn btn-outline-secondary btn-sm border-0">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title mb-0 fw-bold text-primary">
                        <i class="bi bi-plus-circle-fill me-2"></i>Create New Film
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form method="post" action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=films&action=store" enctype="multipart/form-data">
                        <?php if (!empty($err)): ?>
                            <div class="alert alert-danger d-flex align-items-center py-2 shadow-sm" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <div class="small fw-bold">
                                    <?= htmlspecialchars($err) ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label small fw-bold text-muted text-uppercase">Film Title</label>
                                <input type="text" name="title" id="title" class="form-control shadow-none" placeholder="e.g. Oppenheimer">
                            </div>



                            <div class="col-md-6 mb-3">
                                <label for="releaseYear" class="form-label small fw-bold text-muted text-uppercase">Release Year</label>
                                <input type="number" name="releaseYear" id="releaseYear" class="form-control shadow-none" placeholder="YYYY" min="1900" max="2099">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="image" class="form-label small fw-bold text-muted text-uppercase">Poster Image</label>
                                <input type="file" name="image" id="image" class="form-control shadow-none" accept="image/*">
                                <div class="form-text small text-muted"><i class="bi bi-info-circle me-1"></i>Recommended: JPG or PNG format.</div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="description" class="form-label small fw-bold text-muted text-uppercase">Description</label>
                                <textarea name="description" id="description" class="form-control shadow-none" rows="5" placeholder="Summarize the film..."></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 border-top pt-4">
                            <button type="reset" class="btn btn-light px-4 text-muted">Reset</button>
                            <button type="submit" class="btn btn-primary px-5 fw-bold shadow-sm">
                                <i class="bi bi-check-lg me-1"></i> SAVE FILM
                            </button>
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