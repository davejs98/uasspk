<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100">
<div class="flex h-screen" x-data="{ sidebarOpen: false }">
    <!-- Sidebar -->
    <div class="bg-gray-900 text-white w-64 fixed inset-y-0 transform transition-transform duration-300 ease-in-out"
         :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
        <div class="p-4">
            <h2 class="text-2xl font-semibold">Breeze</h2>
        </div>
        <nav class="mt-5">
            <a href="dashboard" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800">Dashboard</a>
            <a href="kriteria" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800">Kriteria</a>
            <a href="calonkaryawan" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800">Calon Karyawan</a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800">Perhitungan</a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800">Hasil Akhir</a>
        </nav>
    </div>

    <!-- Page Content -->
    <div class="flex-1 flex flex-col lg:pl-64 transition-all duration-300 ease-in-out"
         :class="sidebarOpen ? 'pl-64' : 'pl-0 lg:pl-64'">
        <!-- Navbar -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center">
            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-700 focus:outline-none lg:hidden">
                ☰
            </button>
            <div class="text-right">
                <span class="text-gray-700 font-semibold">Henry Klein</span>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</div>




</body>
</html>
