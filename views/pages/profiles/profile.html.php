<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">User Information</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION["user"]["username"]) ?>&background=random" 
                             class="rounded-circle" width="100" alt="User">
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Username:</span>
                            <span class="fw-bold"><?= htmlspecialchars($_SESSION["user"]["username"]) ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted">Role:</span>
                            <span class="badge <?= $_SESSION["user"]["role"] == 1 ? 'bg-danger' : 'bg-primary' ?>">
                                <?= $_SESSION["user"]["role"] == 1 ? 'Admin' : 'User' ?>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 border-bottom-0">
                            <span class="text-muted">Status:</span>
                            <span class="text-success small"><i class="bi bi-circle-fill me-1"></i> Active</span>
                        </li>
                    </ul>

                    <div class="mt-4 pt-3 border-top text-center">
                        <a href="index.php" class="btn btn-secondary px-4 btn-sm">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>