<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffe Shop</title>
    <!-- Link ke CSS untuk halaman profil_saya -->
    <link rel="stylesheet" href="public\css\profil_saya.css" />
    <!-- Link ke Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Link ke font Poppins dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
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
   
  <!-- UPPER SVG (Bagian atas dengan kurva) -->
  <section class="hero">
    <div class="curve">
      <div class="upper">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300">
          <path fill="#EACDBD" fill-opacity="1" d="M0,160L80,149.3C160,139,320,117,480,133.3C640,149,800,203,960,218.7C1120,235,1280,213,1360,202.7L1440,192L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
        </svg>
      </div>
    </div>

        <!-- Konten Profil Saya -->
        <div class="container">
            <main class="profile-content">
                <!-- Konten Profil Kiri -->
                <div class="left-content">
                    <img src="public\images\profil.png" alt="Profile Picture" class="profile-picture">
                    <p class="name">Nama</p>

                    <hr class="divider">

                    <a href="profil_saya.php">Akun Saya</a>
                    <ul>
                        <li><a href="profil_saya.php" class="active">Profil</a></li>
                        <li><a href="profil_saya_pw.php">Ubah Password</a></li>
                    </ul>
                    <a href="pesanan_semua.php">Pesanan</a>
                </div>

                <!-- Konten Utama (Form Profil Saya) -->
                <div class="profile-details">
                    <h2>Profil Saya</h2>
                    <form id="profile-form" action="src/controllers/update_profile.php" method="post">
                        <!-- Input untuk Nama Pengguna -->
                        <label for="username">Nama Pengguna</label>
                        <input type="text" id="username" name="username" placeholder="Masukkan nama pengguna" disabled>

                        <!-- Input untuk Nomor Ponsel -->
                        <label for="phone">Nomor Ponsel</label>
                        <input type="text" id="phone" name="phone" placeholder="Masukkan nomor ponsel" disabled>

                        <!-- Input untuk Email -->
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email" disabled>

                        <!-- Input untuk Alamat -->
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat" disabled>

                        <div class="button-group">
                            <!-- Tombol Ubah -->
                            <button type="button" id="edit-btn">Ubah</button>
                            <!-- Tombol Konfirmasi -->
                            <button type="submit" type="submit" id="confirm-btn" disabled>Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer>
            <p>Copyright © 2024 Coffee Shop. All Rights Reserved.</p>
        </footer>

        <!-- Script untuk Navbar -->
        <script src="public\js\profile_saya.js"></script>
        <script src="public\js\navbar.js"></script>

</body>

</html>
