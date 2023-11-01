<?php
require 'koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

$banners = [];

$result = $conn->query("SELECT * FROM banners");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $banners[] = $row;
    }
}

function displayBanner($banner)
{
    $lastModified = date("Y-m-d H:i:s", filemtime(__FILE__));
    echo '<div class="banner" id="banner_' . $banner['id'] . '">
            <div class="banner-wrapper">

                <img src="uploads/' . $banner['image_name'] . '" alt="' . $banner['name'] . '" class="banner-image">
                <div class="banner-description">
                    <h2>' . $banner['name'] . '</h2>
                    <p>' . $banner['description'] . '</p>
                    <table>
                        <tr>
                            <th>Element</th>
                            <td> : ' . $banner ['element'] . '</td>
                        </tr>
                        <tr>
                            <th>Path</th>
                            <td> : ' . $banner['path'] . '</td>
                        </tr>
                        <tr>
                            <th>Rarity</th>
                            <td> : ' . $banner['rarity'] . '</td>
                        </tr>
                        <tr>
                            <th>Release Date</th>
                            <td> : ' . $banner['release_date'] . '</td>
                        </tr>
                        <tr>
                            <th>Light Cone</th>
                            <td> : ' . $banner['light_cone'] . '</td>
                        </tr>
                        <tr>
                            <th>Last Modified</th>
                            <td> : '. $lastModified . '</td>
                        </tr>
                    </table>
                    <div class="banner-actions">
                        <a href="edit.php?id=' . $banner['id'] . '">
                            <button>Edit</button>
                        </a>
                        <a href="javascript:void(0);" onclick="deleteBanner(' . $banner['id'] . ')">
                            <button>Delete</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honkai Star Rail Spanduk</title>
    <link rel="stylesheet" href="1.css">
</head>
<body class="back">
    <nav class="header">
        <div class="logo">
            <img src="Honkai_Star_Rail.webp" alt="Logo">
        </div>
        <div class="title">
            <p>MY LEAKS</p>
        </div>
        <div class="nav-text">
            <a href="#home">Home</a>
            <a href="#about-me">About Me</a>
        </div>
        <div class="nav-buttons">
            <a href="tambah.php">
                <button>Add Banner</button>
            </a>
             <form class="log" method="post">
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>
        <img src="light_mode_FILL0_wght400_GRAD0_opsz24.png" id="icon">
    </nav>

    <section id="home" class="body-content">    
        <?php
        foreach ($banners as $banner) {
            displayBanner($banner);
        }
        ?>
    </section>

    <footer class="footer" id="about-me">
        <div class="footer-content">
            <div class="about-me-content">
                <h1>ABOUT ME</h1>
                <h2 id="name">Alianur</h2>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; <span id="year"><?php echo date("Y"); ?></span> My Leaks. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>
