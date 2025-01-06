<?php
/**
 * @file login.php
 * @description PHP untuk memverifikasi pengguna yang login dan membuat sesi pengguna jika login berhasil. Pengguna akan diarahkan ke halaman indexHU.php jika login berhasil.
 * @date 30 Desember 2024
 */

session_start();
require '../controllers/db_connection.php'; // Menghubungkan ke database

$email = $_POST['username'];
$password = $_POST['password'];

// Ambil data pengguna dari database berdasarkan email
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

// Memeriksa apakah pengguna ditemukan
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        // Membuat sesi pengguna jika login berhasil
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];  // Menyimpan role di sesi
        // Redirect ke halaman indexHU.php
        header('Location: ../../indexHU.php');
        exit();
    } else {
        // Redirect kembali ke halaman login dengan pesan error
        header('Location: ../../masuk_pbl.html?error=wrong_password');
        exit();
    }
} else {
    // Redirect kembali ke halaman login dengan pesan error
    header('Location: ../../masuk_pbl.html?error=user_not_found');
    exit();
}

// Menutup prepared statement dan koneksi
$stmt->close();
$conn->close();
?>
