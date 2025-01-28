<!-- resources/views/calonkaryawan/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calon Karyawan</title>
</head>
<body>
    <h1>Daftar Calon Karyawan</h1>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Riwayat Pendidikan</th>
                <th>Konversi Pendidikan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calonKaryawan as $karyawan)
                <tr>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->riwayat_pendidikan }}</td>
                    <td>{{ $karyawan->riwayat_pendidikan_konversi }}</td> <!-- Accessor -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
