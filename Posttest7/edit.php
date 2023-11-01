<?php
require 'koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $banner_id = $_POST['banner_id'];
    $name = $_POST['name'];
    $element = $_POST['element'];
    $path = $_POST['path'];
    $rarity = $_POST['rarity'];
    $release_date = $_POST['release_date'];
    $light_cone = $_POST['light_cone'];
    $description = $_POST['description'];

    if ($_FILES['image']['size'] > 0) {
        $old_image_name = $_POST['old_image_name'];
        unlink("uploads/$old_image_name");

        $new_image_name = $_FILES['image']['name'];
        $new_image_tmp = $_FILES['image']['tmp_name'];
        $new_image_path = 'uploads/' . $new_image_name;

        move_uploaded_file($new_image_tmp, $new_image_path);

        $sql = "UPDATE banners SET name='$name', element='$element', path='$path', rarity='$rarity', release_date='$release_date', light_cone='$light_cone', description='$description', image_name='$new_image_name' WHERE id=$banner_id";
    } else {
        $sql = "UPDATE banners SET name='$name', element='$element', path='$path', rarity='$rarity', release_date='$release_date', light_cone='$light_cone', description='$description' WHERE id=$banner_id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $banner_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM banners WHERE id=$banner_id");

    if ($result->num_rows > 0) {
        $banner = $result->fetch_assoc();
    } else {
        echo "Banner tidak ditemukan.";
        exit();
    }
} else {
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Banner</title>
    <link rel="stylesheet" href="styleedit.css">
</head>
<body>
    <h2>Edit Banner</h2>
    <form action="edit.php" method="post" enctype="multipart/form-data" onsubmit="showAlert()">
        <input type="hidden" name="banner_id" value="<?php echo $banner['id']; ?>">
        <input type="hidden" name="old_image_name" value="<?php echo $banner['image_name']; ?>">

        <label>Name: <input type="text" name="name" value="<?php echo $banner['name']; ?>" required></label><br>
        <label>Element: <input type="text" name="element" value="<?php echo $banner['element']; ?>"></label><br>
        <label>Path: <input type="text" name="path" value="<?php echo $banner['path']; ?>"></label><br>
        <label>Rarity: <input type="text" name="rarity" value="<?php echo $banner['rarity']; ?>"></label><br>
        <label>Release Date: <input type="date" name="release_date" value="<?php echo $banner['release_date']; ?>"></label><br>
        <label>Light Cone: <textarea name="light_cone"><?php echo $banner['light_cone']; ?></textarea></label><br>
        <label>Description: <textarea name="description"><?php echo $banner['description']; ?></textarea></label><br>
        <label>Image: <input type="file" name="image"></label><br>
        <input type="submit" value="Update Banner">
    </form>

    <script>
        function showAlert() {
            alert("Banner successfully updated!");
        }
    </script>
</body>
</html>
