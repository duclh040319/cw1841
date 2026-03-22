<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">🎬 List Films Page</h1>
        <span class="badge bg-secondary"><?= count($films ?? []) ?> movies found</span>
    </div>

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        <?php foreach ($films ?? [] as $film): ?>
            <div class="col">
                <div class="card h-100 shadow-sm border-0 hover-shadow transition">
                    <div style="height: 400px; overflow: hidden;">
                        <img src="uploads/<?= htmlspecialchars($film['image']) ?>"
                            class="card-img-top h-100 w-100"
                            style="object-fit: cover;"
                            alt="<?= htmlspecialchars($film["title"]) ?>">
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-truncate">
                            <?= htmlspecialchars($film["title"]) ?>
                        </h5>
                        <p class="card-text text-muted small mb-3" style="display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                            <?= htmlspecialchars($film["description"]) ?>
                        </p>

                        <div class="mt-auto">
                            <a href="index.php?page=films&action=detail&id=<?= htmlspecialchars($film["id"]) ?>"
                                class="btn btn-outline-primary w-100 fw-bold">
                                View Detail -><i class="bi bi-arrow-right"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>