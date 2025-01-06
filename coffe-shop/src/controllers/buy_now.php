<?php
session_start();
require 'db_connection.php';

// Kosongkan keranjang untuk pembelian baru
$_SESSION['cart'] = [];

// Mendapatkan data produk dari form
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_image = $_POST['product_image'];
$product_price = $_POST['product_price'] ?? 0;

// Membuat item produk
$product = array(
    'id' => $product_id,
    'name' => $product_name,
    'image' => $product_image,
    'price' => $product_price,
    'quantity' => 1
);

// Tambahkan produk ke dalam keranjang
$_SESSION['cart'][] = $product;

header("Location: /coffe-shop/index_pembayaran.php");
exit();
?>
