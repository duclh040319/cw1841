<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    
                    <div class="text-center mb-4">
                        <div class="display-6 mb-2">📝</div>
                        <h2 class="fw-bold text-uppercase" style="letter-spacing: 2px;">Register</h2>
                        <p class="text-muted small">Create your new account</p>
                    </div>

                    <form action="index.php?page=register&action=registered" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-person-plus"></i>
                                </span>
                                <input type="text" style="box-shadow: none; outline: none;" class="form-control bg-light border-start-0" 
                                       id="username" name="username" 
                                       placeholder="Choose a username" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-shield-lock"></i>
                                </span>
                                <input type="password" style="box-shadow: none; outline: none;" class="form-control bg-light border-start-0" 
                                       id="password" name="password" 
                                       placeholder="At least 6 characters" required minlength="6">
                            </div>
                            <div class="form-text mt-2 small text-muted">
                                Your password must be at least 6 characters long.
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg shadow-sm fw-bold">CREATE ACCOUNT</button>
                        </div>

                        <div class="text-center mt-4">
                            <p class="small mb-0 text-muted">Already have an account? 
                                <a href="index.php?page=login" class="text-primary fw-bold text-decoration-none">Login here</a>
                            </p>
                        </div>
                    </form>
                    
                </div>
            </div>
            
            <div class="text-center mt-3">
                <a href="index.php" class="text-secondary small text-decoration-none">← Back to Home</a>
            </div>
        </div>
    </div>
</div>