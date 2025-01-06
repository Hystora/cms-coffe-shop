<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coffe Shop</title>
  <link rel="stylesheet" href="public\css\styles_HU.css" />
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
  <!-- BACKGROUND IMAGE START -->
      <h1>KOPI</h1>
      <button class="btn">
        <a href="menu_kopi.php">Shop Now</a>
      </button>
      <div class="wave">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
          <path fill="#EACDBD" fill-opacity="1" d="M0,128L60,122.7C120,117,240,107,360,112C480,117,600,139,720,160C840,181,960,203,1080,192C1200,181,1320,139,1380,117.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
        </svg>
      </div>
    </div>
  </section>
  <!-- BACKGROUND IMAGE END -->

  <!-- CATEGORY START -->
  <section id="category" class="category">
    <h2>Top Category On This Week</h2>
    <p>Jelajahi Kopi Terbaru Yang Paling Banyak Di Beli Minggu Ini </p>
    <div class="card">
      <!-- Card Item -->
      <div class="image">
        <img src="https://image.cermati.com/q_70/s8tg62yd8vzk7jpokxmo.webp" 
          alt="Mocha Coffee" />
        <div class="content">
          <h1>Coffee Cappucino</h1>
          <a href="menu.php">Show More</a>
        </div>
      </div>
      <!-- Card Item -->
      <div class="image">
        <img src="https://image.cermati.com/q_70/mpzhsg2rkglullzetayi.webp"
          alt="Cold Brew" />
        <div class="content">
          <h1>Cold Brew</h1>
          <a href="menu.php">Show More</a>
        </div>
      </div>
      <!-- Card Item -->
      <div class="image">
        <img src="https://image.cermati.com/q_70/rdhu7vncmu2ip8qdmlqj.webp"
          alt="Mocha Coffee" />
        <div class="content">
          <h1>Coffee Affogato</h1>
          <a href="menu.php">Show More</a>
          </div>
        </div>
      </div>
    </section>
    <!-- CATEGORY END -->

   <!-- PILIHAN KOPI START -->
<section id="pilihan-kopi" class="pilihan-kopi-container">
  <h2>Pilihan Kopi Terbaik</h2>
  <p>Jelajahi Kopi Terbaru Yang Paling Banyak Dibeli Minggu Ini</p>
  <div class="pilihan-kopi-cards">
    <!-- Card Item 1 -->
    <div class="pilihan-kopi-image">
      <img src="https://image.cermati.com/q_70/yrehzzpiwkjrfqdgspsp.webp" alt="Coffee Cappuccino" width="20"/>
      <div class="pilihan-kopi-content">
        <h1>Coffee Cappuccino</h1>
        <div class="pilihan-kopi-likes">
          <i class="fas fa-thumbs-up"></i> 30 Suka
        </div>
        <div id="pilihan-kopi-price">$20.00</div>
        <button class="pilihan-kopi-buy-button" ><a href="menu.php">BELI</a></button>
      </div>
    </div>
    <!-- Card Item 2 -->
    <div class="pilihan-kopi-image">
      <img src="https://image.cermati.com/q_70/uxktrs0bcntq7xizqzon.webp" alt="Iced Coffee" />
      <div class="pilihan-kopi-content">
        <h1>Iced Coffee</h1>
        <div class="pilihan-kopi-likes">
          <i class="fas fa-thumbs-up"></i> 30 Suka
        </div>
        <div class="pilihan-kopi-price">$20.00</div>
        <button class="pilihan-kopi-buy-button" ><a href="menu.php">BELI</a></button>
      </div>
    </div>
    <!-- Card Item 3 -->
    <div class="pilihan-kopi-image">
      <img src="https://static.republika.co.id/uploads/images/inpicture_slide/seni-di-atas-kopi-alias-latte-art-_160914181605-378.jpg" alt="Coffee Affogato" />
      <div class="pilihan-kopi-content">
        <h1>Coffee Mocha</h1>
        <div class="pilihan-kopi-likes">
          <i class="fas fa-thumbs-up"></i> 30 Suka
        </div>
        <div class="pilihan-kopi-price">$20.00</div>
        <button class="pilihan-kopi-buy-button" ><a href="menu.php">BELI</a></button>
      </div>
    </div>
    <!-- Card Item 4 -->
    <div class="pilihan-kopi-image">
      <img src="https://img.freepik.com/free-photo/hot-chocolate-with-milk-glass-jars_116380-45.jpg?t=st=1735294012~exp=1735297612~hmac=975387dd2064ca247c45b98d1543c98ac81d7546f6c59b6a219022dd7d7081b0&w=740" alt="Latte Coffee" />
      <div class="pilihan-kopi-content">
        <h1>Latte Coffee</h1>
        <div class="pilihan-kopi-likes">
          <i class="fas fa-thumbs-up"></i> 25 Suka
        </div>
        <div class="pilihan-kopi-price">$22.00</div>
        <button class="pilihan-kopi-buy-button" ><a href="menu.php">BELI</a></button>
      </div>
    </div>
  </div>
</section>

<div class="footer">
    Copyright © 2024 Coffe Shop. All Right Reserved.
</div>
  <!-- MILK SHAKE END -->

  <!-- BLOG START -->
  <section id="blog">
    <div class="blog">
      <div class="blog-content"></div>
    </div>
  </section>
  <!-- BLOG END -->

</body>

<script src="public\js\scriptHU.js"></script>

</html>
