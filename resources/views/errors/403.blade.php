<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOTHAM SECURITY - 403</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
    <body class="bg-black flex items-center justify-center min-h-screen font-sans">
        <div class="text-center p-10 border-2 border-red-600 bg-gray-900 shadow-[0_0_50px_rgba(220,38,38,0.2)]">
            <h1 class="text-8xl font-black text-white mb-2 tracking-tighter">
                {{ $exception->getStatusCode() }}
            </h1>
            
            <h2 class="text-xl font-bold text-red-600 uppercase tracking-[0.3em] mb-6">
                Forbidden Access
            </h2>

            <div class="bg-black p-4 mb-8 border border-gray-700">
                <p class="text-gray-400 font-mono text-sm">
                    SYSTEM_LOG: "{{ $exception->getMessage() ?: 'Access denied due to insufficient clearance.' }}"
                </p>
            </div>

            <a href="{{ url('/dashboard') }}" class="inline-block px-8 py-3 border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-all font-black uppercase tracking-widest text-xs">
                Return to Dashboard
            </a>
        </div>
    </body>
</html>