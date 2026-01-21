<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOTHAM SECURITY - 403</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black flex items-center justify-center min-h-screen font-sans">
    <div class="text-center">
        <h1 class="text-[12rem] font-black text-gray-800 leading-none select-none">
            {{ $exception->getStatusCode() }}
        </h1>

        <div class="relative -mt-24">
            <h2 class="text-4xl font-black text-white tracking-tighter mb-2">
                FILE <span class="text-yellow-400">NOT FOUND</span>
            </h2>

            <p class="text-gray-500 font-bold uppercase tracking-[0.4em] text-xs mb-8">
                {{ $exception->getMessage() ?: 'The requested archive does not exist or has been redacted.' }}
            </p>

            <div class="flex justify-center gap-4">
                <a href="{{ url('/') }}" class="px-8 py-3 border border-yellow-400 text-yellow-400 font-black uppercase tracking-widest text-xs hover:bg-yellow-400 hover:text-black transition-all">
                    Back to Base
                </a>
            </div>
        </div>
    </div>
</body>
</html>