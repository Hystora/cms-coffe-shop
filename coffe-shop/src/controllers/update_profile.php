<?php
session_start();
require '../controllers/db_connection.php'; // Menghubungkan ke database

$user_id = $_SESSION['user_id'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['alamat'];

if (!empty($user_id) && !empty($username) && !empty($phone) && !empty($email) && !empty($address)) {
    $sql = "UPDATE users SET username = ?, phone = ?, email = ?, address = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $username, $phone, $email, $address, $user_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Profil berhasil diperbarui!";
    } else {
        $_SESSION['message'] = "Terjadi kesalahan saat memperbarui profil. Silakan coba lagi.";
    }

    $stmt->close();
} else {
    $_SESSION['message'] = "Data tidak lengkap. Silakan lengkapi semua field.";
}

$conn->close();
header("Location: /coffe-shop/profil_saya.php");
exit();
?>
