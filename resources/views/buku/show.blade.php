<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku | {{ $buku->judul_buku }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background: linear-gradient(rgba(15, 17, 21, 0.85), rgba(15, 17, 21, 0.95)), 
                        url('https://i.pinimg.com/1200x/f3/b6/b2/f3b6b20b4358be6097f1c9d13d8d152a.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #e5e7eb;
        }

        .bat-card {
            background-color: rgba(26, 29, 35, 0.85);
            border: 1px solid rgba(250, 204, 21, 0.2);
            backdrop-filter: blur(12px);
        }

        .bat-header {
            background-color: rgba(20, 22, 26, 0.85);
            border-bottom: 2px solid #facc15;
        }

        .status-badge {
            background: rgba(250, 204, 21, 0.1);
            border: 1px solid rgba(250, 204, 21, 0.3);
            color: #facc15;
        }
    </style>
</head>
<body class="min-h-screen py-12 px-4">

    <div class="max-w-3xl mx-auto">
        <a href="{{ route('buku.index') }}" class="inline-flex items-center text-xs font-bold text-gray-400 hover:text-yellow-400 mb-6 transition-colors uppercase tracking-widest">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Database
        </a>

        <div class="bat-card rounded-2xl shadow-2xl overflow-hidden">
            <div class="bat-header px-8 py-10">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                    <div class="space-y-3">
                        <span class="px-3 py-1 status-badge text-[10px] font-black uppercase tracking-[0.2em] rounded-md">
                            {{ $buku->genre }}
                        </span>
                        <h1 class="text-3xl md:text-4xl font-black text-white leading-tight uppercase tracking-tighter italic">
                            {{ $buku->judul_buku }}
                        </h1>
                    </div>
                    <div class="bg-yellow-400 px-6 py-3 rounded-xl border border-yellow-500 shadow-[0_0_20px_rgba(250,204,21,0.2)] text-center min-w-[120px]">
                        <span class="block text-[10px] text-black font-black uppercase tracking-widest">Inventory</span>
                        <span class="text-3xl font-black text-black">{{ $buku->jumlah }}</span>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="md:col-span-1 space-y-8 border-r border-gray-800/50 pr-4">
                        <div>
                            <h3 class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2">Ref_Code</h3>
                            <p class="text-xl font-mono font-bold text-yellow-400">{{ $buku->kode_buku }}</p>
                        </div>
                        <div>
                            <h3 class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2">Classification</h3>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></span>
                                <p class="text-white font-bold text-sm uppercase">{{ $buku->genre }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2 space-y-4">
                        <h3 class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">Data_Description</h3>
                        <p class="text-gray-300 leading-relaxed text-lg italic bg-black/20 p-4 rounded-lg border border-gray-800">
                            "{{ $buku->deskripsi ?: 'No additional data recorded for this entry.' }}"
                        </p>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-gray-800 flex flex-wrap gap-4">
                    <a href="{{ route('buku.edit', $buku) }}" 
                       class="flex-1 md:flex-none text-center px-10 py-3 bg-yellow-400 hover:bg-yellow-500 text-black font-black text-xs rounded-lg transition shadow-lg uppercase tracking-widest">
                        Edit Record
                    </a>
                    
                    <form action="{{ route('buku.destroy', $buku) }}" method="POST" class="flex-1 md:flex-none">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('AUTHORIZE DELETE?')" 
                                class="w-full px-10 py-3 bg-transparent border border-red-600 text-red-600 hover:bg-red-600 hover:text-white font-black text-xs rounded-lg transition uppercase tracking-widest">
                            Delete Entry
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-between items-center text-[9px] text-gray-600 font-bold uppercase tracking-[0.3em]">
            <span>System: Wayne_OS v4.1</span>
            <span>Security: Level 5 Authorized</span>
        </div>
    </div>

</body>
</html>