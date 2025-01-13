@extends('layouts.dashboard')

@section('content')
<h1>Kriteria</h1>
    <thead>
        <tr>
            <th>Nama Kriteria</th>
            <th>Tipe</th>
            <th>Bobot</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hasil as $data)
        <tr>
            <td>{{$data->namaKriteria}}</td>
            <td>{{$data->tipe}}</td>
            <td>{{$data->bobot}}</td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection