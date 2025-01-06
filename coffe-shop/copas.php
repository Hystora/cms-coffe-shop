<!DOCTYPE html>
<html lang="en">

<head>
    <!-- METADATA START -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffe Shop</title>
    <!-- METADATA END -->

    <!-- STYLESHEET START -->
    <link rel="stylesheet" href="public\css\menu_kopi.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- STYLESHEET END -->
</head>

<body>
    <!-- NAVBAR START -->
    <header class="header" id="navbar">
      <nav class="navbar">
        <div class="navbar-content">
          <div> <!--Logo-->
            <img id="logo" class="logo" src="https://mediaresource.sfo2.digitaloceanspaces.com/wp-content/uploads/2024/04/28114909/coffee-logo-3D5CE1AC6E-seeklogo.com.png" width="35" height="60" alt="Logo Coffee Shop"/>
          </div>
          <div class="box">
            <ul>
              <li><a href="indexHU.php">Home</a></li>
              <li><a href="menu_kopi.php">Menu</a></li>
            </ul>
            
            <!-- Grup untuk ikon keranjang, ikon profil, dan pencarian -->
            <div class="icons-group">
              <!-- Kolom Pencarian -->
              <input type="text" id="input" class="input" placeholder="Search..." />
              <button id="KolomPencarian" class="trigger_search" type="button">
                <i class="fa fa-search icon"></i>
              </button>

              <!-- Ikon Keranjang -->
              <button class="btn-light">
                <a href="index_keranjang.php" class="keranjang">
                 <i class="bi bi-cart" id="keranjang-icon"></i>
                 </a>
              </button>

              <!-- Ikon Profil -->
              <div class="admin-container">
                <i id="profile-icon"></i>
                <div class="dropdown">
                    <div class="admin-button">
                        <div class="circle"></div>
                        <span>admin</span>
                    </div>
                        <!-- Dropdown Content -->
                <div class="dropdown-content">
                <a href="profil_saya.php">Akun Saya</a>
                <a href="pesanan_semua.php">Pesanan Saya</a>
                 <!-- Tampilkan link ini hanya untuk admin -->
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                  <a href="management.php">Manajemen Konten</a>
                  <a href="riwayat_transaksi.php">Histori Transaksi</a>
                  <a href="riwayat_pengunjung.php">Histori Pengunjung</a>
                <?php endif; ?>
                <a href="masuk_pbl.html">Keluar</a>
                </div>
                    </div>
                </div>
              </div>
    </header>
    <!-- NAVBAR END -->

    <!-- UPPER SVG -->
    <section class="hero">
      <div class="curve">
        <div class="upper">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300">
            <path fill="#EACDBD" fill-opacity="1" d="M0,160L80,149.3C160,139,320,117,480,133.3C640,149,800,203,960,218.7C1120,235,1280,213,1360,202.7L1440,192L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
          </svg>
        </div>
  

            <!-- BREADCRUMB START -->
            <div class="breadcrumb">
                <p><a href="indexHU.php">Halaman Utama</a> > <a href="menu_kopi.php">Menu</a></p>
            </div>
            <!-- BREADCRUMB END -->

            <!-- MAIN CONTENT START -->
            <main>
                <h1>BELI KOPI ANDA</h1>
                <!-- FILTER INFO START -->
                <div class="filter-info">
                    <p>12 Produk</p>
                    <div class="filter-info">
                        <label for="filter">Filter:</label>
                        <select id="filter" name="filter">
                            <option value="terlama">Terlama</option>
                            <option value="terbaru">Terbaru</option>
                        </select>
                    </div>
                </div>
                <!-- FILTER INFO END -->

                <!-- PRODUCT GRID START -->
        <div class="product-grid">
            <?php
            require 'src/controllers/db_connection.php';

            $filter = isset($_GET['filter']) ? $_GET['filter'] : 'terbaru';
            
            if ($filter == 'terlama') {
                $sql = "SELECT * FROM products ORDER BY created_at ASC";
            } else {
                $sql = "SELECT * FROM products ORDER BY created_at DESC";
            }

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="product-card">
                    <div class="badge">Terlaris</div>
                    <a href="menu.php?id=' . $row['id'] . '">
                        <img src="/coffe-shop/public/uploads/' . $row['image'] . '" alt="Product Image">
                    </a>
                    <h2>' . htmlspecialchars($row['name']) . '</h2>
                    <p class="price">$' . htmlspecialchars($row['price']) . '</p>
                </div>
                ';
            }

            $conn->close();
            ?>
        </div>
                <!-- PRODUCT GRID END -->
            </main>
            <!-- MAIN CONTENT END -->

            <!-- FOOTER START -->
            <footer>
                <p>&copy; 2024 Coffee Shop. All Rights Reserved.</p>
            </footer>
            <!-- FOOTER END -->
        </div>
    </section>
    <!-- HERO SECTION END -->

    <!-- SCRIPTS START -->
    <script src="public\js\filter.js"></script>
    <script src="public\js\navbar.js"></script>
    <!-- SCRIPTS END -->
</body>

</html>
