<?php
include 'config.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];

$conn->query("UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id=$id");

header("Location: index.php");
?>
