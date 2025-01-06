<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title>Coffe Shop</title>
  <link rel="stylesheet" href="public\css\styles_keranjang.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- Link ke Bootstrap Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
  
  <aside class="sidebar">
    <img alt="User Profile Picture" height="50" src="https://storage.googleapis.com/a1aa/image/YURWdIGORpIzE9Nrd5jt0CdFCOtaRYSycxfzhtj5ko14uhfTA.jpg" width="50"/>
    <p>Nama</p>
    <hr/>
    <h3>Akun Saya</h3>
    <a href="profil_saya.php">Profil</a>
    <a href="profil_saya_pw.php">Ubah Password</a>
    <h3><a href="pesanan_semua.php">Pesanan Saya</a></h3>
  </aside>

  <main class="content">
    <div class="tabs">
      <div class="active">Semua</div>
    </div>
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            echo '
            <div class="order">
                <div class="details">
                    <div class="info">
                        <img alt="' . htmlspecialchars($item['name']) . ' Image" height="50" src="/coffe-shop/public/uploads/' . htmlspecialchars($item['image']) . '" width="50"/>
                        <div>
                            <h4>' . htmlspecialchars($item['name']) . '</h4>
                            <p>Total Pesanan: $' . htmlspecialchars($item['price']) . '</p>
                        </div>
                    </div>
                    <div class="status">
                        <p>Jumlah: ' . htmlspecialchars($item['quantity']) . '</p>
                        <form action="src/controllers/remove_from_cart.php" method="post">
                            <input type="hidden" name="product_id" value="' . htmlspecialchars($item['id']) . '">
                            <button type="submit" class="btn-remove">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            ';
        }
    } else {
        echo '<p>Keranjang kamu kosong.</p>';
    }
    ?>
  </main>


<!-- Footer Section -->
<div class="footer">
  Copyright © 2024 Coffee Shop. All Right Reserved. <!-- Footer Copyright -->
</div>

</body>

<script src="public\js\script_keranjang.js"></script>

</html>