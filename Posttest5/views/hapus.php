<?php
include 'koneksi.php';  // Sesuaikan dengan file koneksi.php Anda.

// Ambil ID banner yang akan dihapus
if (isset($_GET['id'])) {
    $banner_id = $_GET['id'];

    // Ambil nama file gambar untuk dihapus dari direktori "uploads"
    $result = $conn->query("SELECT image_name FROM banners WHERE id=$banner_id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image_name = $row['image_name'];

        // Hapus gambar dari direktori "uploads"
        unlink("uploads/$image_name");

        // Hapus data banner dari database
        $sql = "DELETE FROM banners WHERE id=$banner_id";

        if ($conn->query($sql) === TRUE) {
            echo "Banner berhasil dihapus.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Banner tidak ditemukan.";
    }
} else {
    echo "ID Banner tidak diberikan.";
}
?>
