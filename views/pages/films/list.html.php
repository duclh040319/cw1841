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
                <div class="card h-100 shadow-sm border">
                    <div style="height: 350px; position: relative;">
                        <img src="uploads/<?= htmlspecialchars($film['image']) ?>"
                            class="card-img-top h-100 w-100"
                            style="object-fit: cover;"
                            alt="<?= htmlspecialchars($film["title"]) ?>">
                        
                        <div class="position-absolute top-0 end-0 p-2">
                            <form action="index.php?page=wishlist&action=add" method="post">
                                <input type="hidden" name="film_id" value="<?= $film['id'] ?>">
                                <button type="submit" class="btn btn-white btn-sm rounded-circle shadow-sm text-danger border" title="Add to Wishlist">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-truncate">
                            <?= htmlspecialchars($film["title"]) ?>
                        </h5>
                        
                        <p class="card-text text-muted small mb-3">
                            <?= mb_strimwidth(htmlspecialchars($film["description"]), 0, 80, "...") ?>
                        </p>

                        <div class="mt-auto d-flex gap-2">
                            <a href="index.php?page=films&action=detail&id=<?= htmlspecialchars($film["id"]) ?>"
                                class="btn btn-primary flex-grow-1 fw-bold">
                                Detail <i class="bi bi-chevron-right"></i>
                            </a>
                            
                            <form action="index.php?page=wishlist&action=add" method="post">
                                <input type="hidden" name="film_id" value="<?= $film['id'] ?>">
                                <button type="submit" class="btn btn-outline-danger" title="Add to Wishlist">
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