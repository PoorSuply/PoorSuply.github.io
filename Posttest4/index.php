<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honkai Star Rail Spanduk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dark-mode">
    <nav class="header">
        <div class="logo">
            <img src="Honkai_Star_Rail.webp" alt="Logo">
        </div>
        <div class="tittle">
            <p>MY LEAKS</p>
        </div>
        <div class="nav_teks">
            <a href="#beranda">Beranda</a>
            <a href="#about-me">About Me</a>
        </div>
        <img src="light_mode_FILL0_wght400_GRAD0_opsz24.png" id="icon">
    </nav>

    <div class="container">
        <?php
        $banners = [
            [
                'image' => 'show.png',
                'name' => 'Jingliu',
                'element' => 'Ice',
                'path' => 'Destruction',
                'rarity' => '★★★★★',
                'release_date' => '11 Oktober 2023',
                'light_cone' => 'This Body Is Sword',
                'description' => 'jingliu memiliki keunikan yaitu dapat mengkonsumsi darah tim  untuk buff damage dirinya'
            ],
            [
                'image' => 'topaz.png',
                'name' => 'Topaz',
                'element' => 'Fire',
                'path' => 'Hunt',
                'rarity' => '★★★★★',
                'release_date' => '1 November 2023',
                'light_cone' => 'Annoyed And Happy',
                'description' => 'Topaz adalah character DPS dengan tipe follow up attack'
            ],
            [
                'image' => 'Character_Huohuo_Introduction.webp',
                'name' => 'Huo Huo',
                'element' => 'Wind',
                'path' => 'Abudance',
                'rarity' => '★★★★★',
                'release_date' => '22 November 2023',
                'light_cone' => 'Belum Diketahui',
                'description' => 'Huo Huo adalah character Healer yang dapat memberikan buff attack pada tim'
            ],
        ];

        function displayBanner($banner)
        {
            $modeClass = (isset($_COOKIE['dark-mode']) && $_COOKIE['dark-mode'] === 'enabled') ? 'dark-mode' : 'light-mode';

            echo '<div class="banner">
                    <div class="banner-wrapper">
                        <div class="banner-image">
                            <img src="' . $banner['image'] . '" alt="' . $banner['name'] . '">
                        </div>
                        <div class="banner-description ' . $modeClass . '">
                            <h2>' . $banner['name'] . '</h2>
                            <p><strong>Element:</strong> ' . $banner['element'] . '</p>
                            <p><strong>Path:</strong> ' . $banner['path'] . '</p>
                            <p><strong>Rarity:</strong> ' . $banner['rarity'] . '</p>
                            <p><strong>Release Date:</strong> ' . $banner['release_date'] . '</p>
                            <p><strong>Light Cone:</strong> ' . $banner['light_cone'] . '</p>
                            <p>' . $banner['description'] . '</p>
                        </div>
                    </div>
                    <hr>
                </div>';
        }

        if (isset($_POST['submit-event'])) {
            $newEvent = [
                'image' => $_POST['event-image'],
                'name' => $_POST['event-name'],
                'element' => '',
                'path' => $_POST['event-path'],
                'rarity' => $_POST['event-rarity'],
                'release_date' => $_POST['event-release-date'],
                'light_cone' => $_POST['event-light-cone'],
                'description' => $_POST['event-description']
            ];

            array_push($banners, $newEvent);
        }

        foreach ($banners as $banner) {
            displayBanner($banner);
        }
        ?>
    </div>

    <section id="tambah-event" class="body-content">
        <h2>Tambah Banner Baru</h2>
        <form action="" method="post">
            <label for="event-image">URL Gambar Event Baru:</label>
            <input type="text" name="event-image" required>

            <label for="event-name">Nama Character Baru:</label>
            <input type="text" name="event-name" required>

            <label for="event-path">Path Character Baru:</label>
            <input type="text" name="event-path" required>

            <label for="event-rarity">Rarity Character Baru:</label>
            <input type="text" name="event-rarity" required>

            <label for="event-release-date">Tanggal Rilis Character Baru:</label>
            <input type="text" name="event-release-date" required>

            <label for="event-light-cone">Light Cone Character Baru:</label>
            <input type="text" name="event-light-cone" required>

            <label for="event-description">Deskripsi Character Baru:</label>
            <textarea name="event-description" rows="4" required></textarea>

            <button type="submit" name="submit-event">Tambah Banner</button>
        </form>
    </section>

    <footer class="footer" id="about-me">
        <div class="footer-content">
            <div class="about-me-content">
                <h1>ABOUT ME</h1>
                <h2 id="name">Alianur</h2>
                <p id="nim">NIM: 2209106025</p>
                <p id="address">Alamat: Jl. Jalan N0.123 Atlantis Utara</p>
                <p id="birth">Tempat, Tanggal Lahir: Atlantis, 1-11-2001</p>
                <p id="contact">Kontak: +1 468 4568 4645 / sambalbakar_pak_kumis123@yahoo.com</p>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; <span id="year">2023</span> My Leaks. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
