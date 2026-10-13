<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$no_parkir = trim($_POST['no_parkir'] ?? '');
$no_kendaraan = trim($_POST['no_kendaraan'] ?? '');
$jenis = strtolower(trim($_POST['jenis_kendaraan'] ?? ''));
$lama = filter_var($_POST['lama_parkir'] ?? null, FILTER_VALIDATE_INT);
$petugas = trim($_POST['nama_petugas'] ?? '');

if ($no_parkir === '' || $no_kendaraan === '' || $petugas === '' || $lama === false || $lama === null || $lama < 1) {
    exit('Data tidak lengkap atau lama parkir tidak valid. <a href="index.php">Kembali</a>');
}

$tarif = [
    'motor' => ['pertama' => 3000, 'selanjutnya' => 2000],
    'mobil' => ['pertama' => 5000, 'selanjutnya' => 3000],
    'truk' => ['pertama' => 7000, 'selanjutnya' => 3000],
];
if (!isset($tarif[$jenis])) {
    exit('Jenis kendaraan tidak valid. <a href="index.php">Kembali</a>');
}

$harga_pertama = $tarif[$jenis]['pertama'];
$harga_selanjutnya = $tarif[$jenis]['selanjutnya'];
$jam_tambahan = $lama - 1;
$total_bayar = $harga_pertama + ($jam_tambahan * $harga_selanjutnya);

function rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
function aman($teks) {
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hasil Data Parkir</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="container">
  <h1>HASIL DATA PARKIR</h1>
  <p class="subtitle">Rincian pembayaran parkir</p>
  <div class="hasil">
    <div class="detail"><span>No Parkir</span><strong><?php echo aman($no_parkir); ?></strong></div>
    <div class="detail"><span>No Kendaraan</span><strong><?php echo aman($no_kendaraan); ?></strong></div>
    <div class="detail"><span>Jenis Kendaraan</span><strong><?php echo aman(ucfirst($jenis)); ?></strong></div>
    <div class="detail"><span>Lama Parkir</span><strong><?php echo $lama; ?> Jam</strong></div>
    <div class="detail"><span>Nama Petugas</span><strong><?php echo aman($petugas); ?></strong></div>
    <hr>
    <div class="detail"><span>Harga Jam Pertama</span><strong><?php echo rupiah($harga_pertama); ?></strong></div>
    <div class="detail"><span>Harga Jam Selanjutnya (per jam)</span><strong><?php echo rupiah($harga_selanjutnya); ?></strong></div>
    <div class="detail"><span>Jumlah Jam Tambahan</span><strong><?php echo $jam_tambahan; ?> Jam</strong></div>
    <div class="total"><span>TOTAL BAYAR</span><strong><?php echo rupiah($total_bayar); ?></strong></div>
  </div>
  <a class="kembali" href="index.php">KEMBALI</a>
</main>
</body>
</html>
