<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - LS Phone</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 font-sans text-gray-900 flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white p-10 rounded-2xl shadow-2xl border animate-fade-up">

        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo.png') }}" class="h-24" alt="LS Phone Logo">
        </div>

        <h2 class="text-2xl font-heading font-bold text-center mb-1">Login Admin</h2>
        <p class="text-gray-600 text-center text-sm mb-6">Masukkan email dan password admin</p>

        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-700 border border-red-300 rounded-lg text-sm text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block font-semibold mb-1">Email Admin</label>
                <div class="flex items-center border rounded-xl px-3 py-2.5 bg-gray-50">
                    <img src="{{ asset('images/email.png') }}" class="w-5 h-5 mr-2 opacity-70">
                    <input type="email" name="email" required class="flex-1 bg-transparent outline-none" placeholder="Email">
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-1">Password</label>
                <div class="flex items-center border rounded-xl px-3 py-2.5 bg-gray-50">
                    <img src="{{ asset('images/lock.png') }}" class="w-5 h-5 mr-2 opacity-70">
                    <input type="password" name="password" required class="flex-1 bg-transparent outline-none" placeholder="Masukkan password">
                </div>
            </div>

            <button type="submit" class="btn-hover w-full bg-black text-white font-semibold py-3 rounded-full shadow-lg transition">
                Login
            </button>
        </form>

        <p class="text-center text-xs text-gray-500 mt-6">
            © {{ date('Y') }} LS Phone. All Rights Reserved.
        </p>

    </div>

</body>
</html>
