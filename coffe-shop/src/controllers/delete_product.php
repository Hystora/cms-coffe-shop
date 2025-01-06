<?php
require __DIR__ . '/../controllers/db_connection.php';
require __DIR__ . '/../controllers/session.php';

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Hapus data terkait di tabel orders
    $sql_delete_related = "DELETE FROM orders WHERE product_id = ?";
    $stmt_delete_related = $conn->prepare($sql_delete_related);
    $stmt_delete_related->bind_param('i', $product_id);
    $stmt_delete_related->execute();

    // Hapus data di tabel products
    $sql_delete_product = "DELETE FROM products WHERE id = ?";
    $stmt_delete_product = $conn->prepare($sql_delete_product);
    $stmt_delete_product->bind_param('i', $product_id);

    if ($stmt_delete_product->execute()) {
        echo "Produk berhasil dihapus"; // Debugging
        $_SESSION['message'] = "Produk berhasil dihapus!";
    } else {
        echo "Error: " . $stmt_delete_product->error; // Debugging
        $_SESSION['message'] = "Terjadi kesalahan saat menghapus produk. Silakan coba lagi.";
    }

    $stmt_delete_product->close();
    $conn->close();
} else {
    echo "Tidak ada produk yang dipilih untuk dihapus"; // Debugging
    $_SESSION['message'] = "Tidak ada produk yang dipilih untuk dihapus.";
}
