<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    die('User ID tidak ditemukan di sesi. Pastikan pengguna sudah login.');
}

$user_id = $_SESSION['user_id'];

// Pastikan user_id ada di tabel users
$sql = "SELECT id FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    die('User ID tidak valid.');
}

// Anggap pembayaran berhasil untuk metode COD
$payment_success = true;

if ($payment_success) {
    // Simpan data pesanan ke database
    $order_id = uniqid();
    $total_amount = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total_amount += $item['price'] * $item['quantity'];
        $sql = "INSERT INTO orders (order_id, user_id, product_id, quantity, price) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssiis', $order_id, $user_id, $item['id'], $item['quantity'], $item['price']);
        if (!$stmt->execute()) {
            die('Error: ' . $stmt->error);
        }
    }

    // Kosongkan keranjang belanja
    unset($_SESSION['cart']);

    // Redirect ke halaman pesanan semua
    header("Location: /coffe-shop/pesanan_semua.php");
    exit();
} else {
    // Pop-up kesalahan dan redirect kembali ke halaman pembayaran
    echo '<script>alert("Terjadi kesalahan saat membuat pesanan. Silakan coba lagi."); window.location.href="/coffe-shop/index_pembayaran.php";</script>';
    exit();
}
?>
