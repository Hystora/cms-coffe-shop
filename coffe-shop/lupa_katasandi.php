<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> <!-- Mengatur karakter set halaman menjadi UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan responsif pada perangkat mobile -->
    <title>PBL</title> <!-- Judul halaman -->
    <link rel="stylesheet" href="public\css\lupa_katasandi.css"> <!-- Menghubungkan file CSS eksternal -->
</head>

<body>
    <!-- Overlay - Menutupi seluruh halaman untuk fokus pada form -->
    <div class="overlay">
        <!-- Form Container - Tempat form berada -->
        <div class="form-container">
            <h2>Lupa kata sandi?</h2> <!-- Judul form -->
            <p>Masukkan nama pengguna anda</p> <!-- Instruksi untuk pengguna -->
            <!-- Form - Menangani input nama pengguna -->
            <form action="src/controllers/verifikasi_username.php" method="post">
                <label for="username">Nama Pengguna</label> <!-- Label untuk input nama pengguna -->
                <input type="text" id="username" name="username" placeholder="Masukkan nama pengguna" required> <!-- Input untuk nama pengguna -->

                <button type="submit">kirim</button> <!-- Tombol kirim form -->
            </form>
        </div>
    </div>
</body>

</html>
