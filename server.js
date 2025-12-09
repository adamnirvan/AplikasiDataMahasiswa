const express = require("express");
const app = express();
app.use(express.json());

const mysql = require("mysql");
const db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "DataMahasiswa"
});

app.get("/mahasiswa", (req, res) => {
    let cari = req.query.cari || "";
    db.query(
        "SELECT * FROM view_mahasiswa WHERE nama LIKE ?",
        [`%${cari}%`],
        (err, result) => res.json(result)
    );
});

app.post("/mahasiswa", (req, res) => {
    let { nama, nim, jurusan } = req.body;
    db.query(`CALL tambah_mahasiswa(?, ?, ?)`, [nama, nim, jurusan], () => {
        res.json({ status: "ok" });
    });
});

app.delete("/mahasiswa/:id", (req, res) => {
    db.query("DELETE FROM mahasiswa WHERE id=?", [req.params.id], () => {
        res.json({ status: "deleted" });
    });
});

app.listen(3000, () => console.log("Server running"));
