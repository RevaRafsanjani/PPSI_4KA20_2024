<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #efeaee; /* Warna latar hijau lembut */
            font-family: 'Arial', sans-serif;
            color: #1e40af;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #1e40af;
            margin-bottom: 20px;
            font-weight: bold;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #1e40af;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        button {
            background-color: #1e40af;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
            transition: all 0.3s ease-in-out;
            width: 100%;
        }
        button:hover {
            background-color: #388e3c;
            transform: scale(1.05);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrasi Siswa</h2>
        <form action="register_siswa.php" method="POST">
            <label for="nisn">NISN:</label>
            <input type="text" id="nisn" name="nisn" placeholder="Masukkan NISN" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>

            <label for="kota_lahir">Kota Lahir:</label>
            <input type="text" id="kota_lahir" name="kota_lahir" placeholder="Masukkan Kota Lahir" required>

            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" id="tgl_lahir" name="tgl_lahir" required>

            <label for="gender">Jenis Kelamin:</label>
            <select id="gender" name="gender" required>
                <option value="PRIA">Pria</option>
                <option value="WANITA">Wanita</option>
            </select>

            <label for="nama_wali">Nama Wali:</label>
            <input type="text" id="nama_wali" name="nama_wali" placeholder="Masukkan Nama Wali" required>

            <label for="no_hp">No. HP:</label>
            <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP" required>

            <label for="id_kelas">ID Kelas:</label>
            <input type="number" id="id_kelas" name="id_kelas" placeholder="Masukkan ID Kelas (Silakan Tanyakan ke Guru Anda)" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password" required>

            <button type="submit">Register</button>
        </form>
    </div>

</body>
</html>