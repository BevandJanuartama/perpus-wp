<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - DataTables Tailwind</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
    <style>
        /* Menggunakan font yang lebih modern */
        body { font-family: 'Inter', sans-serif; }

        /* Customizing DataTables to look like Tailwind */
        .dataTables_wrapper .dataTables_length select {
            padding: 0.3rem 2rem 0.3rem 0.5rem;
            border-radius: 0.5rem;
            border-color: #e5e7eb;
            outline: none;
        }
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            padding: 0.4rem 1rem;
            margin-bottom: 1rem;
            outline: none;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #4f46e5 !important;
            color: white !important;
            border: none;
            border-radius: 0.5rem;
        }

        // Memaksa Header Tabel Rata Tengah
        table.dataTable thead th {
            text-align: center !important;
            vertical-align: middle;
            padding-right: 20px !important; 
        }

        //Merapikan posisi ikon sorting DataTables
        table.dataTable thead .sorting::after,
        table.dataTable thead .sorting_asc::after,
        table.dataTable thead .sorting_desc::after {
            right: 4px !important;
            opacity: 0.5;
        }
        table.dataTable thead .sorting::before,
        table.dataTable thead .sorting_asc::before,
        table.dataTable thead .sorting_desc::before {
            right: 10px !important;
            opacity: 0.5;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen py-10 px-4">

    @include('sweetalert::alert')

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Buku</h1>
            </div>
            <a href="{{ route('bukus.create') }}" 
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl shadow-lg shadow-indigo-100 transition-all font-semibold active:scale-95">
                + Tambah Buku Baru
            </a>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <table id="myTable" class="display w-full border-collapse">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Kode</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Genre</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Stok</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($bukus as $buku)
                    <tr class="hover:bg-gray-50/80 transition-all duration-200">
                        <td class="px-4 py-4 text-sm font-mono font-bold text-indigo-600 text-center">
                            {{ $buku->kode_buku }}
                        </td>

                        <td class="px-4 py-4">
                            <div class="text-sm font-semibold text-gray-900">{{ $buku->judul_buku }}</div>
                        </td>

                        <td class="px-4 py-4 text-center">
                            <div class="text-xs text-gray-500 italic">
                                {{ Str::limit($buku->deskripsi, 40) ?: '-' }}
                            </div>
                        </td>

                        <td class="px-4 py-4 text-center">
                            <span class="inline-block px-3 py-1 text-[10px] font-bold rounded-full bg-blue-50 text-blue-600 border border-blue-100">
                                {{ $buku->genre }}
                            </span>
                        </td>

                        <td class="px-4 py-4 text-center text-sm font-medium text-gray-700">
                            {{ $buku->jumlah }}
                        </td>

                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="flex justify-center items-center gap-2">
                                <a href="{{ route('bukus.show', $buku) }}" 
                                   class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-lg text-xs font-bold transition-colors duration-200">
                                    Detail
                                </a>

                                <a href="{{ route('bukus.edit', $buku) }}" 
                                   class="text-amber-600 hover:text-amber-900 bg-amber-50 hover:bg-amber-100 px-3 py-1.5 rounded-lg text-xs font-bold transition-colors duration-200">
                                    Edit
                                </a>

                                <form action="{{ route('bukus.destroy', $buku) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')" class="inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg text-xs font-bold transition-colors duration-200">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                },
                "pageLength": 10,
                "ordering": true,
                "responsive": true,
                "columnDefs": [
                    { "className": "dt-center", "targets": "_all" } // Tambahan DataTables untuk memaksa center di semua cell
                ]
            });
        });
    </script>
</body>
</html>