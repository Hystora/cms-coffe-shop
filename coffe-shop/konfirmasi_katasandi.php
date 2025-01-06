<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBL</title>
    <link rel="stylesheet" href="public\css\konfirmasi_katasandi.css"> <!-- Menghubungkan file CSS untuk styling -->
</head>

<body>
    <div class="overlay"> <!-- Overlay yang menutupi seluruh halaman untuk menyorot form -->
        <div class="form-container"> <!-- Container untuk form, memberi gaya pada form -->
            <h2>Atur kata sandi baru anda</h2> <!-- Judul form, memberi informasi kepada pengguna tentang tujuan form -->
            <form action="src/controllers/update_password.php" method="post"> <!-- Form untuk mengatur kata sandi baru, action menentukan URL pengolahan form -->
                
                <!-- Label untuk input kata sandi -->
                <label for="password">Kata sandi</label> 
                <!-- Input untuk kata sandi baru, tipe password untuk menyembunyikan teks yang dimasukkan -->
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi baru" required> 
                
                <!-- Label untuk input konfirmasi kata sandi -->
                <label for="confirm-password">Konfirmasi kata sandi</label> 
                <!-- Input untuk konfirmasi kata sandi, tipe password untuk menyembunyikan teks yang dimasukkan -->
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Masukkan kata sandi konfirmasi" required> 
                
                <!-- Tombol untuk mengirimkan form -->
                <button type="submit">Konfirmasi</button> 
            </form>
        </div>
    </div>
</body>

</html>
