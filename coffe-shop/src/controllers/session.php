<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function checkAdmin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: /coffe-shop/indexHU.php"); // Redirect ke halaman utama jika bukan admin
        exit();
    }
}

function checkUser() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
        header("Location: /coffe-shop/indexHU.php"); // Redirect ke halaman utama jika bukan user
        exit();
    }
}
?>
