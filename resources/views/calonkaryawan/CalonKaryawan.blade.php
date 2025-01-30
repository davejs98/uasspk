@extends('layouts.dashboard')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Calon Karyawan</h1>
    <div class="mb-4 flex justify-between items-center">
        <a href="addCalonKaryawan" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Tambah
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300 text-sm text-gray-700">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Umur</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Jenis Kelamin</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Riwayat Pendidikan</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Jarak Rumah</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hasil as $data)
                    <tr class="odd:bg-white even:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{$data->nama}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$data->age}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$data->jenisKelamin}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$data->riwayatPendidikan}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$data->jarakRumah}} Km</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <button onclick="detail('{{ $data->idCalonKaryawan }}')" 
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition">
                            Edit
                        </button>
                        <button onclick="hapus('{{ $data->idCalonKaryawan }}')" 
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                            Hapus
                        </button>
                        <button onclick="konversi('{{ $data->idCalonKaryawan }}')" 
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition">
                            Detail
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function detail(idCalonKaryawan) {
        window.location.href = 'editCalonKaryawan/' + idCalonKaryawan;
    }
    function konversi(idCalonKaryawan) {
        window.location.href = 'detailkonversiCalonKaryawan/' + idCalonKaryawan;
    }

    function hapus(idCalonKaryawan) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Terhapus!',
                    'Data berhasil dihapus.',
                    'success'
                ).then(() => {
                    window.location.href = 'deleteCalonKaryawan/' + idCalonKaryawan;
                });
            } else {
                Swal.fire(
                    'Dibatalkan',
                    'Data Anda aman.',
                    'info'
                );
            }
        });
    }
</script>
@endsection
