<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku | {{ $buku->judul_buku }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen py-12 px-4">

    <div class="max-w-3xl mx-auto">
        <a href="{{ route('buku.index') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 mb-6 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Daftar Koleksi
        </a>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="bg-slate-900 px-8 py-10 text-white">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div class="space-y-2">
                        <span class="px-3 py-1 bg-indigo-500 text-xs font-bold uppercase tracking-wider rounded-full">
                            {{ $buku->genre }}
                        </span>
                        <h1 class="text-3xl md:text-4xl font-bold leading-tight">{{ $buku->judul_buku }}</h1>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md px-6 py-3 rounded-2xl border border-white/20 text-center">
                        <span class="block text-xs text-slate-300 uppercase tracking-widest">Stok Tersedia</span>
                        <span class="text-2xl font-bold">{{ $buku->jumlah }}</span>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="md:col-span-1 space-y-6">
                        <div>
                            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Kode Referensi</h3>
                            <p class="text-lg font-mono font-bold text-slate-800">{{ $buku->kode_buku }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Kategori</h3>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="w-3 h-3 rounded-full bg-indigo-500"></span>
                                <p class="text-slate-700 font-medium">{{ $buku->genre }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2 space-y-4">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest">Sinopsis / Deskripsi</h3>
                        <p class="text-slate-600 leading-relaxed text-lg italic">
                            {{ $buku->deskripsi ?: 'Tidak ada deskripsi tersedia untuk buku ini.' }}
                        </p>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-slate-100 flex flex-wrap gap-4">
                    <a href="{{ route('buku.edit', $buku) }}" 
                       class="flex-1 md:flex-none text-center px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition shadow-lg shadow-indigo-100">
                        Edit Informasi
                    </a>
                    <form action="{{ route('buku.destroy', $buku) }}" method="POST" class="flex-1 md:flex-none">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')" 
                                class="w-full px-8 py-3 bg-white border border-red-200 text-red-600 hover:bg-red-50 font-bold rounded-xl transition">
                            Hapus Buku
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>