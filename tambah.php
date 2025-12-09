<?php include 'config.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];

$conn->query("CALL tambah_mahasiswa('$nama', '$nim', '$jurusan')");
header("Location: index.php");
?>
