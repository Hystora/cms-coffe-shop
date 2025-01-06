<?php
/**
 * @file register.php
 * @description PHP untuk registrasi pengguna baru dan menyimpan data di database. Setiap pengguna baru akan mendapatkan role 'user' secara default.
 * @date 29 Desember 2024
 */

require '../controllers/db_connection.php'; // Menghubungkan ke database

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password untuk keamanan
$address = $_POST['alamat'];
$phone = $_POST['handphone'];
$email = $_POST['email'];
$role = 'user'; // Set role menjadi 'user'

// Cek apakah email sudah terdaftar
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Email sudah terdaftar!";
} else {
    // Menambahkan pengguna baru ke database
    $sql = "INSERT INTO users (username, email, password, address, phone, role) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $username, $email, $password, $address, $phone, $role);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Pendaftaran berhasil!";
    } else {
        echo "Terjadi kesalahan saat mendaftar. Silakan coba lagi.";
    }
}

$stmt->close();
$conn->close();
?>
