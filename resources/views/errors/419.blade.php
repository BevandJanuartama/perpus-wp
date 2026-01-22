<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 | Gotham Security</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;900&family=Inter:wght@300;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #050505;
            background-image: 
                linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.9)),
                repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(255, 219, 21, 0.03) 3px);
            color: #ffdb15;
        }
        .gotham-font { font-family: 'Orbitron', sans-serif; }
        .glitch {
            animation: glitch 1s linear infinite;
        }
        @keyframes glitch {
            2%, 64% { transform: translate(2px,0) skew(0deg); }
            4%, 60% { transform: translate(-2px,0) skew(0deg); }
            62% { transform: translate(0,0) skew(5deg); }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6 overflow-hidden">

    <div class="max-w-xl w-full text-center">
        <div class="mb-8 relative inline-block">
            <div class="text-9xl font-black opacity-10 gotham-font italic">419</div>
            <div class="absolute inset-0 flex items-center justify-center">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="currentColor" class="glitch">
                    <path d="M12 2L1 21h22L12 2zm0 3.99L19.53 19H4.47L12 5.99zM11 11v4h2v-4h-2zm0 6h2v2h-2v-2z"/>
                </svg>
            </div>
        </div>

        <h1 class="gotham-font text-2xl md:text-4xl font-black uppercase tracking-tighter mb-4">
            Security Token <span class="text-white">Invalidated</span>
        </h1>
        
        <div class="bg-yellow-400/5 border-l-4 border-yellow-400 p-4 mb-8 text-left">
            <p class="text-xs uppercase tracking-widest font-bold opacity-80 mb-2">> System Log:</p>
            <p class="text-sm font-mono text-gray-400 leading-relaxed italic">
                Sesi enkripsi Wayne Enterprises telah berakhir. Protokol keamanan mendeteksi ketidakaktifan yang berkepanjangan. Harap perbarui sinkronisasi terminal Anda.
            </p>
        </div>

        <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
            <button onclick="window.location.reload()" 
                class="px-8 py-3 bg-[#ffdb15] text-black font-black uppercase tracking-widest text-xs hover:bg-yellow-400 transition-all active:scale-95">
                Refresh Terminal
            </button>
            
            <a href="/" 
                class="px-8 py-3 border border-gray-800 text-gray-500 font-bold uppercase tracking-widest text-xs hover:text-[#ffdb15] hover:border-[#ffdb15] transition-all">
                Abort Mission
            </a>
        </div>

        <div class="mt-12 flex items-center justify-center gap-2 opacity-30">
            <div class="h-1 w-12 bg-[#ffdb15]"></div>
            <div class="h-1 w-1 bg-[#ffdb15]"></div>
            <div class="h-1 w-1 bg-[#ffdb15]"></div>
            <div class="text-[8px] uppercase font-black tracking-[0.5em] mx-2">Batcave-Mainframe</div>
            <div class="h-1 w-1 bg-[#ffdb15]"></div>
            <div class="h-1 w-1 bg-[#ffdb15]"></div>
            <div class="h-1 w-12 bg-[#ffdb15]"></div>
        </div>
    </div>

    <div class="fixed inset-0 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20"></div>

</body>
</html>