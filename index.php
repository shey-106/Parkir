<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Data Parkir</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="container">
  <h1>FORM DATA PARKIR</h1>
  <p class="subtitle">Masukkan data kendaraan</p>
  <form action="proses.php" method="post">
    <label for="no_parkir">No Parkir</label>
    <input id="no_parkir" name="no_parkir" type="text" required placeholder="Contoh: P001">
    <label for="no_kendaraan">No Kendaraan</label>
    <input id="no_kendaraan" name="no_kendaraan" type="text" required placeholder="Contoh: H 1234 AB">
    <label for="jenis_kendaraan">Jenis Kendaraan</label>
    <select id="jenis_kendaraan" name="jenis_kendaraan" required>
      <option value="">-- Pilih Kendaraan --</option>
      <option value="mobil">Mobil</option>
      <option value="motor">Motor</option>
      <option value="truk">Truk</option>
    </select>
    <label for="lama_parkir">Lama Parkir (Jam)</label>
    <input id="lama_parkir" name="lama_parkir" type="number" min="1" step="1" required placeholder="Contoh: 3">
    <label for="nama_petugas">Nama Petugas</label>
    <input id="nama_petugas" name="nama_petugas" type="text" required placeholder="Nama petugas">
    <button type="submit">SUBMIT</button>
  </form>
</main>
</body>
</html>
