<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- icons -->
     <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="icon/x-icon" href="gambar/minarko_red.png">
    <title>Web Minarko</title>
</head>
<body>

<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header("Location: flogin.php");
    exit();
}

// Ambil data pengguna dari sesi
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Web Minarko</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <h2>Minarko.</h2>
        <img class="logonavbar" src="gambar/logo.jpeg">
        <div class="navbar-nav" id="navbar-nav">
            <a href="#" id="home-nav">Home</a>
            <a href="#about" id="about-nav">About Us</a>
            <a href="#menu" id="menu-nav">Menu</a>
            <a href="#kontak" id="kontak-nav">Contact</a>
            <a href="logout.php" id="logout-nav">Logout</a>
        </div>
        <div class="welcome-message">
            <p>Selamat datang, <strong><?php echo htmlspecialchars($user['username']); ?></strong>!</p>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Halo, <span><?php echo htmlspecialchars($user['username']); ?></span>!</h1>
            <p>Ayo Nikmati Cita Rasa Lezat Dengan Harga Bersahabat</p>
            <a href="#kontak" class="cta">Beli Sekarang</a>
        </main>
    </section>
    <!-- about -->

    <section class="about" id="about">
        <h2>Tentang <span>Kami</span></h2>
        <div class="row">

            <div class="content">
                <h3>Lokasi</h3>
                <p>Restoran Minarko ini terletak di Jl. Tapak Tilas, Sungai Bangek, Padang, Provinsi Sumatera Barat. </p>
                <p>Restoran ini pertama dibuka pada tanggal 15 Agustus 2022.</p>
            </div>

            <div class="content">
                <h3>Visi</h3>
                <p>Menjadi pilihan utama para pecinta kuliner mie pedas di Indonesia terutama di ranah minang dengan menyuguhkan pengalaman kuliner yang unik, berkualitas, dan penuh tantangan.</p>
            </div>
        </div>
        <div class="row2">
            <div class="content" id="misi">
                <h3>Misi</h3>
                <p>Menyediakan mie goreng dan mie rebus berkualitas dengan varian rasa pedas yang beragam. Terus berinovasi dalam menciptakan tingkatan pedas yang unik, memberikan pelayanan ramah dan profesional, serta memastikan tempat yang nyaman dan bersih bagi pelanggan. Mendukung produk lokal, memberdayakan masyarakat sekitar, dan menjaga standar kesehatan dan keamanan pangan untuk menciptakan pengalaman makan yang tak terlupakan.</p>
            </div>

        </div>
    </section>

    <section class="menu" id="menu">
        <h2>Menu <span>Kami</span></h2>
        <p>"Rasakan ledakan rasa dengan setiap suapan dari menu kami yang menggugah selera, siap menghangatkan hari Anda dan membuat Anda ketagihan!"</p>
        <div class="row">
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/goreng.png" >
                <h3 class="menu-card-title">- Mie Goreng  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Rasakan sensasi menggigit Mie Goreng Pedas, lezatnya menggugah selera dan pedasnya bikin nagih!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/kuah.png" >
                <h3 class="menu-card-title">- Mie Kuah -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Nikmati kelezatan mie kuah pedas yang menggugah selera, siap memanjakan lidah Anda!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/mager.png" >
                <h3 class="menu-card-title">- Mie Mager -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Rasakan kenikmatan Mie Mager yang lezat dan praktis untuk bangkitkan semangatmu!"</div>
            </div>
            <div class="menu-card" > 
                <img class="menu-card-image" src="gambar/algojo.png">
                <h3 class="menu-card-title">- Ayam Lado Ijo  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Rasakan Sensasi Pedas Menggoda Ayam Lado Ijo, Lezatnya Menggugah Selera dan Bikin Ketagihan!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/geprek.png" >
                <h3 class="menu-card-title">- Ayam Geprek  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Geprek Ayamnya Nendang Banget, Pedasnya Bikin Nagih Terus!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/pecel.png" >
                <h3 class="menu-card-title">- Pecel Ayam  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Pecel Ayamnya Mantul Abis, Bumbu Khasnya Bikin Kamu Makan Terus Tanpa Henti!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/bakar.png" >
                <h3 class="menu-card-title">- Ayam Bakar  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Ayam Bakar Kita, Bumbunya Meresap Sampai Ke Tulang! Rasanya Dijamin Bikin Kamu Nambah Lagi dan Lagi!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/slengekan.png" >
                <h3 class="menu-card-title">- Nasi Slengekan  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Nasi Slengekan, Paduan Sempurna Antara Pedas, Gurih, dan Nikmat yang Bikin Lidah Bergoyang dan Pengen Lagi!"</div>
                </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/dadar.png" >
                <h3 class="menu-card-title">- Nasi Dadar  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Nasi Dadar, Gurihnya Nyata, Gaya Hidupmu Makin Hits dengan Setiap Gigitannya yang Memikat!"</div>
                </div>
        </div>
    </section>


    <!-- Kontak -->

    <section class="kontak" id="kontak">
        <h2>Kontak <span>Kami</span></h2>
        <p>"Tunggu apa lagi? Hubungi kami sekarang untuk memesan meja, menanyakan menu, atau sekadar berbagi pengalaman pedas Anda—kami siap melayani dengan senyuman!".</p>
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d838.6690338695723!2d100.35997844276048!3d-0.8249936875345742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4c7eab9ab7f2f%3A0x5f2d3b148296f5cf!2sMINARKO%20SUNGAI%20BANGEK!5e0!3m2!1sid!2sid!4v1718204522156!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <form action="proses.php" method="post" id="pesan">
                <h2>Ayo <span>Pesan</span></h2>
                <div class="input-group">
                    <i data-feather="user"></i>
                     <input type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" name="no_hp" id="no_hp" placeholder="No HP">
                </div>
                <div class="input-group">
                    <i data-feather="message-circle"></i>
                    <textarea name="menu" id="menu" placeholder="Detail Menu"></textarea>
                </div>
                <div class="input-group">
                    <i data-feather="message-circle"></i>
                    <input type="text" name="pesan" id="pesan" placeholder="Detail Reservasi">
                </div>
                <div class="input-group">
                    <i data-feather="calendar"></i>
                    <input type="date" name="tanggal" id="tanggal" placeholder="Tanggal Reservasi">
                </div>
                <Button type="submit" class="btn" name="submit" id="submit">Kirim</Button>


            </form>
        </div>
    </section>

    <section class="end">
        <div class="fin">
            <p>2024 ©Minarko. All rights reserved.</p>
            <i data-feather="instagram" class="ig"></i>
            <i data-feather="facebook" class="fb"></i>
            <i data-feather="twitter" class="tw"></i>        
        </div>
    
    </section>
    

    <script src="script.js"></script>>

    <script>
      feather.replace();
    </script>

</body>
</html>
