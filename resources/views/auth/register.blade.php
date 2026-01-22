<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gotham City | New Recruit Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;900&family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #050505;
            background-image: radial-gradient(circle, rgba(255, 219, 21, 0.05) 0%, rgba(0,0,0,1) 80%);
        }
        .gotham-font { font-family: 'Orbitron', sans-serif; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md">
        <div class="mb-6 text-center">
            <div class="inline-block p-4 mb-4 border-4 border-[#ffdb15] rounded-full shadow-[0_0_20px_rgba(255,219,21,0.2)]">
                <svg width="50" height="30" viewBox="0 0 24 24" fill="#ffdb15" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C12 2 11 4 9 4C7 4 2 2 2 2C2 2 3 7 3 12C3 17 2 22 2 22C2 22 7 20 9 20C11 20 12 22 12 22C12 22 13 20 15 20C17 20 22 22 22 22C22 22 21 17 21 12C21 7 22 2 22 2C22 2 17 4 15 4C13 4 12 2 12 2Z"/>
                </svg>
            </div>
            <h2 class="gotham-font text-2xl font-black text-[#ffdb15] tracking-[0.2em] uppercase italic">
                Enlist <span class="text-gray-400 text-lg italic">Gotham</span>
            </h2>
            <div class="h-px w-24 bg-[#ffdb15] mx-auto mt-2 shadow-[0_0_10px_#ffdb15]"></div>
        </div>

        <div class="bg-[#111111] border border-gray-800 relative overflow-hidden shadow-[0_20px_60px_rgba(0,0,0,0.8)]">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-[#ffdb15] opacity-5 rounded-full blur-3xl"></div>
            
            <form action="{{ route('register') }}" method="POST" class="p-8 relative z-10">
                @csrf <div class="mb-5">
                    <label class="block gotham-font text-[10px] text-[#ffdb15] mb-2 tracking-widest uppercase">Assign Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" required autofocus
                        class="w-full bg-[#181818] border border-gray-700 text-gray-300 px-4 py-3 focus:outline-none focus:border-[#ffdb15] focus:ring-1 focus:ring-[#ffdb15] transition-all rounded-none"
                        placeholder="USERNAME">
                    @if($errors->has('username'))
                        <p class="text-red-500 text-[10px] mt-1 font-bold">> {{ $errors->first('username') }}</p>
                    @endif
                </div>

                <div class="mb-5">
                    <label class="block gotham-font text-[10px] text-[#ffdb15] mb-2 tracking-widest uppercase">Access Key</label>
                    <input type="password" name="password" required autocomplete="new-password"
                        class="w-full bg-[#181818] border border-gray-700 text-gray-300 px-4 py-3 focus:outline-none focus:border-[#ffdb15] focus:ring-1 focus:ring-[#ffdb15] transition-all rounded-none"
                        placeholder="••••••••">
                    @if($errors->has('password'))
                        <p class="text-red-500 text-[10px] mt-1 font-bold">> {{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="mb-8">
                    <label class="block gotham-font text-[10px] text-[#ffdb15] mb-2 tracking-widest uppercase">Verify Access Key</label>
                    <input type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full bg-[#181818] border border-gray-700 text-gray-300 px-4 py-3 focus:outline-none focus:border-[#ffdb15] focus:ring-1 focus:ring-[#ffdb15] transition-all rounded-none"
                        placeholder="••••••••">
                </div>

                <div class="flex flex-col gap-4">
                    <button type="submit" 
                        class="w-full bg-[#ffdb15] hover:bg-yellow-400 text-black font-black py-4 uppercase tracking-[0.2em] text-xs transition-all active:scale-95 gotham-font shadow-[0_5px_20px_rgba(255,219,21,0.1)]">
                        Initialize Protocol
                    </button>

                    <a href="{{ route('login') }}" class="text-center text-[10px] text-gray-500 hover:text-gray-300 transition-colors uppercase tracking-[0.1em]">
                        Already an active agent? <span class="text-[#ffdb15] font-bold underline">Login</span>
                    </a>
                </div>
            </form>

            <div class="h-1 w-full flex">
                <div class="w-full bg-gray-800">
                    <div class="h-full bg-[#ffdb15]" style="width: 33%"></div>
                </div>
            </div>
        </div>

        <p class="text-center mt-6 text-[9px] text-gray-700 uppercase tracking-widest">
            Authorized Personnel Only | System 7.4.1
        </p>
    </div>

    @if ($errors->any())
    <script>
        Swal.fire({
            background: '#111',
            color: '#ffdb15',
            title: '<span class="gotham-font text-sm">REGISTRATION FAILED</span>',
            html: `
                <div style="text-align: left; font-size: 11px; color: #ccc; font-family: monospace;">
                    @foreach ($errors->all() as $error)
                        <p style="margin-bottom: 4px;">> {{ $error }}</p>
                    @endforeach
                </div>
            `,
            icon: 'error',
            confirmButtonColor: '#ffdb15',
            confirmButtonText: '<span class="text-black font-bold">RE-INPUT</span>',
            customClass: {
                popup: 'border border-[#ffdb15] rounded-none'
            }
        });
    </script>
    @endif
</body>
</html>