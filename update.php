<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catatan_padi";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_petani = $_POST['nama_petani'];
    $tanggal_tanam = $_POST['tanggal_tanam'];
    $lokasi = $_POST['lokasi'];
    $data_padi = $_POST['data_padi'];

    // Query untuk update data
    $sql = "UPDATE catatan SET 
            nama_petani='$nama_petani', 
            tanggal_tanam='$tanggal_tanam', 
            lokasi='$lokasi', 
            data_padi='$data_padi'
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
