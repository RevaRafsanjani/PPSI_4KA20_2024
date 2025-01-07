<nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(to right, #e4b6b6, #f9dc83);">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php" style="color: black;">
            <img src="../image/gambarlogo2.jpg" alt="AC Nursing" class="img-fluid me-2" style="max-width: 40px; height: auto;">
            Admin Panel
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-4">
                    <a class="nav-link" href="../adminpanel">Home</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="kategori.php">Category</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="layanan.php">Services</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="clients.php">Clients Data</a>
                </li>
                <!-- Tombol Logout Terpisah -->
                <li class="nav-item ms-lg-5">
                    <a class="nav-link btn btn-outline-dark text-white" href="logout.php" style="color: white; border-radius: 15px;">Admin Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Warna teks navbar normal menjadi abu-abu */
    .navbar-nav .nav-link {
        color: grey !important;
    }

    /* Warna teks navbar saat hover menjadi hitam */
    .navbar-nav .nav-link:hover {
        color: black !important;
        transition: 0.3s ease;
    }

    /* Navbar pada posisi fixed di atas */
    .navbar {
        z-index: 1030;
        /* Pastikan navbar berada di atas konten lain */
    }

    /* Agar tombol logout lebih menonjol */
    .nav-item .btn-outline-dark {
        color: white;
        border-color: transparent;
        transition: 0.3s ease;
    }

    .nav-item .btn-outline-dark:hover {
        background-color: #e4b6b6;
        border-color: transparent;
    }
</style>