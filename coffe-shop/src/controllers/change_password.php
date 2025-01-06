<?php
session_start();
require '../controllers/db_connection.php'; // Menghubungkan ke database

$user_id = $_SESSION['user_id'];
$new_password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (!empty($new_password) && $new_password === $confirm_password) {
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $hashed_password, $user_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Password berhasil diperbarui!";
    } else {
        $_SESSION['message'] = "Terjadi kesalahan saat memperbarui password. Silakan coba lagi.";
    }

    $stmt->close();
} else {
    $_SESSION['message'] = "Password tidak cocok atau kosong. Silakan coba lagi.";
}

$conn->close();
header("Location: /coffe-shop/profil_saya_pw.php");
exit();
?>
