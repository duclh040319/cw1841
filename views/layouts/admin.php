<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $header ?> | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <div class="container-fluid p-0">
        <div class="row g-0">
            
            <nav class="col-md-3 col-lg-2 bg-dark min-vh-100 shadow-sm d-none d-md-block">
                <div class="sticky-top pt-3">
                    <div class="px-4 py-3 border-bottom border-secondary mb-4">
                        <a href="admin.php" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-shield-lock-fill fs-4 me-2 text-primary"></i>
                            <span class="fs-5 fw-bold tracking-tight">FILM ADMIN</span>
                        </a>
                    </div>

                    <div class="px-3">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item mb-1">
                                <a class="nav-link text-white <?= !isset($_GET['page']) ? 'active' : 'opacity-75' ?>" href="admin.php?admin=1">
                                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="nav-link text-white <?= ($_GET['page'] ?? '') === 'films' ? 'active' : 'opacity-75' ?>" href="admin.php?admin=1&page=films">
                                    <i class="bi bi-film me-2"></i> Films
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="nav-link text-white <?= ($_GET['page'] ?? '') === 'users' ? 'active' : 'opacity-75' ?>" href="admin.php?admin=1&page=users">
                                    <i class="bi bi-people me-2"></i> Users
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="nav-link text-white <?= ($_GET['page'] ?? '') === 'reviews' ? 'active' : 'opacity-75' ?>" href="admin.php?admin=1&page=reviews">
                                    <i class="bi bi-chat-left-text me-2"></i> Reviews
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="nav-link text-white <?= ($_GET['page'] ?? '') === 'emails' ? 'active' : 'opacity-75' ?>" href="admin.php?admin=1&page=emails">
                                    <i class="bi bi-envelope me-2"></i> Emails
                                </a>
                            </li>

                            <li class="my-4"><hr class="border-secondary opacity-25"></li>

                            
                            <li class="nav-item">
                                <a class="nav-link text-danger fw-semibold" href="admin.php?page=logout">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="col-md-9 col-lg-10 ms-sm-auto">
                
                <header class="navbar navbar-expand bg-white shadow-sm px-4 py-2 sticky-top">
                    <div class="container-fluid p-0">
                        <h5 class="mb-0 fw-bold text-secondary"><?= $header; ?></h5>
                        
                        <div class="ms-auto d-flex align-items-center">
                            <span class="me-3 d-none d-lg-inline text-muted small">Logged in as: <strong>Admin</strong></span>
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white shadow-sm" style="width: 35px; height: 35px;">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="p-4 mt-2">
                    <div class="bg-white rounded-3 shadow-sm p-4 min-vh-100 border">
                        <?php echo $content; ?>
                    </div>
                </div>

            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>