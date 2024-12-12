<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: flogin.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "web_uas";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $database);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$searchTerm = isset($_GET['search']) ? $_GET['search'] : ''; // Get search term from URL
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admins.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Admin Panel</title>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to the Admin Panel</h1>
            <p>Manage the system with ease. View, edit, and delete reservations and user data.</p>
        </div>
    </section>

    <nav class="navbar">
        <h1>Admin Panel Minarko.</h1>
        <img class="logonavbar" src="gambar/logo.jpeg" alt="logo">
        <div class="navbar-nav">
            <a href="#data-reservasi">Data Reservasi</a>
            <a href="#data-user">Data User</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <!-- Data Reservasi Section -->
    <div class="content" id="data-reservasi">
        <h2>Data <span>Reservasi</span></h2>
        <div class="search-container">
            <form method="GET" action="admins.php">
                <input type="text" name="search" placeholder="Search by Nama, Email, or Menu" value="<?php echo htmlspecialchars($searchTerm); ?>">
                <button type="submit">Search</button>

            </form>
        </div>

        <div class="tombol-cetak">
            <button id="btnPrint" onclick="window.location.href='cetak.php'">Cetak</button>
        </div>
    
        <div class="tombol-tambah">
            <button onclick="window.location.href='tambah.php'">Tambah</button>
        </div>

        <div class="tabel-section">
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Menu</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
                <?php
                // Fetch data based on search
                $query = "SELECT * FROM pesan WHERE nama LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' OR menu LIKE '%$searchTerm%'";
                $result = mysqli_query($koneksi, $query);
                $no = 1;
                while ($tampil = mysqli_fetch_array($result)) {
                    echo "<tr>
                            <td>$no</td>
                            <td>{$tampil['nama']}</td>
                            <td>{$tampil['email']}</td>
                            <td>{$tampil['no_hp']}</td>
                            <td>{$tampil['menu']}</td>
                            <td>{$tampil['pesan']}</td>
                            <td>{$tampil['tanggal']}</td>
                            <td>
                                <a href='hapus.php?nama={$tampil['nama']}' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">
                                    <i data-feather='trash'></i>
                                </a>
                                <a href='ubah.php?nama={$tampil['nama']}'>
                                    <i data-feather='edit'></i>
                                </a>
                            </td>
                          </tr>";
                    $no++;
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Data User Section -->
    <div class="content" id="data-user">
        <h2>Data <span>User</span></h2>
        <div class="search-container">
            <form method="GET" action="admins.php">
                <input type="text" name="search" placeholder="Search by Username, Email, or Role" value="<?php echo htmlspecialchars($searchTerm); ?>">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="tabel-section">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Dibuat Pada</th>
                    <th>Diubah Pada</th>
                    <th>Aksi</th>
                </tr>
                <?php
                // Fetch data based on search
                $query = "SELECT * FROM users WHERE username LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' OR role LIKE '%$searchTerm%'";
                $result = $koneksi->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['role']}</td>
                                <td>{$row['created_at']}</td>
                                <td>{$row['updated_at']}</td>
                                <td>
                                    <a href='hapus_user.php?id={$row['id']}' onclick=\"return confirm('Yakin ingin menghapus user ini?');\"><i data-feather='trash'></i></a>

                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data pengguna.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <section class="end">
        <div class="fin">
            <p>2024 ©Minarko. All rights reserved.</p>
            <i data-feather="instagram" class="ig"></i>
            <i data-feather="facebook" class="fb"></i>
            <i data-feather="twitter" class="tw"></i>        
        </div>
    </section>

    <script>
        feather.replace();
    </script>
</body>
</html>

<?php
// Close connection
$koneksi->close();
?>
