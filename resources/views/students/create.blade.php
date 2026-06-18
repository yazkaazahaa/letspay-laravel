@include('layouts.navbar')
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
</head>
<body>

@include('layouts.navbar')

    <h1>Tambah Data Siswa</h1>

    <form action="{{ route('students.store') }}" method="POST">

        @csrf

        <p>Nama:</p>
        <input type="text" name="nama_siswa">

        <p>Kelas:</p>
        <input type="text" name="kelas">

        <p>Nama Wali:</p>
        <input type="text" name="nama_wali">

        <p>No HP Wali:</p>
        <input type="text" name="no_hp_wali">

        <p>Alamat:</p>
        <textarea name="alamat"></textarea>

        <p>Biaya Bulanan:</p>
        <input type="number" name="biaya_bulanan">

        <br><br>

        <button type="submit">Simpan</button>

    </form>

</body>
</html>