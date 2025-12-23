<style>
/* ======================
   FORM TAMBAH EVENT
====================== */
body {
    font-family: "Segoe UI", Arial, sans-serif;
    background: #f4f6f9;
}

h2 {
    text-align: center;
    margin-top: 30px;
    color: #2c3e50;
}

form {
    max-width: 500px;
    margin: 30px auto;
    background: #ffffff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

label {
    font-weight: 600;
    color: #374151;
}

input[type="text"],
input[type="date"],
textarea {
    width: 100%;
    padding: 10px 12px;
    margin-top: 6px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #d1d5db;
    font-size: 14px;
    outline: none;
}

input:focus,
textarea:focus {
    border-color: #4f46e5;
}

textarea {
    resize: vertical;
}

button {
    width: 100%;
    padding: 12px;
    background: #4f46e5;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}

button:hover {
    background: #4338ca;
}

/* ===== TOMBOL KEMBALI ===== */
.back-btn {
    display: block;
    margin-top: 12px;
    text-align: center;
    padding: 11px;
    background: #6b7280;
    color: #ffffff;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
}

.back-btn:hover {
    background: #4b5563;
}
</style>

<h2>Tambah Event</h2>

<form method="post" action="index.php?page=event_store">
    <label>Nama Event</label>
    <input type="text" name="nama_event" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi" rows="4"></textarea>

    <label>Tanggal</label>
    <input type="date" name="tanggal" required>

    <button type="submit" name="simpan">Simpan</button>

    <!-- tombol kembali -->
    <a href="index.php?page=kalender" class="back-btn">
        Kembali
    </a>
</form>
