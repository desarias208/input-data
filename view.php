<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catatan_padi";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah ada permintaan untuk menghapus data
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM catatan WHERE id='$delete_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record berhasil dihapus.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Cek apakah ada permintaan untuk mengedit data
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $sql = "SELECT * FROM catatan WHERE id='$edit_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Isi form dengan data yang akan diedit
        echo "<form action='update.php' method='POST'>
                <input type='hidden' name='id' value='".$row['id']."'>
                Nama Petani: <input type='text' name='nama_petani' value='".$row['nama_petani']."'><br>
                Tanggal Tanam: <input type='date' name='tanggal_tanam' value='".$row['tanggal_tanam']."'><br>
                Lokasi: <input type='text' name='lokasi' value='".$row['lokasi']."'><br>
                Data Padi: <textarea name='data_padi'>".$row['data_padi']."</textarea><br>
                <button type='submit'>Update Data</button>
              </form>";
        exit();
    }
}

// Ambil semua data dari tabel catatan
$sql = "SELECT * FROM catatan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Catatan Padi</title>
</head>
<body>
    <h1>Catatan Padi Desa Rias</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nama Petani</th>
            <th>Tanggal Tanam</th>
            <th>Lokasi</th>
            <th>Data Padi</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama_petani'] . "</td>";
                echo "<td>" . $row['tanggal_tanam'] . "</td>";
                echo "<td>" . $row['lokasi'] . "</td>";
                echo "<td>" . $row['data_padi'] . "</td>";
                echo "<td>
                        <a href='view.php?edit_id=" . $row['id'] . "'>Edit</a> | 
                        <a href='view.php?delete_id=" . $row['id'] . "'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
        }
        ?>
    </table>

    <a href="index.php">Kembali ke Form</a>

</body>
</html>

<?php
$conn->close();
?>
