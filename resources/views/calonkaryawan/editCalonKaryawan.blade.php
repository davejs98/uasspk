@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Calon Karyawan</h1>

    <form action="/saveEditedCalonKaryawan" method="post" class="space-y-4">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label for="idCalonKaryawan" class="block text-sm font-medium text-gray-700">ID Calon Karyawan</label>
            <input type="text" name="idCalonKaryawan" id="idCalonKaryawan" value="{{ $getCalonKaryawan->idCalonKaryawan }}" 
                class="w-full p-2 border border-gray-300 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
        </div>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ $getCalonKaryawan->nama }}" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama Calon Karyawan">
        </div>

        <div>
            <label for="umur" class="block text-sm font-medium text-gray-700">Umur</label>
            <input type="number" name="umur" id="umur" value="{{ $getCalonKaryawan->umur }}" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan umur Calon Karyawan">
        </div>

        <div>
            <label for="jenisKelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select name="jenisKelamin" id="jenisKelamin" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="pria" @if($getCalonKaryawan->jenisKelamin == 'Pria') selected @endif>Pria</option>
                <option value="perempuan" @if($getCalonKaryawan->jenisKelamin == 'Perempuan') selected @endif>Perempuan</option>
            </select>
        </div>

        <div>
            <label for="riwayatPendidikan" class="block text-sm font-medium text-gray-700">riwayat Pendidikan</label>
            <select name="riwayatPendidikan" id="riwayatPendidikan" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Sarjana1" @if($getCalonKaryawan->jenisKelamin == 'Sarjana 1') selected @endif>Sarjana 1</option>
                <option value="Sarjana2" @if($getCalonKaryawan->jenisKelamin == 'Sarjana 2') selected @endif>Sarjana 2</option>
                <option value="sma" @if($getCalonKaryawan->jenisKelamin == 'SMA Sederajat') selected @endif>SMA Sederajat</option>
                <option value="smp" @if($getCalonKaryawan->jenisKelamin == 'SMP Sederajat') selected @endif>SMP Sederajat</option>
                <option value="sd" @if($getCalonKaryawan->jenisKelamin == 'SD Sederajat') selected @endif>SD Sederajat</option>
            </select>
        </div>
        <div>
            <label for="ratingPenampilan" class="block text-sm font-medium text-gray-700">Rating Penampilan</label>
            <input type="number" name="ratingPenampilan" id="ratingPenampilan" value="{{ $getCalonKaryawan->ratingPenampilan }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan rating penampilan 0-100">
        </div>
        <div>
            <label for="jumlahSertifikat" class="block text-sm font-medium text-gray-700">Jumlah Sertifikat</label>
            <input type="number" name="jumlahSertifikat" id="jumlahSertifikat" value="{{ $getCalonKaryawan->jumlahSertifikat }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Jumlah Sertifikat">
        </div>
        <div>
            <label for="skorPraktik" class="block text-sm font-medium text-gray-700">Skor Praktik</label>
            <input type="number" name="skorPraktik" id="skorPraktik" value="{{ $getCalonKaryawan->skorPraktik }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Skor Praktik">
        </div>
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <input id="autocomplete" type="text" placeholder="Enter your address" value="{{ $getCalonKaryawan->alamat }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
            <button type="submit" 
                class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Simpan
            </button>
        </div>
    </form>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initAutocomplete" async defer></script>
<script>
    let autocomplete, map, marker;

    function initAutocomplete() {
        // Initialize Google Autocomplete
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('autocomplete'),
            { types: ['geocode'] }
        );

    }
</script>
@endsection
