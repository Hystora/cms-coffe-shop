<?php
session_start();

// Mendapatkan ID produk dari form
$product_id = $_POST['product_id'];

// Menghapus produk dari keranjang
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    foreach ($cart as $key => $item) {
        if ($item['id'] == $product_id) {
            unset($cart[$key]);
            break;
        }
    }
    $_SESSION['cart'] = $cart;
}

header("Location: /coffe-shop/index_keranjang.php");
exit();
?>
