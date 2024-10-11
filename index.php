<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Padi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>CATATAN PADI</h1>
        <h3>DESA RIAS</h3>
        <form action="process.php" method="POST" id="padiForm">
            <label for="nama-petani">Nama Petani:</label>
            <input type="text" id="nama-petani" name="nama-petani" required><br>

            <label for="tanggal-tanam">Tanggal Tanam:</label>
            <input type="date" id="tanggal-tanam" name="tanggal-tanam" required><br>

            <label for="lokasi">Lokasi:</label>
            <select id="lokasi" name="lokasi">
                <option value="Lokasi 1">SEKTOR PERTANIAN A</option>
                <option value="Lokasi 2">SEKTOR PERTANIAN B</option>
                <option value="Lokasi 3">SEKTOR PERTANIAN C</option>
            </select><br>

            <label for="data-padi">Data Padi:</label>
            <textarea id="data-padi" name="data-padi" rows="4" required></textarea><br>

            <div class="button-container">
                <button type="submit" id="inputButton">INPUT</button>
                <button type="button" id="viewButton" onclick="window.location.href='view.php'">VIEW</button>
            </div>
        </form>
    </div>
</body>
</html>
