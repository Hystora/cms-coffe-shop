<?php
session_start();
require 'src/controllers/db_connection.php';

// Mendapatkan informasi pengguna dari database
$user_id = $_SESSION['user_id']; // Asumsikan user_id disimpan dalam sesi setelah login
$sql = "SELECT username, phone, address FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title>Coffe Shop</title>
  <link rel="stylesheet" href="public\css\pembayaran_styles.css" />
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

        <!-- Kontainer utama untuk semua konten -->
  <div class="container">
    <!-- Judul utama halaman -->
    <h1>Pembayaran</h1>
    
    <!-- Section untuk menampilkan alamat pengiriman -->
    <div class="address section">
      <h2><i class="fas fa-map-marker-alt"></i> Alamat Pengiriman</h2>
      <p><?php echo htmlspecialchars($user['username']); ?> (<?php echo htmlspecialchars($user['phone']); ?>)</p>
      <p><?php echo htmlspecialchars($user['address']); ?></p>
      <button class="edit-btn" onclick="window.location.href='pengaturan_akun.php'">Ganti</button>
    </div>
    
    <!-- Section untuk menampilkan produk yang dipesan -->
    <div class="product section">
      <h2>Produk Dipesan</h2>
      <?php
      if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $item) {
              echo '
              <div class="details">
                  <img alt="' . htmlspecialchars($item['name']) . ' Image" height="50" src="/coffe-shop/public/uploads/' . htmlspecialchars($item['image']) . '" width="50"/>
                  <div>
                      <p>' . htmlspecialchars($item['name']) . '</p>
                  </div>
                  <div>
                      <p>Satuan Harga</p>
                      <p>$' . htmlspecialchars($item['price']) . '</p>
                  </div>
                  <div>
                      <p>Jumlah</p>
                      <p>' . htmlspecialchars($item['quantity']) . '</p>
                  </div>
                  <div>
                      <p>Subtotal Produk</p>
                      <p>$' . htmlspecialchars($item['price'] * $item['quantity']) . '</p>
                  </div>
              </div>
              ';
          }
      } else {
          echo '<p>Keranjang kamu kosong.</p>';
      }
      ?>
    </div>
 
    <!-- Section untuk memilih opsi pengiriman -->
    <div class="shipping section">
     <h2>Opsi Pengiriman :</h2>
     <p>Regular</p>
     <p>Estimasi: Oct 2 - 4</p>
     <p>$000000</p>
     <button class="edit-btn">Ganti</button>
    </div>
 
    <!-- Section untuk menambah catatan -->
    <div class="note section">
     <h2>Catatan :</h2>
     <textarea rows="3">Thanks...</textarea>
    </div>
 
    <!-- Section untuk memilih metode pembayaran -->
    <div class="payment-method section">
      <h2>Metode Pembayaran</h2>
      <button>COD</button>
    </div>
 
    <!-- Section untuk menampilkan ringkasan pembayaran -->
    <div class="summary section">
      <?php
      $total_price = 0;
      if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $item) {
              $total_price += $item['price'] * $item['quantity'];
          }
      }
      ?>
      <p>Subtotal Produk $<?php echo htmlspecialchars($total_price); ?></p>
      <p>Total Biaya Pengiriman $000000</p>
      <p>Total Pembayaran $<?php echo htmlspecialchars($total_price); ?></p>
      <button class="order-btn" onclick="window.location.href='src/controllers/process_order.php'">Buat Pesanan</button>
    </div>
  </div>
   
  <!-- Footer Section -->
<div class="footer">
  Copyright © 2024 Coffee Shop. All Right Reserved. <!-- Footer Copyright -->
</div>

</body>

<script src="public\js\pembayaran.js"></script>

</html>