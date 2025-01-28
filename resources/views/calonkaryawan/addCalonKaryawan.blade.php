@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Calon Karyawan</h1>

    <form action="saveCalonKaryawan" method="post" class="space-y-4">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Foto Calon Karyawan</label>
            <input type="file" name="image" id="image" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan ID CalonKaryawan">
        </div>

        <div>
            <label for="idCalonKaryawan" class="block text-sm font-medium text-gray-700">ID Calon Karyawan</label>
            <input type="text" name="idCalonKaryawan" id="idCalonKaryawan" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan ID CalonKaryawan">
        </div>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Calon Karyawan</label>
            <input type="text" name="nama" id="nama" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama CalonKaryawan">
        </div>

        <div>
            <label for="umur" class="block text-sm font-medium text-gray-700">Umur Calon Karyawan</label>
            <input type="number" name="umur" id="umur" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan umur CalonKaryawan">
        </div>

        <div>
            <label for="jenisKelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select name="jenisKelamin" id="jenisKelamin" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="pria">Pria</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>

        <div>
            <label for="riwayatPendidikan" class="block text-sm font-medium text-gray-700">Riwayat Pendidikan</label>
            <select name="riwayatPendidikan" id="riwayatPendidikan" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="sarjana1">Sarjana 1</option>
                <option value="sarjana2">Sarjana 2</option>
                <option value="sma">SMA Sederajat</option>
                <option value="smp">SMP Sederajat</option>
                <option value="sd">SD Sederajat</option>
            </select>
        </div>

        <div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300">Simpan</button>
        </div>
    </form>
</div>
@endsection
