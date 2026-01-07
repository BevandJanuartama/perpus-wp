<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku | Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">

    @include('sweetalert::alert')

    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="bg-indigo-600 px-8 py-6">
            <h1 class="text-2xl font-bold text-white">Edit Informasi Buku</h1>
            <p class="text-indigo-100 text-sm mt-1">Perbarui detail buku yang ada di koleksi perpustakaan.</p>
        </div>

        <form action="{{ route('bukus.update', $buku) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="kode_buku" class="block text-sm font-semibold text-gray-700">Kode Buku</label>
                    <input type="text" name="kode_buku" id="kode_buku" value="{{ $buku->kode_buku }}" 
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block transition duration-200 outline-none" 
                           placeholder="Contoh: B001" required>
                </div>

                <div class="space-y-2">
                    <label for="jumlah" class="block text-sm font-semibold text-gray-700">Jumlah Stok</label>
                    <input type="number" name="jumlah" id="jumlah" value="{{ $buku->jumlah }}" 
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block transition duration-200 outline-none" 
                           required min="0">
                </div>
            </div>

            <div class="space-y-2">
                <label for="judul_buku" class="block text-sm font-semibold text-gray-700">Judul Lengkap</label>
                <input type="text" name="judul_buku" id="judul_buku" value="{{ $buku->judul_buku }}" 
                       class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block transition duration-200 outline-none" 
                       placeholder="Masukkan judul buku..." required>
            </div>

            <div class="space-y-2">
                <label for="genre" class="block text-sm font-semibold text-gray-700">Kategori Genre</label>
                <div class="relative">
                    <select name="genre" id="genre" 
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block transition duration-200 outline-none appearance-none" required>
                        <option value="">Pilih Genre</option>
                        <option value="Ilmiah" {{ $buku->genre == 'Ilmiah' ? 'selected' : '' }}>Ilmiah</option>
                        <option value="Fantasi" {{ $buku->genre == 'Fantasi' ? 'selected' : '' }}>Fantasi</option>
                        <option value="Romantis" {{ $buku->genre == 'Romantis' ? 'selected' : '' }}>Romantis</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label for="deskripsi" class="block text-sm font-semibold text-gray-700">Deskripsi Singkat</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" 
                          class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block transition duration-200 outline-none resize-none" 
                          placeholder="Ceritakan sedikit tentang isi buku ini...">{{ $buku->deskripsi }}</textarea>
            </div>

            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
                <a href="{{ route('bukus.index') }}" 
                   class="px-6 py-2.5 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 transition duration-200 shadow-lg shadow-indigo-200">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</body>
</html>