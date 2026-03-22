<div class="container-fluid">
    <div class="row g-4">
        
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-primary text-white h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 bg-white bg-opacity-25 p-3 rounded">
                        <i class="bi bi-film fs-1"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-uppercase fw-bold mb-1">Total Films</h6>
                        <h2 class="mb-0 display-6 fw-bold"><?= $numberOfFilm; ?></h2>
                    </div>
                </div>
                <div class="card-footer bg-white bg-opacity-10 border-0">
                    <a href="admin.php?page=films" class="text-white text-decoration-none small">
                        View Details <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-success text-white h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 bg-white bg-opacity-25 p-3 rounded">
                        <i class="bi bi-chat-left-text fs-1"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-uppercase fw-bold mb-1">Total Reviews</h6>
                        <h2 class="mb-0 display-6 fw-bold"><?= $numberOfReview; ?></h2>
                    </div>
                </div>
                <div class="card-footer bg-white bg-opacity-10 border-0">
                    <a href="admin.php?page=reviews" class="text-white text-decoration-none small">
                        View Details <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-warning text-dark h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 bg-dark bg-opacity-10 p-3 rounded">
                        <i class="bi bi-people fs-1"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-uppercase fw-bold mb-1">Total Users</h6>
                        <h2 class="mb-0 display-6 fw-bold"><?= $numberOfUser; ?></h2>
                    </div>
                </div>
                <div class="card-footer bg-dark bg-opacity-10 border-0">
                    <a href="admin.php?page=users" class="text-dark text-decoration-none small">
                        View Details <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

    
</div>