<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda jika menggunakan selain root
$password = ""; // Biasanya kosong untuk kredensial default MySQL
$dbname = "banners"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset untuk mendukung karakter khusus
$conn->set_charset("utf8mb4");
?>
