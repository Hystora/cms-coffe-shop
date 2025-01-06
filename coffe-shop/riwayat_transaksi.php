<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coffee Shop</title>
  <link rel="stylesheet" href="public\css\riwayat_transaksi.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
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
              <li> <a href="indexHU.php">Home</a>
              <li> <a href="menu_kopi.php">Menu</a>
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
        
    <!-- Main Content -->
    <main>
      <section class="transaction-history">
        <h1>Riwayat Transaksi</h1>

        <!-- Riwayat Pembelian Terbaru -->
        <div class="new-history">
          <h3>Riwayat Pembelian Terbaru</h3>
          <div class="card-grid">
            <div class="card">
              <div class="placeholder"></div>
              <p>Nama Pembeli</p>
              <p>IDR00</p>
            </div>
            <div class="card">
              <div class="placeholder"></div>
              <p>Nama Pembeli</p>
              <p>IDR00</p>
            </div>
            <div class="card">
              <div class="placeholder"></div>
              <p>Nama Pembeli</p>
              <p>IDR00</p>
            </div>
          </div>
        </div>

        <!-- Produk Terlaris -->
        <h3>Terlaris</h3>
        <div class="card-grid">
          <div class="card">
            <div class="placeholder"></div>
            <p>Nama Produk</p>
            <p>Jumlah Terbeli</p>
          </div>
          <div class="card">
            <div class="placeholder"></div>
            <p>Nama Produk</p>
            <p>Jumlah Terbeli</p>
          </div>
          <div class="card">
            <div class="placeholder"></div>
            <p>Nama Produk</p>
            <p>Jumlah Terbeli</p>
          </div>
        </div>

        <!-- Statistik Riwayat Transaksi -->
        <section class="stats">
          <h3>Riwayat Transaksi</h3>
          <div class="stat-grid">
            <div>
              <h3>Total Transaksi Berhasil</h3>
              <p>00</p>
            </div>
            <div>
              <h3>Total Transaksi</h3>
              <p>IDR00</p>
            </div>
          </div>
        </section>
      </section>
    </main>

    <!-- Footer -->
    <footer>
      <p>Copyright © 2024 Coffee Shop. All Rights Reserved.</p>
    </footer>

    <script src="public\js\navbar.js"></script>

  </body>
</html>
