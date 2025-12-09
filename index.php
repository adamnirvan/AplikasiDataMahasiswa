<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f7f9fc;
        }
        .container {
            margin-top: 40px;
        }
        .card {
            border-radius: 18px;
        }
        .btn-custom {
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-center">📚 Data Mahasiswa</h2>

        <form class="d-flex mb-4" method="GET">
            <input class="form-control me-2" type="text" name="cari" placeholder="Cari nama...">
            <button class="btn btn-primary btn-custom">Cari</button>
        </form>

        <a href="tambah_form.php" class="btn btn-success mb-3 btn-custom">➕ Tambah Mahasiswa</a>

        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cari = isset($_GET["cari"]) ? $_GET["cari"] : "";
                $data = $conn->query("SELECT * FROM view_mahasiswa WHERE nama LIKE '%$cari%'");

                while ($m = $data->fetch_assoc()):
                ?>
                <tr>
                    <td><?= $m['id'] ?></td>
                    <td><?= $m['nama'] ?></td>
                    <td><?= $m['nim'] ?></td>
                    <td><?= $m['jurusan'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $m['id'] ?>" class="btn btn-warning btn-sm btn-custom">✏ Edit</a>
                        <a href="hapus.php?id=<?= $m['id'] ?>" class="btn btn-danger btn-sm btn-custom" onclick="return confirm('Hapus data ini?')">🗑 Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>
</div>

</body>
</html>
