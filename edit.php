<?php
include 'config.php';
$id = $_GET['id'];

$data = $conn->query("SELECT * FROM mahasiswa WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f7f9fc;">

<div class="container mt-5">
    <div class="card shadow p-4" style="border-radius:18px;">
        <h2 class="mb-4 text-center">✏ Edit Mahasiswa</h2>

        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>NIM</label>
                <input type="text" name="nim" value="<?= $data['nim'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jurusan</label>
                <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>" class="form-control" required>
            </div>

            <button class="btn btn-warning">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
