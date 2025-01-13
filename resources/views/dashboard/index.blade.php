@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold">Hi, welcome back!</h2>
    <p class="text-gray-500">Your web analytics dashboard template.</p>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
        <div class="bg-yellow-400 text-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg">Sales</h3>
            <p class="text-2xl font-bold">$8,753.00</p>
            <p>18.33% Since last month</p>
        </div>
        <div class="bg-pink-500 text-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg">Margin</h3>
            <p class="text-2xl font-bold">$5,300.00</p>
            <p>13.21% Since last month</p>
        </div>
        <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg">Orders</h3>
            <p class="text-2xl font-bold">$1,753.00</p>
            <p>67.98% Since last month</p>
        </div>
        <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg">Affiliate</h3>
            <p class="text-2xl font-bold">2368</p>
            <p>20.32% Since last month</p>
        </div>
    </div>

    <!-- Graph Placeholder -->
    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h3 class="text-lg font-bold">Business Survey</h3>
        <p class="text-gray-500">Show overview Jan 2018 - Dec 2019</p>
        <div class="w-full h-48 bg-gray-200 mt-4 rounded-lg"></div>
    </div>
</div>
@endsection
