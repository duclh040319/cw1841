<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center fw-bold text-primary" href="index.php">
      <img src="assets/img/logo.png"
        alt="Logo"
        width="40"
        height="40"
        class="d-inline-block align-text-top me-2 rounded">
      <span>FILM REVIEW SYSTEM</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <form class="d-flex ms-auto me-auto" action="index.php" method="get">
        <input type="hidden" name="page" value="films">
        <input type="hidden" name="action" value="search">
        <input class="form-control me-2" type="search" name="search" placeholder="Search movies..." aria-label="Search" required>
        <button class="btn btn-outline-primary" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>

      <ul class="navbar-nav ms-auto align-items-center">
        <?php if (!empty($_SESSION["user"])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION["user"]["username"]) ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
              <li><a class="dropdown-item" href="index.php?page=profile">My Profile</a></li>
              <li><a class="dropdown-item" href="index.php?page=wishlist">Wishlist</a></li>
              <li><a class="dropdown-item" href="index.php?page=contact">Contact to admin</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-danger" href="index.php?page=logout">Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=login">Login</a>
          </li>
          <li class="nav-item ms-lg-2">
            <a class="btn btn-primary btn-sm px-3 text-white fw-bold" href="index.php?page=register">
              Register
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>