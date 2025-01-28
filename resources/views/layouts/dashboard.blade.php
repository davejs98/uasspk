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
  <!-- Sidebar -->
<div class="bg-gradient-to-b from-gray-800 via-gray-900 to-black text-white w-64 fixed inset-y-0 transform transition-transform duration-300 ease-in-out shadow-lg"
     :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
    <div class="p-4">
        <h2 class="text-3xl font-bold text-center tracking-wider">Breeze</h2>
    </div>
    <nav class="mt-6">
        <a href="dashboard"
           class="flex items-center py-3 px-4 rounded-lg transition duration-200 hover:bg-gray-700 hover:scale-105">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 10h11M9 21V3m0 0l-6 6m6-6l6 6"></path>
            </svg>
            Dashboard
        </a>
        <a href="kriteria"
           class="flex items-center py-3 px-4 rounded-lg transition duration-200 hover:bg-gray-700 hover:scale-105">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A4.992 4.992 0 019 16h6a4.992 4.992 0 013.879 1.804M9 16V12m6 0v4m-6 4h6"></path>
            </svg>
            Kriteria
        </a>
        <a href="calonkaryawan"
           class="flex items-center py-3 px-4 rounded-lg transition duration-200 hover:bg-gray-700 hover:scale-105">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 16l4-4 4 4M8 8l4 4 4-4"></path>
            </svg>
            Calon Karyawan
        </a>
        <a href="konversi"
           class="flex items-center py-3 px-4 rounded-lg transition duration-200 hover:bg-gray-700 hover:scale-105">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4l3 3m6 1.385V19a2 2 0 01-2 2H5a2 2 0 01-2-2v-2.615a1.997 1.997 0 01.757-1.554l7-4.09a2 2 0 012.486 0l7 4.09A1.997 1.997 0 0121 16.385z"></path>
            </svg>
            Konversi
        </a>
        <a href="#"
           class="flex items-center py-3 px-4 rounded-lg transition duration-200 hover:bg-gray-700 hover:scale-105">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 10-8 0v8a4 4 0 108 0V7z"></path>
            </svg>
            Hasil Akhir
        </a>
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
                <span class="text-gray-700 font-semibold"></span>
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
