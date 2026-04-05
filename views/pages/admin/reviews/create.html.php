<div class="container-fluid py-4 bg-light min-vh-100">
    <div class="mb-4">
        <a href="admin.php?page=reviews" class="btn btn-outline-secondary border-0 btn-sm fw-bold">
            <i class="bi bi-arrow-left-short fs-5 align-middle"></i> 
            <span class="align-middle">Back to Review List</span>
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7"> 
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="bi bi-plus-circle-fill text-primary me-2"></i>Create New Review
                    </h5>
                    <small class="text-muted">Posting as Administrator</small>
                </div>
                
                <div class="card-body p-4">
                    <form action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=reviews&action=store" 
                          method="post" 
                          enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <label for="filmId" class="form-label small fw-bold text-muted text-uppercase">Select Film</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-film"></i></span>
                                    <select name="filmId" id="filmId" class="form-select border-start-0 shadow-none" required>
                                        <option value="" disabled selected>Choose a movie...</option>
                                        <?php foreach ($films ?? [] as $film): ?>
                                            <option value="<?= htmlspecialchars($film["id"]) ?>">
                                                <?= htmlspecialchars($film["title"]) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-5 mb-3">
                                <label for="rating" class="form-label small fw-bold text-muted text-uppercase">Rating</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text bg-light text-warning border-end-0"><i class="bi bi-star-fill"></i></span>
                                    <select name="rating" id="rating" class="form-select border-start-0 shadow-none">
                                        <option value="0">None</option>
                                        <?php for($i=1; $i<=5; $i++): ?>
                                            <option value="<?= $i ?>"><?= $i ?> Star<?= $i>1?'s':'' ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label small fw-bold text-muted text-uppercase">Attach Photo (Optional)</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-image"></i></span>
                                <input type="file" name="image" id="image" 
                                       class="form-control border-start-0 shadow-none" 
                                       accept="image/*">
                            </div>
                            <div class="form-text small text-muted">Recommended: JPG, PNG (Max 2MB).</div>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label small fw-bold text-muted text-uppercase">Review Content</label>
                            <textarea name="content" id="content" class="form-control border shadow-sm shadow-none" 
                                      rows="5" placeholder="Write the review content here..." required></textarea>
                        </div>

                        <div class="row g-2">
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm w-100">
                                    <i class="bi bi-send me-1"></i> POST REVIEW
                                </button>
                            </div>
                            <div class="col-sm-4">
                                <a href="admin.php?page=reviews" class="btn btn-light text-muted border py-2 w-100 shadow-sm">
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