<div class="container-fluid">
    <div class="mb-3">
        <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=films" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-bold text-primary">
                        <i class="bi bi-plus-circle-fill me-2"></i>Create New Film
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form method="post" action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=films&action=store" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label fw-semibold">Film Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="e.g. Oppenheimer" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="releaseYear" class="form-label fw-semibold">Release Year</label>
                                <input type="number" name="releaseYear" id="releaseYear" class="form-control" placeholder="YYYY" min="1900" max="2099">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label fw-semibold">Poster Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                <div class="form-text">Recommended: JPG or PNG format.</div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="description" class="form-label fw-semibold">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Summarize the film..."></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 border-top pt-4">
                            <button type="reset" class="btn btn-light px-4">Reset</button>
                            <button type="submit" class="btn btn-primary px-5 fw-bold">
                                <i class="bi bi-check-lg me-1"></i> SAVE FILM
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>