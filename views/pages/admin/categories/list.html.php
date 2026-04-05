<div class="container-fluid py-4 bg-light min-vh-100">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h3 class="fw-bold text-dark mb-0">
                <i class="bi bi-grid text-primary me-2"></i>Movie Categories
            </h3>
            <p class="text-muted mb-0 small">Organize and manage your film genres</p>
        </div>
        <div class="col-auto">
            <a href="admin.php?page=categories&action=create" class="btn btn-primary shadow-sm px-4">
                <i class="bi bi-plus-lg me-1"></i> Add New Category
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light border-bottom">
                                <tr>
                                    <th class="ps-4 py-3 text-uppercase text-muted small fw-bold" style="width: 10%;">ID</th>
                                    <th class="py-3 text-uppercase text-muted small fw-bold">Category Type  </th>
                                    <th class="pe-4 py-3 text-uppercase text-muted small fw-bold text-end" style="width: 15%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($categories)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">No categories found.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($categories ?? [] as $cat): ?>
                                        <tr>
                                            <td class="ps-4 text-muted fw-medium">#<?= $cat['id'] ?></td>
                                            <td>
                                                <span class="fw-bold text-dark"><?= htmlspecialchars($cat['type']) ?></span>
                                            </td>
                                            
                                            
                                            <td class="pe-4 text-end">
                                                <div class="btn-group">
                                                    <a href="admin.php?page=categories&action=edit&id=<?= $cat['id'] ?>" 
                                                       class="btn btn-outline-secondary btn-sm border-0" title="Edit">
                                                        <i class="bi bi-pencil-fill"></i>Edit
                                                    </a>
                                                    <a href="admin.php?page=categories&action=delete&id=<?= $cat['id'] ?>" 
                                                       class="btn btn-outline-danger btn-sm border-0" 
                                                       onclick="return confirm('Delete this category?')" title="Delete">
                                                        <i class="bi bi-trash3-fill"></i>Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 py-3 text-center border-top">
                    <span class="text-muted small">Created by <strong>Lê Huỳnh Đức</strong></span>
                </div>
            </div>
        </div>
    </div>
</div>