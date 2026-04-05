<div class="container-fluid py-4 bg-light min-vh-100">
    <div class="mb-4">
        <a href="admin.php?page=reviews" class="btn btn-link text-decoration-none p-0 text-muted">
            <i class="bi bi-arrow-left"></i> Back to Review List
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="bi bi-pencil-square text-success me-2"></i>Edit Review Details
                    </h5>
                    <small class="text-muted">Modify review content, rating, or image</small>
                </div>
                
                <div class="card-body p-4">
                    <form action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=reviews&action=update&id=<?= htmlspecialchars($review["id"]) ?>" 
                          method="post" 
                          enctype="multipart/form-data">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="userId" class="form-label small fw-bold text-muted text-uppercase">Reviewer</label>
                                <select name="userId" id="userId" class="form-select shadow-none" required>
                                    <?php foreach ($users ?? [] as $user): ?>
                                        <option value="<?= htmlspecialchars($user["id"]) ?>" 
                                            <?= $user['id'] == $review['userId'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($user["username"]) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="filmId" class="form-label small fw-bold text-muted text-uppercase">Target Film</label>
                                <select name="filmId" id="filmId" class="form-select shadow-none" required>
                                    <?php foreach ($films ?? [] as $film): ?>
                                        <option value="<?= htmlspecialchars($film["id"]) ?>" 
                                            <?= $film['id'] == $review['filmId'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($film["title"]) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label small fw-bold text-muted text-uppercase">Rating Score</label>
                            <div class="input-group shadow-sm w-50">
                                <span class="input-group-text bg-light text-warning"><i class="bi bi-star-fill"></i></span>
                                <input type="number" name="rating" id="rating" class="form-control shadow-none" 
                                       min="1" max="5" value="<?= htmlspecialchars($review["rating"]) ?>" required>
                                <span class="input-group-text bg-white">/ 5</span>
                            </div>
                        </div>

                        <div class="mb-3 p-3 border rounded bg-light-subtle">
                            <label class="form-label small fw-bold text-muted text-uppercase d-block">Review Photo</label>
                            
                            <div class="d-flex align-items-start gap-3 mt-2">
                                <div class="text-center">
                                    <small class="d-block text-muted mb-1">Current</small>
                                    <?php if (!empty($review['image'])): ?>
                                        <img src="uploads/<?= htmlspecialchars($review['image']) ?>" 
                                             class="img-thumbnail shadow-sm" 
                                             style="width: 100px; height: 100px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="border rounded bg-white d-flex align-items-center justify-content-center text-muted" 
                                             style="width: 100px; height: 100px; font-size: 0.7rem;">
                                            No Photo
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="flex-grow-1">
                                    <small class="d-block text-muted mb-1">Upload New (Optional)</small>
                                    <input type="file" name="image" class="form-control shadow-none" accept="image/*">
                                    <div class="form-text italic small">* Leave blank to keep the current photo.</div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label small fw-bold text-muted text-uppercase">Review Content</label>
                            <textarea name="content" id="content" class="form-control border shadow-sm shadow-none" 
                                      rows="4" required><?= htmlspecialchars($review["content"]) ?></textarea>
                        </div>

                        <div class="row g-2">
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-success fw-bold py-2 shadow-sm text-white w-100">
                                    <i class="bi bi-save me-1"></i> SAVE CHANGES
                                </button>
                            </div>
                            <div class="col-sm-4">
                                <a href="admin.php?page=reviews" class="btn btn-light text-muted border py-2 w-100">
                                    Cancel
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>