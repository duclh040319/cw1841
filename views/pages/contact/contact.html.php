<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="row g-0 justify-content-center bg-white">

                    <div class="col-md-10 p-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Contact Us</h2>
                            <p class="text-muted">Have a question? We'd love to hear from you.</p>
                        </div>

                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $_SESSION['success'];
                                unset($_SESSION['success']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form action="index.php?page=contact&action=send" method="post">
                            <?php if (!empty($err)): ?>
                                <div class="alert alert-danger d-flex align-items-center py-2 shadow-sm" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    <div class="small fw-bold">
                                        <?= htmlspecialchars($err) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">Email Address</label>
                                <input type="email" name="fromEmail" class="form-control form-control-lg fs-6">
                            </div>


                            <div class="mb-4">
                                <label class="form-label fw-bold small text-uppercase text-muted">Message</label>
                                <textarea name="content" class="form-control form-control-lg fs-6" rows="5"></textarea>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary fw-bold py-3 shadow-sm rounded-3">
                                    <i class="bi bi-send-fill me-2"></i> SEND MESSAGE
                                </button>
                                <a href="index.php" class="btn btn-link btn-sm text-decoration-none text-muted">Back to Home</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>