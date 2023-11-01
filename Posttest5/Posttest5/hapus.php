<?php
include 'koneksi.php';


if (isset($_GET['id'])) {
    $banner_id = $_GET['id'];

    $result = $conn->query("SELECT image_name FROM banners WHERE id=$banner_id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image_name = $row['image_name'];

        unlink("uploads/$image_name");
        
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
