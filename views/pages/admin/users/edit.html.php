<div class="container-fluid py-4 bg-light min-vh-100">
    <div class="mb-4">
        <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=users" class="btn btn-link text-decoration-none p-0 text-muted">
            <i class="bi bi-arrow-left"></i> Back to User List
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="bi bi-pencil-square text-warning me-2"></i>Edit User Profile
                    </h5>
                    <small class="text-muted">Editing ID: #<?= htmlspecialchars($user["id"]) ?></small>
                </div>
                
                <div class="card-body p-4">
                    <form action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=users&action=update&id=<?= htmlspecialchars($user["id"]) ?>" method="post">
                        
                        <div class="mb-3">
                            <label for="username" class="form-label small fw-bold text-muted text-uppercase">Username</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" name="username" id="username" 
                                       class="form-control border-start-0 ps-0" 
                                       value="<?= htmlspecialchars($user["username"]) ?>" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label small fw-bold text-muted text-uppercase">New Password</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="bi bi-key"></i>
                                </span>
                                <input type="password" name="password" id="password" 
                                       class="form-control border-start-0 ps-0" 
                                       minlength="6">
                            </div>
                            
                        </div>

                        <div class="mb-4">
                            <label for="role" class="form-label small fw-bold text-muted text-uppercase">System Role</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="bi bi-shield-check"></i>
                                </span>
                                <select name="role" id="role" class="form-select border-start-0 ps-0">
                                    <option value="0" <?= $user["role"] == 0 ? 'selected' : '' ?>>General User</option>
                                    <option value="1" <?= $user["role"] == 1 ? 'selected' : '' ?>>Administrator</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning fw-bold py-2 shadow-sm text-dark">
                                <i class="bi bi-save me-1"></i> SAVE CHANGES
                            </button>
                            <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=users" 
                               class="btn btn-light text-muted border-0">
                                Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>