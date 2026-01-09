<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Data - Wayne Enterprises</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            /* Menggunakan Background Foto Batman dengan Overlay Gelap */
            background: linear-gradient(rgba(15, 17, 21, 0.8), rgba(15, 17, 21, 0.9)), 
                        url('https://i.pinimg.com/1200x/b7/a7/4a/b7a74a4d064156594c14cb86fa503161.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #e5e7eb;
        }

        /* Bat-Card dengan efek Glassmorphism */
        .bat-card {
            background-color: rgba(26, 29, 35, 0.85);
            border: 1px solid rgba(250, 204, 21, 0.2);
            backdrop-filter: blur(12px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* Header Card yang lebih gelap */
        .bat-header {
            background-color: rgba(20, 22, 26, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Custom Input Styling */
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

        /* Scrollbar kustom agar tetap tema dark */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0f1115; }
        ::-webkit-scrollbar-thumb { background: #facc15; border-radius: 10px; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

    @include('sweetalert::alert')

    <div class="w-full max-w-xl bat-card rounded-2xl overflow-hidden">
        <div class="px-8 py-6 bat-header">
            <h1 class="text-xl font-bold text-yellow-400 flex items-center gap-3 uppercase tracking-wider">
                <svg class="w-6 h-6 drop-shadow-[0_0_5px_rgba(250,204,21,0.5)]" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l2.4 4.9 5.4.8-3.9 3.8.9 5.4-4.8-2.5-4.8 2.5.9-5.4-3.9-3.8 5.4-.8L12 2z"/>
                </svg>
                Initialize Entry
            </h1>
            <p class="text-gray-400 text-xs mt-1 font-medium tracking-tight">Sistem Input Data Koleksi Wayne Enterprises</p>
        </div>

        <form action="{{ route('buku.store') }}" method="POST" class="p-8 space-y-5">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label for="kode_buku" class="text-xs font-bold text-gray-400 uppercase tracking-widest">ID_Kode Buku</label>
                    <input type="text" name="kode_buku" id="kode_buku" 
                           class="bat-input w-full px-4 py-2.5 rounded-lg text-sm font-mono placeholder:text-gray-600" 
                           placeholder="BK-000" required>
                </div>

                <div class="space-y-1.5">
                    <label for="jumlah" class="text-xs font-bold text-gray-400 uppercase tracking-widest">Jumlah Unit</label>
                    <input type="number" name="jumlah" id="jumlah" 
                           class="bat-input w-full px-4 py-2.5 rounded-lg text-sm" 
                           placeholder="0" required min="0">
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="judul_buku" class="text-xs font-bold text-gray-400 uppercase tracking-widest">Judul Lengkap</label>
                <input type="text" name="judul_buku" id="judul_buku" 
                       class="bat-input w-full px-4 py-2.5 rounded-lg text-sm placeholder:text-gray-600" 
                       placeholder="Masukkan judul buku..." required>
            </div>

            <div class="space-y-1.5">
                <label for="genre" class="text-xs font-bold text-gray-400 uppercase tracking-widest">Klasifikasi Genre</label>
                <div class="relative">
                    <select name="genre" id="genre" 
                            class="bat-input w-full px-4 py-2.5 rounded-lg text-sm appearance-none cursor-pointer pr-10" required>
                        <option value="" disabled selected class="text-gray-500">Pilih klasifikasi...</option>
                        <option value="Ilmiah">Ilmiah</option>
                        <option value="Fantasi">Fantasi</option>
                        <option value="Romantis">Romantis</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-yellow-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="deskripsi" class="text-xs font-bold text-gray-400 uppercase tracking-widest">Deskripsi Ringkas</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" 
                          class="bat-input w-full px-4 py-2.5 rounded-lg text-sm resize-none placeholder:text-gray-600" 
                          placeholder="Tambahkan catatan jika diperlukan..."></textarea>
            </div>

            <div class="flex items-center justify-between pt-6 mt-4 border-t border-gray-700/50">
                <a href="{{ route('buku.index') }}" class="text-xs font-bold text-gray-500 hover:text-yellow-400 transition-colors uppercase tracking-tighter">
                    ← Kembali
                </a>
                <button type="submit" 
                        class="px-8 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-black text-xs font-black rounded-lg shadow-[0_0_15px_rgba(250,204,21,0.3)] transition-all active:scale-95 uppercase tracking-widest">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>

</body>
</html>