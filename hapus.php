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

// Periksa apakah parameter nama telah diterima dari URL
if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];

    // Query untuk menghapus data berdasarkan nama
    $query = "DELETE FROM pesan WHERE nama = '$nama'";

    // Cek jika query berhasil
    if ($koneksi->query($query) === TRUE) {
        // Setelah data dihapus, redirect ke halaman admin dengan pesan sukses
        echo "<script>
                alert('Data berhasil dihapus.');
                window.location.href = 'admins.php';
              </script>";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}

// Tutup koneksi
$koneksi->close();
?>
