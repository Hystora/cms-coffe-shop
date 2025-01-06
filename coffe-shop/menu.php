<!DOCTYPE html>
<html lang="en">

<head>
  <!-- METADATA START -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coffe Shop</title>
  <!-- METADATA END -->

  <!-- STYLESHEET START -->
  <link rel="stylesheet" href="public\css\menu_styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- STYLESHEET END -->
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


      <?php
      require 'src/controllers/db_connection.php';

      // Mendapatkan ID produk dari URL
      $product_id = $_GET['id'];

      // Mengambil detail produk dari database
      $sql = "SELECT * FROM products WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $product_id);
      $stmt->execute();
      $result = $stmt->get_result();
      $product = $result->fetch_assoc();

      $stmt->close();
      $conn->close();
      
      // Menetapkan harga default jika tidak ada harga
      $product_price = isset($product['price']) ? $product['price'] : 0;
      ?>

      <!-- Breadcrumb -->
      <div class="breadcrumb">
          <p><a href="indexHU.php">Halaman Utama</a> > <a href="menu_kopi.php">Menu</a> > <?php echo $product['name']; ?></p>
      </div>

    <!-- Product Section -->
    <main>
        <div class="product-container">
            <!-- Gambar Produk -->
            <div class="product-image">
                <img src="/coffe-shop/public/uploads/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            </div>
            <!-- Detail Produk -->
            <div class="product-details">
                <h1><?php echo $product['name']; ?></h1>
                <p class="sku">SKU : <?php echo $product['id']; ?></p>
                <p class="price">$<?php echo $product_price; ?></p>
                <p class="description"><?php echo $product['description']; ?></p>
                <!-- Kontrol Jumlah -->
                <div class="quantity">
                    <p>Jumlah :</p>
                    <div class="quantity-controls">
                        <button class="btn-quantity" id="decrease">-</button>
                        <span id="quantity">1</span>
                        <button class="btn-quantity" id="increase">+</button>
                    </div>
                </div>
                <!-- Tombol untuk menambahkan ke keranjang atau membeli -->
                <div class="buttons">
                    <form id="addToCartForm" action="src/controllers/add_to_cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $product['image']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
                        <button type="submit" class="btn-cart">Tambahkan Ke Keranjang</button>
                    </form>
                    <button id="buyNowButton" class="btn-buy">Beli Sekarang</button>
                </div>
            </div>
        </div>
    </main>


      <!-- Footer -->
      <footer>
        <p>Copyright © 2024 Coffee Shop. All Right Reserved.</p>
      </footer>
    </div>

    <script src="public\js\navbar.js"></script>
    <script src="public\js\quantity-controls.js"></script>
    <script>
        document.getElementById('buyNowButton').addEventListener('click', function() {
            // Tambahkan produk ke keranjang dan arahkan ke halaman pembayaran
            const form = document.getElementById('addToCartForm');
            form.action = 'src/controllers/buy_now.php';
            form.submit();
        });
    </script>

</body>

</html>