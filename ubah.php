<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "web_uas";

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Periksa apakah ada data yang akan diubah
if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];
    
    // Ambil data yang akan diubah
    $result = mysqli_query($koneksi, "SELECT * FROM pesan WHERE nama='$nama'");
    $data = mysqli_fetch_array($result);

    // Jika form disubmit, update data
    if (isset($_POST['update'])) {
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $menu = $_POST['menu'];
        $pesan = $_POST['pesan'];
        $tanggal = $_POST['tanggal'];
        
        $update = mysqli_query($koneksi, "UPDATE pesan SET email='$email', no_hp='$no_hp', menu='$menu', pesan='$pesan', tanggal='$tanggal' WHERE nama='$nama'");
        
        if ($update) {
            echo "<script>alert('Data berhasil di Update');</script>";
        } else {
            echo "<script>alert('Data Gagal Diupdate');</script> " . mysqli_error($koneksi);
        }
    }
} else {
    echo "Nama tidak ditemukan!";
    exit;
}

// Tutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ubah.css">
    <title>Ubah Data</title>
</head>
<body>
    <h2>Ubah Data</h2>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Nama</td>
                <td>: <?php echo $data['nama']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $data['email']; ?>"></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="text" name="no_hp" value="<?php echo $data['no_hp']; ?>"></td>
            </tr>
            <tr>
                <td>Menu</td>
                <td><input type="text" name="menu" value="<?php echo $data['menu']; ?>"></td>
            </tr>
            <tr>
                <td>Pesan</td>
                <td><input type="text" name="pesan" value="<?php echo $data['pesan']; ?>"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal" value="<?php echo $data['tanggal']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <nav>
        <a href="admins.php">Back</a>
    </nav>
</body>
</html>
