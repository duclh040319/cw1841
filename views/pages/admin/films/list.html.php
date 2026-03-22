<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark">Film Management</h2>
    <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=films&action=create" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-lg"></i> Add New Film
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Poster</th>
                        <th>Title</th>
                        <th>Release</th>
                        <th>Created At</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($films ?? [] as $film): ?>
                        <tr>
                            <td class="ps-4 fw-bold text-muted"><?= htmlspecialchars($film["id"]) ?></td>
                            <td>
                                <img src="uploads/<?= htmlspecialchars($film['image']) ?>"
                                    class="rounded shadow-sm"
                                    style="width: 50px; height: 70px; object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= htmlspecialchars($film["title"]) ?></div>
                                <small class="text-muted d-block text-truncate" style="max-width: 250px;">
                                    <?= htmlspecialchars($film["description"]) ?>
                                </small>
                            </td>
                            <td>
                                <span class="badge bg-secondary opacity-75"><?= htmlspecialchars($film["releaseYear"]) ?></span>
                            </td>
                            <td class="text-muted small">
                                <?= date('d/m/Y', strtotime($film["createdAt"])) ?>
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm">
                                    <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=films&action=edit&id=<?= htmlspecialchars($film["id"]) ?>"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=films&action=delete&id=<?= htmlspecialchars($film["id"]) ?>"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this film?')">
                                        <i class="bi bi-trash"></i> Delete
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

<?php if (empty($films)): ?>
    <div class="text-center py-5">
        <p class="text-muted">No films found in database.</p>
    </div>
<?php endif; ?>