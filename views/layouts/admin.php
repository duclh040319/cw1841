<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $header ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container-fluid">
        <div class="row">

            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse min-vh-100 shadow p-0">
                <div class="position-sticky pt-3">
                    <div class="text-white text-center mb-4 p-3 border-bottom border-secondary">
                        <h4 class="fw-bold"><i class="bi bi-shield-lock-fill me-2"></i>ADMIN</h4>
                    </div>

                    <ul class="nav flex-column px-3">
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white rounded <?= !isset($_GET['page']) ? 'bg-primary' : 'hover-bg-secondary' ?>" href="admin.php?admin=1">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white rounded <?= ($_GET['page'] ?? '') === 'films' ? 'bg-primary' : '' ?>" href="admin.php?admin=1&page=films">
                                <i class="bi bi-film me-2"></i> Films
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white rounded <?= ($_GET['page'] ?? '') === 'users' ? 'bg-primary' : '' ?>" href="admin.php?admin=1&page=users">
                                <i class="bi bi-people me-2"></i> Users
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white rounded <?= ($_GET['page'] ?? '') === 'reviews' ? 'bg-primary' : '' ?>" href="admin.php?admin=1&page=reviews">
                                <i class="bi bi-chat-left-text me-2"></i> Reviews
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <hr class="text-secondary">
                            <a class="nav-link text-danger fw-bold" href="admin.php?page=logout">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
                    <h1 class="h2 fw-bold text-dark"><?= $header; ?></h1>
                    
                </div>

                <div class="p-4 bg-white rounded shadow-sm min-vh-100">
                    <?php echo $content; ?>
                </div>

            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>