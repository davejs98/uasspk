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
                    <th class="border border-gray-300 px-4 py-2 text-left">ranking</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">nama</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">skor total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rankedCalonKaryawan as $index => $calon)
                    <tr class="odd:bg-white even:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $calon['nama'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $calon['total_score'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
