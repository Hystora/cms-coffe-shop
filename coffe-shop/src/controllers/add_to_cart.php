<?php
session_start();
require 'db_connection.php';

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

// Menambahkan produk ke dalam keranjang
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$cart = $_SESSION['cart'];

// Cek apakah produk sudah ada di keranjang
$found = false;
foreach ($cart as &$item) {
    if ($item['id'] == $product_id) {
        $item['quantity'] += 1;
        $found = true;
        break;
    }
}

if (!$found) {
    $cart[] = $product;
}

$_SESSION['cart'] = $cart;

header("Location: /coffe-shop/index_keranjang.php");
exit();
?>
