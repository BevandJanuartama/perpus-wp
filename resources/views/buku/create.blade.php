<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru | Perpus-IT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

    @include('sweetalert::alert')

    <div class="w-full max-w-xl bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-8 py-6 bg-gradient-to-r from-emerald-600 to-teal-500">
            <h1 class="text-xl font-bold text-white flex items-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Registrasi Buku Baru
            </h1>
            <p class="text-emerald-50 text-sm opacity-90">Lengkapi formulir di bawah untuk menambah koleksi perpustakaan.</p>
        </div>

        <form action="{{ route('buku.store') }}" method="POST" class="p-8 space-y-5">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label for="kode_buku" class="text-sm font-semibold text-slate-700">Kode Buku</label>
                    <input type="text" name="kode_buku" id="kode_buku" 
                           class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all placeholder:text-slate-400 text-sm" 
                           placeholder="Misal: BK-001" required>
                </div>

                <div class="space-y-1.5">
                    <label for="jumlah" class="text-sm font-semibold text-slate-700">Jumlah Stok</label>
                    <input type="number" name="jumlah" id="jumlah" 
                           class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all text-sm" 
                           placeholder="0" required min="0">
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="judul_buku" class="text-sm font-semibold text-slate-700">Judul Buku</label>
                <input type="text" name="judul_buku" id="judul_buku" 
                       class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all placeholder:text-slate-400 text-sm" 
                       placeholder="Masukkan judul lengkap buku" required>
            </div>

            <div class="space-y-1.5">
                <label for="genre" class="text-sm font-semibold text-slate-700">Kategori Genre</label>
                <div class="relative group">
                    <select name="genre" id="genre" 
                            class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all text-sm appearance-none cursor-pointer pr-10" required>
                        <option value="" disabled selected>Pilih kategori...</option>
                        <option value="Ilmiah">Ilmiah</option>
                        <option value="Fantasi">Fantasi</option>
                        <option value="Romantis">Romantis</option>
                    </select>
                    
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-500 group-focus-within:text-emerald-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="deskripsi" class="text-sm font-semibold text-slate-700">Deskripsi Singkat</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" 
                          class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all text-sm resize-none" 
                          placeholder="Opsional: Tambahkan ringkasan buku..."></textarea>
            </div>

            <div class="flex items-center justify-between pt-6 mt-4 border-t border-slate-100">
                <a href="{{ route('buku.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-800 transition-colors">
                    ← Kembali ke daftar
                </a>
                <button type="submit" 
                        class="px-8 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-lg shadow-md shadow-emerald-100 transition-all active:scale-95">
                    Simpan Buku
                </button>
            </div>
        </form>
    </div>

</body>
</html>