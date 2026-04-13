<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark">User Management</h2>
    <a href="admin.php?admin=1&page=users&action=create" class="btn btn-primary shadow-sm">
        <i class="bi bi-person-plus-fill"></i> Add New User
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>User Info</th>
                        <th>Password (Hashed)</th>
                        <th>Role</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users ?? [] as $user): ?>
                        <tr>
                            <td class="ps-4 text-muted fw-bold"><?= htmlspecialchars($user["id"]) ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($user["username"]) ?>&background=random"
                                        class="rounded-circle me-3" width="40" height="40">
                                    <div class="fw-bold text-dark"><?= htmlspecialchars($user["username"]) ?></div>
                                </div>
                            </td>
                            <td>
                                <code class="text-muted small">
                                    <?= substr(htmlspecialchars($user["password"]), 0, 15) ?>...
                                </code>
                            </td>
                            <td>
                                <?php if ($user["role"] == 1): ?>
                                    <span class="badge bg-danger">
                                        <i class="bi bi-shield-lock-fill"></i> Admin
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-info text-dark">
                                        <i class="bi bi-person-fill"></i> User
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm">
                                    <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=users&action=edit&id=<?= htmlspecialchars($user["id"]) ?>"
                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <?php if ($user["username"] !== $_SESSION["user"]["username"]): ?>
                                        <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=users&action=delete&id=<?= htmlspecialchars($user["id"]) ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure you want to delete this user?')" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php if (empty($users)): ?>
    <div class="text-center py-5">
        <p class="text-muted">No users found.</p>
    </div>
<?php endif; ?>

<?php if (!empty($err)): ?>
    <div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-danger text-white border-0">
                    <h5 class="modal-title fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i> Error</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4 text-center">
                    <div class="text-danger mb-3">
                        <i class="bi bi-x-circle" style="font-size: 3rem;"></i>
                    </div>
                    <p class="fs-5 text-dark mb-0"><?= htmlspecialchars($err) ?></p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary w-100 fw-bold" data-bs-dismiss="modal">Understand</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
            myModal.show();
        });
    </script>
<?php endif; ?>

