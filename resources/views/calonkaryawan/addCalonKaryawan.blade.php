@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Calon Karyawan</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="saveCalonKaryawan" method="post" class="space-y-4" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="idCalonKaryawan" class="block text-sm font-medium text-gray-700">ID Calon Karyawan</label>
            <input type="text" name="idCalonKaryawan" id="idCalonKaryawan" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan ID CalonKaryawan">
        </div>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Calon Karyawan</label>
            <input type="text" name="nama" id="nama" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama CalonKaryawan">
        </div>

        <div>
            <label for="tanggalLahir" class="block text-sm font-medium text-gray-700">Tanggal lahir Karyawan</label>
            <input type="date" name="tanggalLahir" id="tanggalLahir" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan tanggal lahir CalonKaryawan">
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
            <label for="ratingPenampilan" class="block text-sm font-medium text-gray-700">Rating Penampilan</label>
            <input type="number" name="ratingPenampilan" id="ratingPenampilan" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan rating penampilan 0-100">
        </div>

        <div>
            <label for="jumlahSertifikat" class="block text-sm font-medium text-gray-700">Jumlah Sertifikat</label>
            <input type="number" name="jumlahSertifikat" id="jumlahSertifikat" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Jumlah Sertifikat">
        </div>

        <div>
            <label for="skorPraktik" class="block text-sm font-medium text-gray-700">Skor Praktik</label>
            <input type="number" name="skorPraktik" id="skorPraktik" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Skor Praktik">
        </div>

        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="alamat" id="autocomplete" placeholder="Enter your address" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div id="map" style="height: 400px; width: 100%;"></div>

        <div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300">Simpan</button>
        </div>
    </form>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initAutocomplete" async defer></script>
<script>
    let autocomplete, map, marker;

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('autocomplete'),
            { types: ['geocode'] }
        );

        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: -6.200000, lng: 106.816666 },
            zoom: 15,
        });

        marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29),
        });

        autocomplete.addListener('place_changed', function () {
            marker.setVisible(false);
            const place = autocomplete.getPlace();

            if (!place.geometry) {
                alert("No details available for the selected address!");
                return;
            }

            map.setCenter(place.geometry.location);
            map.setZoom(15);
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
        });
    }
</script>
@endsection