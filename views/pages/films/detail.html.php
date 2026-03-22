<div class="mb-4">
    <a href="index.php?page=films" class="btn btn-outline-secondary shadow-sm">
        <i class="bi bi-arrow-left"></i> ← Back to Films
    </a>
</div>

<div class="row bg-white p-4 shadow-sm rounded mb-4">
    <div class="col-md-4">
        <img src="uploads/<?= htmlspecialchars($film['image']) ?>"
            class="img-fluid rounded shadow"
            alt="<?= htmlspecialchars($film["title"]) ?>">
    </div>
    <div class="col-md-8">
        <h1 class="display-5 fw-bold"><?= htmlspecialchars($film["title"]) ?></h1>
        <p class="badge bg-secondary fs-6"><?= htmlspecialchars($film["releaseYear"]) ?></p>
        <hr>
        <p class="lead text-muted">
            <?= htmlspecialchars($film["description"]) ?>
        </p>
    </div>
</div>

<div class="card mb-4 border-0 shadow-sm">
    <form class="card-body p-4" method="post" action="index.php?page=films&action=review&filmId=<?= htmlspecialchars($film["id"]) ?>">
        <h4 class="card-title mb-3">Write your review</h4>
        <div class="mb-3">
            <label class="form-label fw-bold">Rating</label>
            <select class="form-select w-25" name="rating">
                <option value="5">5 ⭐ - Excellent</option>
                <option value="4">4 ⭐ - Good</option>
                <option value="3">3 ⭐ - Normal</option>
                <option value="2">2 ⭐ - Bad</option>
                <option value="1">1 ⭐ - Terrible</option>
            </select>
        </div>
        <div class="mb-3">
            <textarea class="form-control" rows="3" placeholder="Typing here..." name="content" required></textarea>
        </div>
        <button class="btn btn-primary px-4 fw-bold" type="submit">POST REVIEW</button>
    </form>
</div>

<div class="bg-white p-4 shadow-sm rounded">
    <h4 class="mb-4">Community reviews <span class="badge bg-light text-dark ms-2"><?= count($reviews ?? []) ?></span></h4>

    <?php foreach ($reviews ?? [] as $review): ?>
        <div class="d-flex mb-4 border-bottom pb-3">
            <div class="flex-shrink-0">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($review["username"]) ?>&background=random"
                    class="rounded-circle" width="50" height="50">
            </div>

            <div class="ms-3 flex-grow-1">
                <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $review['id']): ?>

                    <form method="post" action="index.php?page=films&action=updateReview&filmId=<?= $film['id'] ?>&edit_id=<?= $review["id"] ?>">
                        <input type="hidden" name="id" value="<?= $review['id'] ?>">
                        <div class="mb-2">
                            <select class="form-select form-select-sm w-25" name="rating">
                                <?php for ($i = 5; $i >= 1; $i--): ?>
                                    <option value="<?= $i ?>" <?= $review['rating'] == $i ? 'selected' : '' ?>><?= $i ?> ⭐</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <textarea class="form-control" name="content" rows="3" required><?= htmlspecialchars($review['content']) ?></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                            <a href="index.php?page=films&action=detail&id=<?= $film['id'] ?>" class="btn btn-sm btn-light text-decoration-none">Cancel</a>
                        </div>
                    </form>

                <?php else: ?>

                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="mb-1 fw-bold">
                                <?= htmlspecialchars($review["username"]) ?>
                                <span class="text-warning ms-2">
                                    <?= str_repeat('★', $review["rating"]) ?><?= str_repeat('☆', 5 - $review["rating"]) ?>
                                </span>
                            </h6>
                            <p class="mb-0 text-secondary"><?= htmlspecialchars($review["content"]) ?></p>
                        </div>

                        <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["username"] === $review["username"]): ?>
                            <div class="btn-group shadow-sm">
                                <a href="index.php?page=films&action=detail&id=<?= $film['id'] ?>&edit_id=<?= $review['id'] ?>#review-<?= $review['id'] ?>"
                                    class="btn btn-sm btn-outline-primary py-0 px-2" title="Edit">Edit
                                    <i class="bi bi-pencil small"></i>
                                </a>
                                <a href="index.php?page=films&action=deleteReview&id=<?= $review['id'] ?>&filmId=<?= $film['id'] ?>"
                                    class="btn btn-sm btn-outline-danger py-0 px-2"
                                    onclick="return confirm('Delete this review?')">Delete
                                    <i class="bi bi-trash small"></i>
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