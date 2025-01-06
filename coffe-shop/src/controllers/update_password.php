<?php
session_start();
require '../controllers/db_connection.php'; // Menghubungkan file koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $username = $_SESSION['username']; // Pastikan username disimpan di sesi

    // Periksa apakah password dan konfirmasi password sama
    if ($new_password === $confirm_password) {
        // Hash password baru untuk keamanan
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password di database
        $sql = "UPDATE users SET password='$hashed_password' WHERE username='$username'";

        if ($conn->query($sql) === TRUE) {
            echo "Password berhasil diubah";
            header("Location: /coffe-shop/masuk_pbl.html");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Password dan konfirmasi password tidak sama";
    }
}

$conn->close();
?>