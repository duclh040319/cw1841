<div class="container-fluid">
    <div class="mb-3">
        <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=films" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-bold text-warning">
                        <i class="bi bi-pencil-square me-2"></i>Edit Film: <?= htmlspecialchars($film["title"]) ?>
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=films&action=update&id=<?= htmlspecialchars($film["id"]); ?>" 
                          method="post" 
                          enctype="multipart/form-data"> <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label fw-semibold">Film Title</label>
                                    <input type="text" name="title" id="title" class="form-control" 
                                           value="<?= htmlspecialchars($film["title"]) ?>" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="releaseYear" class="form-label fw-semibold">Release Year</label>
                                        <input type="number" name="releaseYear" id="releaseYear" class="form-control" 
                                               value="<?= htmlspecialchars($film["releaseYear"]) ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="image" class="form-label fw-semibold">Change Poster (Optional)</label>
                                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                        <div class="form-text text-danger italic small">* Leave blank to keep current image.</div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label fw-semibold">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="6"><?= htmlspecialchars($film["description"]) ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-4 border-start text-center">
                                <label class="form-label fw-semibold d-block">Current Poster</label>
                                <div class="mt-2">
                                    <img src="uploads/<?= htmlspecialchars($film['image']) ?>" 
                                         alt="Current Image" 
                                         class="img-fluid rounded shadow-sm border p-1" 
                                         style="max-height: 300px; object-fit: cover;"
                                         >
                                </div>
                                <p class="small text-muted mt-2">Filename: <?= htmlspecialchars($film["image"]) ?></p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 border-top pt-4 mt-3">
                            <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=films" class="btn btn-light px-4">Cancel</a>
                            <button type="submit" class="btn btn-warning px-5 fw-bold text-dark">
                                <i class="bi bi-save me-1"></i> UPDATE FILM
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>