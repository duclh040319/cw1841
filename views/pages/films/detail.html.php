<div class="mb-4 d-flex justify-content-between align-items-center">
    <a href="index.php?page=films" class="btn btn-outline-secondary shadow-sm">
        <i class="bi bi-arrow-left"></i> Back to Films
    </a>

    <form action="index.php?page=wishlist&action=add" method="post">
        <input type="hidden" name="film_id" value="<?= $film['id'] ?>">
        <button type="submit" class="btn btn-outline-danger shadow-sm fw-bold">
            <i class="bi bi-heart-fill me-1"></i> Add to Wishlist
        </button>
    </form>
</div>

<div class="row bg-white p-4 shadow-sm rounded mb-4">
    <div class="col-md-4">
        <img src="uploads/<?= htmlspecialchars($film['image']) ?>"
            class="img-fluid rounded shadow"
            alt="<?= htmlspecialchars($film["title"]) ?>">
    </div>
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-start">
            <h1 class="display-5 fw-bold"><?= htmlspecialchars($film["title"]) ?></h1>

        </div>

        <p class="badge bg-secondary fs-6"><?= htmlspecialchars($film["releaseYear"]) ?></p>
        <hr>
        <p class="lead text-muted">
            <?= htmlspecialchars($film["description"]) ?>
        </p>
    </div>
</div>

<div class="card mb-4 border-0 shadow-sm">
    <form class="card-body p-4" method="post"
        action="index.php?page=films&action=review&filmId=<?= htmlspecialchars($film["id"]) ?>"
        enctype="multipart/form-data">

        <h4 class="card-title mb-3">Write your review</h4>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label fw-bold small text-uppercase">Rating</label>
                <select class="form-select shadow-none" name="rating">
                    <option value="5">5 ⭐ - Excellent</option>
                    <option value="4">4 ⭐ - Good</option>
                    <option value="3">3 ⭐ - Normal</option>
                    <option value="2">2 ⭐ - Bad</option>
                    <option value="1">1 ⭐ - Terrible</option>
                </select>
            </div>

            <div class="col-md-8 mb-3">
                <label class="form-label fw-bold small text-uppercase">Attach Photo (Optional)</label>
                <input type="file" name="image" class="form-control shadow-none" accept="image/*">
            </div>
        </div>

        <div class="mb-3">
            <textarea class="form-control shadow-none" rows="3" placeholder="What did you think about this film?" name="content" required></textarea>
        </div>

        <button class="btn btn-primary px-4 fw-bold" type="submit">
            <i class="bi bi-send me-1"></i> POST REVIEW
        </button>
    </form>
</div>

<div class="bg-white p-4 shadow-sm rounded">
    <h4 class="mb-4">Community reviews <span class="badge bg-light text-dark ms-2"><?= count($reviews ?? []) ?></span></h4>

    <?php foreach ($reviews ?? [] as $review): ?>
        <div class="d-flex mb-4 border-bottom pb-3">
            <div class="flex-shrink-0">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($review["username"]) ?>&background=random"
                    class="rounded-circle shadow-sm" width="50" height="50">
            </div>

            <div class="ms-3 flex-grow-1">
                <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $review['id']): ?>
                    <form method="post" action="index.php?page=films&action=updateReview&filmId=<?= $film['id'] ?>&edit_id=<?= $review["id"] ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $review['id'] ?>">
                        <div class="mb-2 row">
                            <div class="col-md-3">
                                <select class="form-select form-select-sm" name="rating">
                                    <?php for ($i = 5; $i >= 1; $i--): ?>
                                        <option value="<?= $i ?>" <?= $review['rating'] == $i ? 'selected' : '' ?>><?= $i ?> ⭐</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="hidden" name="old_image" value="<?= htmlspecialchars($review['image']) ?>">
                                <input type="file" name="image" class="form-control form-control-sm shadow-none" accept="image/*">
                            </div>
                        </div>
                        <div class="mb-2">
                            <textarea class="form-control shadow-none" name="content" rows="3" required><?= htmlspecialchars($review['content']) ?></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-sm btn-success px-3">Save</button>
                            <a href="index.php?page=films&action=detail&id=<?= $film['id'] ?>" class="btn btn-sm btn-light border px-3">Cancel</a>
                        </div>
                    </form>

                <?php else: ?>

                    <div class="d-flex justify-content-between align-items-start">
                        <div class="w-100">
                            <h6 class="mb-1 fw-bold">
                                <?= htmlspecialchars($review["username"]) ?>
                                <span class="text-warning ms-2">
                                    <?= str_repeat('★', $review["rating"]) ?><?= str_repeat('☆', 5 - $review["rating"]) ?>
                                </span>
                            </h6>
                            <p class="mb-2 text-dark"><?= htmlspecialchars($review["content"]) ?></p>

                            <?php if (!empty($review['image'])): ?>
                                <div class="mb-3">
                                    <img src="uploads/<?= htmlspecialchars($review['image']) ?>"
                                        class="rounded shadow-sm border border-light"
                                        style="max-width: 200px; max-height: 150px; object-fit: cover; cursor: zoom-in;"
                                        onclick="window.open(this.src)"
                                        alt="Review photo">
                                </div>
                            <?php endif; ?>

                        </div>

                        <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["username"] === $review["username"]): ?>
                            <div class="btn-group shadow-sm ms-2">
                                <a href="index.php?page=films&action=detail&id=<?= $film['id'] ?>&edit_id=<?= $review['id'] ?>#review-<?= $review['id'] ?>"
                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="index.php?page=films&action=deleteReview&id=<?= $review['id'] ?>&filmId=<?= $film['id'] ?>"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this review?')" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>
        <div id="review-<?= $review['id'] ?>"></div>
    <?php endforeach; ?>
</div>