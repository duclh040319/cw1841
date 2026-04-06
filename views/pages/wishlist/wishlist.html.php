<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div>
            <h1 class="fw-bold text-danger mb-0">
                <i class="bi bi-heart-fill me-2"></i>My Wishlist
            </h1>
            <p class="text-muted mb-0">You have <?= count($wishlist ?? []) ?> movies in your favorite list.</p>
        </div>
        <a href="index.php?page=films" class="btn btn-outline-primary fw-bold">
            <i class="bi bi-plus-lg me-1"></i> Add More
        </a>
    </div>

    <?php if (empty($wishlist)): ?>
        <div class="text-center py-5 bg-white rounded shadow-sm border">
            <i class="bi bi-heartbreak text-light" style="font-size: 5rem;"></i>
            <h3 class="mt-3 fw-bold text-muted">Your wishlist is empty</h3>
            <p class="text-secondary">Explore our movies and add your favorites to see them here!</p>
            <a href="index.php?page=films" class="btn btn-primary px-4 py-2 mt-2 fw-bold">Explore Movies</a>
        </div>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php foreach ($wishlist as $item): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 position-relative">
                        <form action="index.php?page=wishlist&action=delete" method="post" class="position-absolute top-0 end-0 p-2" style="z-index: 10;">
                            <input type="hidden" name="wishlistId" value="<?= $item['wishlist_id'] ?>">
                            <button type="submit" class="btn btn-light btn-sm rounded-circle shadow-sm text-danger" title="Remove from wishlist">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </form>

                        <div class="bg-light" style="height: 300px;">
                            <img src="uploads/<?= htmlspecialchars($item['image']) ?>" 
                                 class="card-img-top h-100 w-100" 
                                 style="object-fit: cover;" 
                                 alt="<?= htmlspecialchars($item['title']) ?>">
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title fw-bold text-truncate mb-1">
                                <?= htmlspecialchars($item['title']) ?>
                            </h6>
                            <div class="mb-3">
                                <span class="badge bg-warning text-dark small">
                                    <i class="bi bi-star-fill me-1"></i><?= $item['rating'] ?? 'N/A' ?>
                                </span>
                                <span class="text-muted small ms-2"><?= $item['year'] ?? '' ?></span>
                            </div>
                            
                            <div class="mt-auto">
                                <a href="index.php?page=films&action=detail&id=<?= $item['film_id'] ?>" 
                                   class="btn btn-primary w-100 btn-sm fw-bold mb-2">
                                    Watch Now
                                </a>
                                <button type="button" class="btn btn-link btn-sm w-100 text-decoration-none text-muted fw-semibold" 
                                        onclick="this.closest('.col').querySelector('form').submit()">
                                    Remove Item
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>