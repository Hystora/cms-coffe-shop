<?php
session_start();
require '../controllers/db_connection.php'; // Menghubungkan ke database

$user_id = $_SESSION['user_id'];

// Mengambil data pengguna dari database
$sql = "SELECT username, email, phone, address FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($user);
?>
