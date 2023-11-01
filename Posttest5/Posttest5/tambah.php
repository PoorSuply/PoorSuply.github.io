<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $element = $_POST['element'];
    $path = $_POST['path'];
    $rarity = $_POST['rarity'];
    $release_date = $_POST['release_date'];
    $light_cone = $_POST['light_cone'];
    $description = $_POST['description'];

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = 'uploads/' . $image_name;

    move_uploaded_file($image_tmp, $image_path);

    $duplicateCheck = mysqli_query($conn, "SELECT * FROM banners WHERE name = '$name'");

    if (mysqli_num_rows($duplicateCheck) > 0) {
        echo "<script>alert('Banner dengan nama tersebut sudah ada.'); window.location='tambah.php';</script>";
    } else {
        $sql = "INSERT INTO banners (name, element, path, rarity, release_date, light_cone, description, image_name)
                VALUES ('$name', '$element', '$path', '$rarity', '$release_date', '$light_cone', '$description', '$image_name')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Banner berhasil ditambahkan.'); window.location='index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error: " . $conn->error . "'); window.location='tambah.php';</script>";
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Banner</title>
    <link rel="stylesheet" href="styletambah.css">
</head>
<body>
    <h2>Add Banner</h2>
    <form action="tambah.php" method="post" enctype="multipart/form-data">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Element: <input type="text" name="element"></label><br>
        <label>Path: <input type="text" name="path"></label><br>
        <label>Rarity: <input type="text" name="rarity"></label><br>
        <label>Release Date: <input type="date" name="release_date"></label><br>
        <label>Light Cone: <textarea name="light_cone"></textarea></label><br>
        <label>Description: <textarea name="description"></textarea></label><br>
        <label>Image: <input type="file" name="image"></label><br>
        <input type="submit" value="Add Banner">
    </form>
</body>
</html>
