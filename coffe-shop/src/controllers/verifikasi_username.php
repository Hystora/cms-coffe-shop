<?php
session_start();
require '../controllers/db_connection.php'; // Menghubungkan file koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];

    // Query untuk memeriksa username
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Username ditemukan, simpan di sesi dan arahkan ke halaman konfirmasi password
        $_SESSION['username'] = $username;
        // Gunakan path absolut untuk redirection
        header("Location: /coffe-shop/konfirmasi_katasandi.php");
        exit(); // Pastikan script berhenti setelah redirection
    } else {
        echo "Username tidak ditemukan";
    }
}

$conn->close();
?>
