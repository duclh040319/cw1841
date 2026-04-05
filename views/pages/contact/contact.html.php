<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="row g-0">
                    

                    <div class="col-md-7 p-5 bg-white">
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $_SESSION['success'];
                                unset($_SESSION['success']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form action="index.php?page=contact&action=send" method="post">
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" name="fromEmail" class="form-control" placeholder="name@example.com" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold">Message</label>
                                <textarea name="content" class="form-control" rows="4" placeholder="How can we help you?" required></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm">
                                    <i class="bi bi-send-fill me-2"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>