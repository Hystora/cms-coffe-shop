<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title>Coffe Shop</title>
  <link rel="stylesheet" href="public\css\manag_styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">   
  <!-- Link ke Bootstrap Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    #product_image {
      display: none;
    }

    .alert {
            color: red;
            font-weight: bold;
        }
    
    .product-item .product-image {
      width: 100%;
      height: 100%;
      object-fit: cover; /* Memotong gambar agar sesuai dengan kotak */
      border-radius: 10px; /* Menambahkan border radius jika diperlukan */
    }

  </style>
</head>
<body>
<?php
    require 'src/controllers/session.php';
    checkAdmin();
    require 'src/controllers/db_connection.php';
    ?>

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

  <!--MAIN CONTENT-->
  <div class="container">
    <div class="judul">Manajemen Konten</div>
    <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="alert">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
        }
        ?>
        <form id="product-form" action="src/controllers/add_product.php" method="post" enctype="multipart/form-data">
            <div class="content-management">
                <label for="product_image" class="add-icon">+</label>
                <input type="file" id="product_image" name="product_image" accept="image/*" required>
                <div>
                    <input type="text" class="product-name" name="product_name" placeholder="Masukkan nama produk" required>
                </div>
            </div>
            <textarea class="description" name="description" rows="4" placeholder="Deskripsi produk" required></textarea>
            <button class="add-button" type="submit">Tambah</button>
        </form>
    <div class="divider"></div>
    <div class="product-history">Riwayat Produk</div>
    <div class="product-grid">
        <?php
            require 'src/controllers/db_connection.php';
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="product-item" data-id="' . $row['id'] . '">
                    <div class="options">
                        <span class="edit-btn" data-id="' . $row['id'] . '">Edit</span>
                        <span class="delete-btn" data-id="' . $row['id'] . '">Hapus</span>
                    </div>
                    <img src="/coffe-shop/public/uploads/' . $row['image'] . '" alt="Product Image" class="product-image">
                    <input type="text" class="product-name" value="' . $row['name'] . '" disabled>
                    <textarea class="description" rows="4" disabled>' . $row['description'] . '</textarea>
                </div>
                ';
            }
            $conn->close();
            ?>
      </div>
      <!-- Footer Section -->
    <div class="footer">
      Copyright © 2024 Coffee Shop. All Right Reserved. <!-- Footer Copyright -->
    </div>
    <script src="public\js\manag_script.js"></script>
    <script src="public\js\editdelete.js"></script>
</body>
</html>