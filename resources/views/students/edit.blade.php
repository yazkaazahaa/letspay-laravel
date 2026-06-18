@include('layouts.navbar')
<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
</head>
<body>

    <h1>Edit Data Siswa</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">

        @csrf
        @method('PUT')

        <p>Nama:</p>
        <input type="text" name="nama_siswa" value="{{ $student->nama_siswa }}">

        <p>Kelas:</p>
        <input type="text" name="kelas" value="{{ $student->kelas }}">

        <p>Nama Wali:</p>
        <input type="text" name="nama_wali" value="{{ $student->nama_wali }}">

        <p>No HP Wali:</p>
        <input type="text" name="no_hp_wali" value="{{ $student->no_hp_wali }}">

        <p>Alamat:</p>
        <textarea name="alamat">{{ $student->alamat }}</textarea>

        <p>Biaya Bulanan:</p>
        <input type="number" name="biaya_bulanan" value="{{ $student->biaya_bulanan }}">

        <br><br>

        <button type="submit">Update</button>

    </form>

</body>
</html>