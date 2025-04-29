<?php
// Include koneksi database
require_once 'koneksi.php';

// Query untuk mengambil data produk terbaru
$query = "SELECT * FROM produk ORDER BY id DESC LIMIT 10";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Marketplace UMKM Desa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(90deg, #004080, #0066cc);
        }
        .navbar-brand {
            font-weight: bold;
            color: #ffffff !important;
        }
        .form-control {
            border-radius: 30px;
        }
        .btn-primary {
            border-radius: 30px;
        }
        .cart-icon, .logout-icon, .user-icon {
            font-size: 1.5rem;
            color: #ffffff;
            margin-left: 10px;
        }
        .nav-item-link span {
            color: #ffffff;
        }
        .nav-item-link span:hover {
            color: #f8f9fa;
        }

        /* Banner Styles */
        .carousel-item {
            position: relative;
            background-color:rgb(170, 170, 170); /* Grey background */
            color: #ffffff;
            text-align: center;
            padding: 50px 20px;
        }
        .carousel-item h5 {
            font-size: 1.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .carousel-item p {
            font-size: 1.2rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        /* Product Card Styles (Similar to OLX) */
        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.3s ease;
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-card-body {
            padding: 15px;
            text-align: center;
        }
        .product-card h5 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .product-card p {
            color: #007bff;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* Category Styles */
        .category-list {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .category-item {
            margin: 0 15px;
            cursor: pointer;
            font-weight: bold;
        }
        .category-item:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">UMKM DESA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Pencarian -->
            <form class="d-flex me-auto" action="search.php" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Cari produk..." aria-label="Search">
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
            
            <!-- Jual Produk -->
            <a href="jual.php" class="btn btn-warning me-3 text-white">
                <i class="bi bi-bag-plus-fill"></i> Jual Produk
            </a>
            <!-- Keranjang -->
            <a href="keranjang.php" class="d-flex align-items-center nav-item-link">
                <i class="bi bi-cart cart-icon"></i>
                <span class="ms-2">Keranjang</span>
            </a>
            <!-- Profil Dropdown -->
            <div class="dropdown">
                <a class="d-flex align-items-center nav-item-link text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill user-icon"></i>
                    <span class="ms-2">Profil</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="profil.php">Lihat Profil</a></li>
                    <li><a class="dropdown-item" href="edit-profil.php">Edit Profil</a></li>
                </ul>
            </div>
            <!-- Logout -->
            <a href="logout.php" class="d-flex align-items-center nav-item-link text-danger">
                <i class="bi bi-box-arrow-right logout-icon"></i>
                <span class="ms-2">Logout</span>
            </a>
        </div>
    </div>
    
</nav>
    <!-- Banner Iklan -->
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <h5>Promo Spesial! Diskon 50% Untuk Produk Tertentu</h5>
                <p>Jangan lewatkan kesempatan ini! Belanja sekarang juga.</p>
            </div>
            <div class="carousel-item">
                <h5>Produk UMKM Desa Segar dan Berkualitas</h5>
                <p>Belanja produk lokal dengan kualitas terbaik dari desa.</p>
            </div>
            <div class="carousel-item">
                <h5>Gratis Ongkir untuk Pembelian di atas Rp 100.000</h5>
                <p>Nikmati kemudahan berbelanja tanpa biaya kirim!</p>
            </div>
        </div>
        <!-- Tombol Navigasi -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Produk Terbaru -->
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Produk Terbaru</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="col">
                    <div class="product-card">
                        <img src="<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama_produk']; ?>">
                        <div class="product-card-body">
                            <h5><?php echo $row['nama_produk']; ?></h5>
                            <p>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                            <a href="detail-produk.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
