<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gotham City | Secure Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;900&family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #050505;
            background-image: radial-gradient(circle, rgba(255, 219, 21, 0.05) 0%, rgba(0,0,0,1) 70%);
        }
        .gotham-font { font-family: 'Orbitron', sans-serif; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md">
        <div class="mb-8 text-center">
            <div class="inline-block p-4 mb-4 border-4 border-[#ffdb15] rounded-full shadow-[0_0_20px_rgba(255,219,21,0.2)]">
                <svg width="50" height="30" viewBox="0 0 24 24" fill="#ffdb15" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C12 2 11 4 9 4C7 4 2 2 2 2C2 2 3 7 3 12C3 17 2 22 2 22C2 22 7 20 9 20C11 20 12 22 12 22C12 22 13 20 15 20C17 20 22 22 22 22C22 22 21 17 21 12C21 7 22 2 22 2C22 2 17 4 15 4C13 4 12 2 12 2Z"/>
                </svg>
            </div>
            <h1 class="gotham-font text-3xl font-black text-[#ffdb15] tracking-widest uppercase italic">Gotham City</h1>
            <p class="text-[10px] text-gray-500 tracking-[0.5em] uppercase mt-2">Central Security Database</p>
        </div>

        <div class="bg-[#121212] border border-gray-800 shadow-[0_0_50px_rgba(0,0,0,1)] relative overflow-hidden">
            <div class="h-1 w-full bg-[#ffdb15]"></div>
            
            <form action="{{ route('login') }}" method="POST" class="p-8">
                @csrf <div class="mb-6">
                    <label class="block gotham-font text-[10px] text-[#ffdb15] mb-2 tracking-widest uppercase">Agent Identifier</label>
                    <input type="text" name="username" value="{{ old('username') }}" required autofocus
                        class="w-full bg-[#1a1a1a] border border-gray-700 text-gray-300 px-4 py-3 focus:outline-none focus:border-[#ffdb15] focus:ring-1 focus:ring-[#ffdb15] transition-all placeholder-gray-600 rounded-none"
                        placeholder="USERNAME">
                    @if($errors->has('username'))
                        <p class="text-red-500 text-[10px] mt-2 uppercase font-bold">> {{ $errors->first('username') }}</p>
                    @endif
                </div>

                <div class="mb-6">
                    <label class="block gotham-font text-[10px] text-[#ffdb15] mb-2 tracking-widest uppercase">Encryption Key</label>
                    <input type="password" name="password" required autocomplete="current-password"
                        class="w-full bg-[#1a1a1a] border border-gray-800 text-gray-300 px-4 py-3 focus:outline-none focus:border-[#ffdb15] focus:ring-1 focus:ring-[#ffdb15] transition-all placeholder-gray-600 rounded-none"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between mb-8">
                    <label class="flex items-center text-xs text-gray-500 cursor-pointer uppercase tracking-tighter hover:text-gray-300">
                        <input type="checkbox" name="remember" class="mr-2 accent-[#ffdb15] bg-black border-gray-700">
                        Stay Authorized
                    </label>
                    <a href="{{ route('register') }}" class="text-[10px] text-gray-600 hover:text-[#ffdb15] transition-colors uppercase font-bold tracking-tighter underline decoration-[#ffdb15]">
                        New Recruit?
                    </a>
                </div>

                <button type="submit" 
                    class="w-full bg-[#ffdb15] hover:bg-yellow-400 text-black font-black py-4 uppercase tracking-[0.2em] text-sm transition-all active:scale-95 shadow-[0_5px_15px_rgba(255,219,21,0.2)] gotham-font">
                    Login Terminal
                </button>
            </form>
        </div>

        <p class="text-center mt-8 text-[9px] text-gray-600 uppercase tracking-widest">
            Property of Wayne Enterprises &copy; 2026
        </p>
    </div>

    @if ($errors->any())
    <script>
        Swal.fire({
            background: '#121212',
            color: '#ffdb15',
            title: '<span class="gotham-font">ACCESS DENIED</span>',
            html: `
                <div style="text-align: left; font-size: 12px; font-family: monospace; color: #ccc;">
                    @foreach ($errors->all() as $error)
                        <p style="margin-bottom: 5px;">> ERROR: {{ $error }}</p>
                    @endforeach
                </div>
            `,
            icon: 'error',
            confirmButtonColor: '#ffdb15',
            confirmButtonText: '<span style="color:#000; font-weight:bold">RETRY</span>',
            customClass: {
                popup: 'border-2 border-[#ffdb15] rounded-none'
            }
        });
    </script>
    @endif
</body>
</html>