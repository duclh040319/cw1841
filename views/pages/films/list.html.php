<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h1 class="fw-bold text-primary mb-0">🎬 List Films Page</h1>
            <span class="badge bg-secondary"><?= count($films ?? []) ?> movies found</span>
        </div>

        <div class="d-flex gap-2">
            <div class="btn-group shadow-sm">
                <div class="btn btn-light border disabled text-muted fw-bold small">
                    <i class="bi bi-alphabet"></i> SORT:
                </div>
                <a href="index.php?page=films&action=sortASC"
                    class="btn btn-outline-secondary <?= (($_GET['sort'] ?? '') == 'title' && ($_GET['order'] ?? '') == 'asc') ? 'active' : '' ?>">
                    A-Z
                </a>
                <a href="index.php?page=films&action=sortDESC"
                    class="btn btn-outline-secondary <?= (($_GET['sort'] ?? '') == 'title' && ($_GET['order'] ?? '') == 'desc') ? 'active' : '' ?>">
                    Z-A
                </a>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        <?php foreach ($films ?? [] as $film): ?>
            <div class="col">
                <div class="card h-100 shadow-sm border-0 overflow-hidden">
                    <div style="height: 350px; position: relative;" class="bg-light p-3 d-flex align-items-center justify-content-center">
                        <img src="uploads/<?= htmlspecialchars($film['image']) ?>"
                            class="img-fluid rounded shadow-sm d-block"
                            style="max-height: 100%; object-fit: contain;"
                            alt="<?= htmlspecialchars($film["title"]) ?>">
                    </div>

                    <div class="card-body d-flex flex-column bg-white">
                        <h5 class="card-title fw-bold text-dark text-truncate mb-2">
                            <?= htmlspecialchars($film["title"]) ?>
                        </h5>

                        <p class="card-text text-muted small mb-3">
                            <?= mb_strimwidth(htmlspecialchars($film["description"]), 0, 80, "...") ?>
                        </p>

                        <div class="mt-auto d-flex gap-2">
                            <a href="index.php?page=films&action=detail&id=<?= htmlspecialchars($film["id"]) ?>"
                                class="btn btn-primary flex-grow-1 fw-bold border-0 shadow-sm">
                                Detail <i class="bi bi-chevron-right"></i>
                            </a>

                            <form action="index.php?page=wishlist&action=add" method="post">
                                <input type="hidden" name="film_id" value="<?= $film['id'] ?>">
                                <button type="submit" class="btn btn-outline-danger border-2" title="Add to Wishlist">
                                    <i class="bi bi-heart-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>