<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark">Review Management</h2>
    <a href="admin.php?admin=1&page=reviews&action=create" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-lg"></i> Add New Review
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4" style="width: 80px;">ID</th>
                        <th style="width: 120px;">Rating</th>
                        <th style="width: 100px;">Photo</th> <th>Content</th>
                        <th style="width: 180px;">Created At</th>
                        <th class="text-end pe-4" style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews ?? [] as $review): ?>
                        <tr>
                            <td class="ps-4 text-muted fw-bold"><?= htmlspecialchars($review["id"]) ?></td>
                            <td>
                                <?php 
                                    $rating = $review["rating"];
                                    $badgeClass = $rating >= 4 ? 'bg-success' : ($rating <= 2 ? 'bg-danger' : 'bg-warning text-dark');
                                ?>
                                <span class="badge <?= $badgeClass ?> rounded-pill px-3">
                                    <?= htmlspecialchars($rating) ?> <i class="bi bi-star-fill small"></i>
                                </span>
                                <div class="mt-1 small text-muted" style="letter-spacing: -1px;">
                                    <?= str_repeat('★', $rating) ?><?= str_repeat('☆', 5 - $rating) ?>
                                </div>
                            </td>
                            
                            <td>
                                <?php if (!empty($review['image'])): ?>
                                    <a href="uploads/<?= htmlspecialchars($review['image']) ?>" target="_blank">
                                        <img src="uploads/<?= htmlspecialchars($review['image']) ?>" 
                                             class="rounded border shadow-sm" 
                                             style="width: 60px; height: 45px; object-fit: cover;"
                                         >
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted small italic">No photo</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="text-dark small" style="max-width: 300px;">
                                    <p class="mb-0 text-truncate-2" style="display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                                        <?= htmlspecialchars($review["content"]) ?>
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="small fw-semibold text-secondary">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <?= date('d/m/Y', strtotime($review["createdAt"])) ?>
                                </div>
                                <div class="text-muted" style="font-size: 0.75rem;">
                                    <i class="bi bi-clock me-1"></i>
                                    <?= date('H:i', strtotime($review["createdAt"])) ?>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=reviews&action=edit&id=<?= htmlspecialchars($review["id"]) ?>" 
                                       class="btn btn-sm btn-outline-primary" title="Edit">
                                       <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=reviews&action=delete&id=<?= htmlspecialchars($review["id"]) ?>" 
                                       class="btn btn-sm btn-outline-danger" 
                                       onclick="return confirm('Delete this review and its photo permanently?')" title="Delete">
                                       <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php if (empty($reviews)): ?>
    <div class="text-center py-5 bg-white shadow-sm rounded mt-3">
        <i class="bi bi-chat-left-dots display-1 text-light"></i>
        <p class="text-muted mt-3">No reviews found in database.</p>
    </div>
<?php endif; ?>