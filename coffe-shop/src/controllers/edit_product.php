<?php
require 'C:\xampp\htdocs\coffe-shop\src\controllers\db_connection.php';
require 'C:\xampp\htdocs\coffe-shop\src\controllers\session.php';

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$description = $_POST['description'];

$sql = "UPDATE products SET name = ?, description = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssi', $product_name, $description, $product_id);

if ($stmt->execute()) {
    $_SESSION['message'] = "Produk berhasil diperbarui!";
} else {
    $_SESSION['message'] = "Terjadi kesalahan saat memperbarui produk. Silakan coba lagi.";
}

$stmt->close();
$conn->close();
header("Location: /coffe-shop/management.php");
exit();
?>
