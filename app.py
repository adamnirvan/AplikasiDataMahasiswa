from flask import Flask, request, jsonify
import mysql.connector

app = Flask(__name__)

def db():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="db_campus"
    )

@app.get("/mahasiswa")
def get_data():
    cari = request.args.get("cari", "")
    conn = db()
    cursor = conn.cursor(dictionary=True)
    cursor.execute("SELECT * FROM view_mahasiswa WHERE nama LIKE %s", (f"%{cari}%",))
    data = cursor.fetchall()
    return jsonify(data)

@app.post("/mahasiswa")
def insert_data():
    data = request.json
    conn = db()
    cursor = conn.cursor()
    cursor.execute("CALL tambah_mahasiswa(%s, %s, %s)",
                   (data['nama'], data['nim'], data['jurusan']))
    conn.commit()
    return {"status": "ok"}

@app.delete("/mahasiswa/<id>")
def delete_data(id):
    conn = db()
    cursor = conn.cursor()
    cursor.execute("DELETE FROM mahasiswa WHERE id=%s", (id,))
    conn.commit()
    return {"status": "deleted"}

app.run(debug=True)
