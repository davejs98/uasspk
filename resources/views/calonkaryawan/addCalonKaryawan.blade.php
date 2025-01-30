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

        <input type="hidden" name="jarakRumah" id="jarakRumah">


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
    // Pastikan peta sudah ada
    if (!document.getElementById('map')) {
        console.error("Elemen map tidak ditemukan!");
        return;
    }

    // Inisialisasi Google Autocomplete
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('autocomplete'),
        { types: ['geocode'] }
    );

    // Inisialisasi Google Map
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -6.200000, lng: 106.816666 }, // Default Jakarta
        zoom: 12,
    });

    // Inisialisasi marker
    marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29),
    });

    // Event listener saat alamat dipilih dari autocomplete
    autocomplete.addListener('place_changed', function () {
        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
            alert("Alamat tidak ditemukan. Silakan pilih alamat yang valid.");
            return;
        }

        const lat = place.geometry.location.lat();
        const lng = place.geometry.location.lng();

        // Update peta dan marker
        map.setCenter(place.geometry.location);
        map.setZoom(15);
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        // Panggil fungsi untuk menghitung jarak
        calculateDistance(lat, lng);
    });
}
function calculateDistance(lat, lng) {
    const companyLatLng = new google.maps.LatLng(-7.367411466698084, 112.72448151647734); // Koordinat perusahaan (Sidoarjo)

    const service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix({
        origins: [companyLatLng],
        destinations: [{ lat, lng }],
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.METRIC, 
    }, function (response, status) {
        if (status === 'OK') {
            const element = response.rows[0].elements[0];

            if (element.status === "OK") {
                let distanceText = element.distance.text; // Contoh: "8.6 km"
                let durationText = element.duration.text; 

                // Mengubah "8.6 km" menjadi "8.6" (angka decimal)
                let distanceValue = parseFloat(distanceText.replace(" km", "").replace(",", "."));

                // Cek apakah konversi berhasil
                if (isNaN(distanceValue)) {
                    alert("Error: Gagal mengonversi jarak ke angka.");
                    return;
                }

                // Simpan ke input hidden agar dikirim ke backend
                document.getElementById("jarakRumah").value = distanceValue;
                document.getElementById("waktuTempuh").value = durationText;

                alert(`Jarak dari perusahaan: ${distanceValue} km\nWaktu tempuh: ${durationText}`);
            } else {
                alert("Tidak dapat menghitung jarak ke alamat tersebut.");
            }
        } else {
            alert('Error calculating distance: ' + status);
        }
    });
}

// Pastikan initAutocomplete dipanggil saat halaman selesai dimuat
document.addEventListener("DOMContentLoaded", function () {
    initAutocomplete();
});

</script>
@endsection