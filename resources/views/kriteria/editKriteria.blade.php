@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Kriteria</h1>

    <form action="/saveEditedKriteria" method="post" class="space-y-4">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div>
            <label for="idKriteria" class="block text-sm font-medium text-gray-700">ID Kriteria</label>
            <input type="text" name="idKriteria" id="idKriteria" value="{{ $getKriteria->idKriteria }}" 
                class="w-full p-2 border border-gray-300 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
        </div>

        <div>
            <label for="namaKriteria" class="block text-sm font-medium text-gray-700">Nama Kriteria</label>
            <input type="text" name="namaKriteria" id="namaKriteria" value="{{ $getKriteria->namaKriteria }}" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama Kriteria">
        </div>

        <div>
            <label for="tipe" class="block text-sm font-medium text-gray-700">Tipe</label>
            <select name="tipe" id="tipe" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Benefit" @if($getKriteria->tipe == 'Benefit') selected @endif>Benefit</option>
                <option value="Cost" @if($getKriteria->tipe == 'Cost') selected @endif>Cost</option>
            </select>
        </div>

        <div>
            <label for="bobot" class="block text-sm font-medium text-gray-700">Bobot</label>
            <input type="number" name="bobot" id="bobot" value="{{ $getKriteria->bobot }}" 
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Bobot">
        </div>

        <div>
            <button type="submit" 
                class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
