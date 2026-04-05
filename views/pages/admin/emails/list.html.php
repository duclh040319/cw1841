<div class="container-fluid py-4 bg-light min-vh-100">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h3 class="fw-bold text-dark mb-0">
                <i class="bi bi-envelope-paper text-primary me-2"></i>Inbox Messages
            </h3>
            <p class="text-muted mb-0 small">Overview of latest customer inquiries</p>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
            <div class="btn-group shadow-sm">
                <button class="btn btn-white bg-white border">
                    <span class="fw-bold"><?= count($emails ?? []) ?></span> Total
                </button>
                <a href="admin.php?page=contacts" class="btn btn-white bg-white border" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light border-bottom">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase text-muted small fw-bold" style="width: 25%;">Sender</th>
                        <th class="py-3 text-uppercase text-muted small fw-bold">Message Preview</th>
                        <th class="py-3 text-uppercase text-muted small fw-bold" style="width: 15%;">Date Received</th>
                        <th class="pe-4 py-3 text-uppercase text-muted small fw-bold text-end" style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($emails)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-chat-left-dots display-4 d-block mb-3 opacity-25"></i>
                                    <p>No messages in your inbox</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($emails as $email): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold me-3 shadow-sm"
                                            style="width: 40px; height: 40px; font-size: 0.8rem;">
                                            <?= strtoupper(substr($email['fromEmail'], 0, 1)) ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark mb-0 small">
                                                <?= htmlspecialchars($email['fromEmail']) ?>
                                            </div>

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-dark small mb-1 fw-medium text-truncate" style="max-width: 350px;">
                                        <?= htmlspecialchars($email['content']) ?>
                                    </div>

                                </td>

                                <td>
                                    <div class="text-dark small fw-semibold">
                                        <?= date('M d, Y', strtotime($email['createdAt'])) ?>
                                    </div>
                                    
                                </td>

                                <td class="pe-4 text-end">
                                    <div class="d-inline-flex gap-2">
                                        <a href="admin.php?page=emails&action=delete&id=<?= $email['id'] ?>"
                                            class="btn btn-light btn-sm text-danger border"
                                            onclick="return confirm('Confirm deletion?')"
                                            title="Delete">
                                            <i class="bi bi-trash3"></i>
                                            
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white border-0 py-3 text-center">
            <small class="text-muted">End of messages</small>
        </div>
    </div>
</div>