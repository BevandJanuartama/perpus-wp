<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry | Wayne Enterprises</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            /* Background Foto Batman dengan Overlay Gelap agar form kontras */
            background: linear-gradient(rgba(15, 17, 21, 0.8), rgba(15, 17, 21, 0.95)), 
                        url('https://i.pinimg.com/1200x/b7/a7/4a/b7a74a4d064156594c14cb86fa503161.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #e5e7eb;
        }

        /* Efek kartu transparan blur (Glassmorphism) */
        .bat-card {
            background-color: rgba(26, 29, 35, 0.85);
            border: 1px solid rgba(250, 204, 21, 0.2);
            backdrop-filter: blur(12px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        }

        .bat-header {
            background-color: rgba(20, 22, 26, 0.8);
            border-bottom: 1px solid rgba(250, 204, 21, 0.3);
        }

        /* Styling Input ala Bat-Computer */
        .bat-input {
            background-color: rgba(45, 49, 57, 0.8) !important;
            border: 1px solid rgba(63, 68, 78, 1) !important;
            color: white !important;
            transition: all 0.2s ease-in-out;
        }

        .bat-input:focus {
            border-color: #facc15 !important;
            box-shadow: 0 0 10px rgba(250, 204, 21, 0.3) !important;
            outline: none;
        }

        /* Scrollbar Kuning Batman */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0f1115; }
        ::-webkit-scrollbar-thumb { background: #facc15; border-radius: 10px; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">

    @include('sweetalert::alert')

    <div class="w-full max-w-2xl bat-card rounded-2xl overflow-hidden">
        <div class="bat-header px-8 py-6">
            <h1 class="text-2xl font-black text-yellow-400 uppercase tracking-tighter flex items-center gap-3">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l2.4 4.9 5.4.8-3.9 3.8.9 5.4-4.8-2.5-4.8 2.5.9-5.4-3.9-3.8 5.4-.8L12 2z"/>
                </svg>
                Update_Archive
            </h1>
            <p class="text-gray-400 text-xs mt-1 uppercase tracking-widest font-semibold">Modifikasi rekaman data perpustakaan Wayne Corp</p>
        </div>

        <form action="{{ route('buku.update', $buku) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="kode_buku" class="block text-xs font-bold text-gray-400 uppercase tracking-widest">ID_Kode Buku</label>
                    <input type="text" name="kode_buku" id="kode_buku" value="{{ $buku->kode_buku }}" 
                           class="bat-input w-full px-4 py-2.5 text-white text-sm rounded-lg block font-mono" 
                           placeholder="Contoh: B001" required>
                </div>

                <div class="space-y-2">
                    <label for="jumlah" class="block text-xs font-bold text-gray-400 uppercase tracking-widest">Unit ketersediaan</label>
                    <input type="number" name="jumlah" id="jumlah" value="{{ $buku->jumlah }}" 
                           class="bat-input w-full px-4 py-2.5 text-white text-sm rounded-lg block" 
                           required min="0">
                </div>
            </div>

            <div class="space-y-2">
                <label for="judul_buku" class="block text-xs font-bold text-gray-400 uppercase tracking-widest">Judul Lengkap</label>
                <input type="text" name="judul_buku" id="judul_buku" value="{{ $buku->judul_buku }}" 
                       class="bat-input w-full px-4 py-2.5 text-white text-sm rounded-lg block" 
                       placeholder="Masukkan judul buku..." required>
            </div>

            <div class="space-y-2">
                <label for="genre" class="block text-xs font-bold text-gray-400 uppercase tracking-widest">Klasifikasi Genre</label>
                <div class="relative">
                    <select name="genre" id="genre" 
                            class="bat-input w-full px-4 py-2.5 text-white text-sm rounded-lg block appearance-none cursor-pointer" required>
                        <option value="">Pilih Genre</option>
                        <option value="Ilmiah" {{ $buku->genre == 'Ilmiah' ? 'selected' : '' }}>Ilmiah</option>
                        <option value="Fantasi" {{ $buku->genre == 'Fantasi' ? 'selected' : '' }}>Fantasi</option>
                        <option value="Romantis" {{ $buku->genre == 'Romantis' ? 'selected' : '' }}>Romantis</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-yellow-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label for="deskripsi" class="block text-xs font-bold text-gray-400 uppercase tracking-widest">Ringkasan Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" 
                          class="bat-input w-full px-4 py-2.5 text-white text-sm rounded-lg block resize-none placeholder:text-gray-600" 
                          placeholder="Ceritakan sedikit tentang isi buku ini...">{{ $buku->deskripsi }}</textarea>
            </div>

            <div class="flex items-center justify-between pt-6 border-t border-gray-800">
                <a href="{{ route('buku.index') }}" 
                   class="text-xs font-bold text-gray-500 hover:text-white uppercase transition-colors tracking-tighter">
                   [ Batal ]
                </a>
                <button type="submit" 
                        class="px-10 py-3 text-xs font-black text-black bg-yellow-400 rounded-lg hover:bg-yellow-500 transition duration-200 shadow-[0_0_15px_rgba(250,204,21,0.4)] uppercase tracking-widest">
                    Commit Changes
                </button>
            </div>
        </form>
    </div>

</body>
</html>