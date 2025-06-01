<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
    <div class="text-center space-y-6">
        <div class="text-8xl font-bold text-pink-500 drop-shadow">404</div>
        <p class="text-lg text-gray-300">Halaman tidak ditemukan atau tidak tersedia.</p>
        <a href="{{ route('dashboard') }}"
           class="inline-block bg-indigo-600 hover:bg-indigo-700 px-5 py-2 rounded font-semibold transition">
            🔙 Kembali ke Dashboard
        </a>
    </div>
</body>
</html>
