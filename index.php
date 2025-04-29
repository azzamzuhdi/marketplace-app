<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace UMKM Desa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .navbar-brand { 
            font-size: 1.8rem; 
            font-weight: bold; 
            color: #007bff; 
        }
        .banner {
            position: relative;
            background: url('images/banner.png') no-repeat center center; 
            background-size: cover; 
            height: 400px; 
        }
        .banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Overlay gelap */
            z-index: 1;
        }
        .banner-text {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
            padding-top: 150px;
            font-family: 'Lora', serif;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .banner-text p {
            font-size: 1.2rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 300;
        }
        footer {
            font-size: 0.9rem;
            color: #6c757d;
        }
        /* Styling for the dropdown button */
        .nav-item .dropdown-menu {
            min-width: 200px;
        }
        .nav-item .dropdown-item {
            padding: 10px 20px;
            font-size: 1rem;
        }
        .nav-item .dropdown-item:hover {
            background-color: #f8f9fa;
        }
        .nav-link.dropdown-toggle {
            font-size: 1rem;
            padding: 8px 16px;
            border-radius: 30px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">UMKM Desa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Menu Login -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <!-- Menu Registrasi -->
                    <li class="nav-item">
                        <a class="nav-link" href="registrasi.php">Registrasi</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="banner">
        <div class="banner-text">
            <h1>Selamat Datang di Marketplace UMKM Desa</h1>
            <p>Dukung produk lokal dan belanja dari rumah</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-4">
        <div class="container text-center">
            <p>&copy; 2024 UMKM Desa. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
