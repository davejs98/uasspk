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
        <div class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white transform lg:translate-x-0 transition-transform duration-300 ease-in-out"
             :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <div class="p-4">
                <h2 class="text-2xl font-semibold">Breeze</h2>
            </div>
            <nav class="mt-5">
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800">Dashboard</a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800">Charts</a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800">Tables</a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800">Settings</a>
            </nav>
        </div>

        <!-- Page Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow-md p-4 flex justify-between">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-700 focus:outline-none lg:hidden">
                    ☰
                </button>
                <div class="text-right">
                    <span class="text-gray-700 font-semibold">Henry Klein</span>
                </div>
            </header>

            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
