@extends('layouts.dashboard')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Kriteria</h1>
    <div class="mb-4 flex justify-between items-center">
        <a href="addKriteria" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Tambah
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300 text-sm text-gray-700">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Kriteria</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tipe</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Bobot</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hasil as $data)
                <tr class="odd:bg-white even:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{$data->namaKriteria}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$data->tipe}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$data->bobot}}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <button onclick="detail('{{ $data->idKriteria }}')" 
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition">
                            Edit
                        </button>
                        <button onclick="hapus('{{ $data->idKriteria }}')" 
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function detail(idKriteria) {
        window.location.href = 'editKriteria/' + idKriteria;
    }

    function hapus(idKriteria) {
        const isConfirmed = confirm("Apakah Anda yakin ingin menghapus data ini?");
        if (isConfirmed) {
            window.location.href = 'deleteKriteria/' + idKriteria;
        } else {
            alert("Penghapusan dibatalkan.");
        }
    }
</script>
@endsection
