<?php
/**
 * @file db_connection.php
 * @description Koneksi ke database MySQL menggunakan MySQLi. File ini di-include di semua file PHP yang membutuhkan koneksi database.
 * @date 29 Desember 2024
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_shop_db";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
