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

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_petani = $_POST['nama-petani'];
    $tanggal_tanam = $_POST['tanggal-tanam'];
    $lokasi = $_POST['lokasi'];
    $data_padi = $_POST['data-padi'];

    // Query untuk insert data
    $sql = "INSERT INTO catatan (nama_petani, tanggal_tanam, lokasi, data_padi) 
            VALUES ('$nama_petani', '$tanggal_tanam', '$lokasi', '$data_padi')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diinput.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
