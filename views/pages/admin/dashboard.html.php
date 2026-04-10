<div class="container-fluid py-5 bg-light min-vh-100">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center text-lg-start d-lg-flex align-items-center justify-content-between">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Welcome back, <?= htmlspecialchars($_SESSION["user"]["username"]) ?>! 👋</h2>
                    <p class="text-muted mb-0">Here's what's happening with your film review system today.</p>
                </div>
                <div class="mt-3 mt-lg-0">
                    <span class="badge bg-white text-dark shadow-sm p-2 px-3 border">
                        <i class="bi bi-calendar3 me-2 text-primary"></i><?= date('F j, Y') ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-5 justify-content-center">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted fw-bold small text-uppercase">Films</h6>
                                <h2 class="fw-bold mb-0"><?= count($films ?? []); ?></h2>
                            </div>
                            <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3">
                                <i class="bi bi-film fs-3"></i>
                            </div>
                        </div>
                        <hr class="my-3 opacity-25">
                        <a href="admin.php?page=films" class="text-primary text-decoration-none small fw-bold">
                            Manage Library <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted fw-bold small text-uppercase">Reviews</h6>
                                <h2 class="fw-bold mb-0"><?= count($reviews ?? []); ?></h2>
                            </div>
                            <div class="bg-success bg-opacity-10 text-success p-3 rounded-3">
                                <i class="bi bi-chat-square-text fs-3"></i>
                            </div>
                        </div>
                        <hr class="my-3 opacity-25">
                        <a href="admin.php?page=reviews" class="text-success text-decoration-none small fw-bold">
                            Check Feedbacks <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted fw-bold small text-uppercase">Users</h6>
                                <h2 class="fw-bold mb-0"><?= count($users ?? []); ?></h2>
                            </div>
                            <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3">
                                <i class="bi bi-people fs-3"></i>
                            </div>
                        </div>
                        <hr class="my-3 opacity-25">
                        <a href="admin.php?page=users" class="text-warning text-decoration-none small fw-bold">
                            View Community <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted fw-bold small text-uppercase">Emails</h6>
                                <h2 class="fw-bold mb-0"><?= count($emails ?? []); ?></h2>
                            </div>
                            <div class="bg-info bg-opacity-10 text-info p-3 rounded-3">
                                <i class="bi bi-envelope-paper fs-3"></i>
                            </div>
                        </div>
                        <hr class="my-3 opacity-25">
                        <a href="admin.php?page=emails" class="text-info text-decoration-none small fw-bold">
                            Open Inbox <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 bg-dark text-white p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <h5 class="fw-bold mb-2">Quick Actions</h5>
                            <p class="text-white-50 mb-lg-0">Need to update the system? Use these shortcuts to perform tasks faster.</p>
                        </div>
                        <div class="col-lg-5 text-lg-end">
                            <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                                <a href="admin.php?page=emails" class="btn btn-info text-white fw-bold">
                                    <i class="bi bi-envelope me-1"></i> View Emails
                                </a>
                                <a href="admin.php?page=films&action=create" class="btn btn-primary fw-bold">
                                    <i class="bi bi-plus-lg me-1"></i> New Film
                                </a>
                                <a href="admin.php?page=users&action=create" class="btn btn-outline-light fw-bold">
                                    <i class="bi bi-person-plus me-1"></i> New User
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>