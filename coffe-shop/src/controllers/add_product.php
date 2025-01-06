<?php
require 'C:\xampp\htdocs\coffe-shop\src\controllers\db_connection.php';
require 'C:\xampp\htdocs\coffe-shop\src\controllers\session.php';

$product_name = $_POST['product_name'];
$description = $_POST['description'];
$product_image = $_FILES['product_image']['name'];

$target_dir = "../../public/uploads/";
$target_file = $target_dir . basename($product_image);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Cek apakah file adalah gambar asli atau bukan
$check = getimagesize($_FILES['product_image']['tmp_name']);
if($check !== false) {
    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        $_SESSION['message'] = "Maaf, file sudah ada.";
    // Cek ukuran file
    } elseif ($_FILES['product_image']['size'] > 500000) {
        $_SESSION['message'] = "Maaf, file terlalu besar.";
    // Cek jenis file
    } elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $_SESSION['message'] = "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
    } else {
        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO products (name, description, image) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sss', $product_name, $description, $product_image);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Produk berhasil ditambahkan!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan saat menambahkan produk. Silakan coba lagi.";
            }

            $stmt->close();
        } else {
            $_SESSION['message'] = "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
} else {
    $_SESSION['message'] = "File bukan gambar.";
}

$conn->close();
header("Location: /coffe-shop/management.php");
exit();
?>
