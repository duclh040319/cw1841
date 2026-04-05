<div class="container-fluid py-4 bg-light min-vh-100">
    <div class="mb-4">
        <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=users" 
           class="btn btn-outline-secondary border-0 btn-sm fw-bold">
            <i class="bi bi-arrow-left-short fs-5 align-middle"></i> 
            <span class="align-middle">Back to User List</span>
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="bi bi-person-plus-fill text-primary me-2"></i>Create New User
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    <form action="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=users&action=store" method="post">
                        
                        <div class="mb-3">
                            <label for="username" class="form-label small fw-bold text-muted text-uppercase">Username</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" name="username" id="username" 
                                       class="form-control border-start-0 ps-0 shadow-none" 
                                       placeholder="Enter username" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label small fw-bold text-muted text-uppercase">Password</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="bi bi-key"></i>
                                </span>
                                <input type="password" name="password" id="password" 
                                       class="form-control border-start-0 ps-0 shadow-none" 
                                       placeholder="Min 6 characters" 
                                       required minlength="6">
                            </div>
                            <div class="form-text mt-2 small text-secondary">
                                <i class="bi bi-shield-lock me-1"></i> Ensure the password is secure and unique.
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold text-muted text-uppercase">Assign Role</label>
                            <select name="role" class="form-select border shadow-sm shadow-none">
                                <option value="0" selected>General User (Reviewer)</option>
                                <option value="1">Administrator</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2 pt-2">
                            <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm">
                                <i class="bi bi-plus-lg me-1"></i> CREATE USER
                            </button>
                            <a href="admin.php?admin=<?= $_SESSION["user"]["role"] ?>&page=users" 
                               class="btn btn-light text-muted border-0 py-2">
                                Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>