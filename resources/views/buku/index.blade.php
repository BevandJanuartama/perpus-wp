<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wayne Corp - Database</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background: linear-gradient(rgba(15, 17, 21, 0.85), rgba(15, 17, 21, 0.95)), 
                        url('https://i.pinimg.com/736x/25/24/84/25248491ab78751134d1fa72aec0fe0f.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #e5e7eb;
        }
        .bat-card {
            background-color: rgba(26, 29, 35, 0.8);
            border: 1px solid rgba(250, 204, 21, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 12px;
        }

        #filterGenre {
            background: rgba(15, 17, 21, 0.9);
            border: 1px solid rgba(250, 204, 21, 0.3);
            color: #facc15;
            font-family: monospace;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            cursor: pointer;
            transition: all 0.3s;
        }

        #filterGenre:hover {
            border-color: #facc15;
            box-shadow: 0 0 10px rgba(250, 204, 21, 0.2);
        }

        /* DataTables Custom UI */
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background-color: rgba(45, 49, 57, 0.8) !important;
            border: 1px solid #3f444e !important;
            color: white !important;
            font-size: 12px;
            text-transform: uppercase;
        }

        table.dataTable thead th {
            background-color: rgba(20, 22, 26, 0.9) !important;
            color: #facc15 !important;
            border-bottom: 2px solid #facc15 !important;
        }

        table.dataTable tbody tr {
            background-color: transparent !important;
        }

        table.dataTable tbody tr:hover {
            background-color: rgba(250, 204, 21, 0.05) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #facc15 !important;
            color: #000 !important;
            border-radius: 6px;
            font-weight: bold;
        }

        table.dataTable thead th {
            text-align: center !important;
            vertical-align: middle !important;
        }

        table.dataTable tbody td {
            text-align: center;
            vertical-align: middle;
        }

        table.dataTable tbody td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<body class="min-h-screen py-10 px-4">

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div class="text-center md:text-left">
                <h1 class="text-4xl font-black text-white tracking-tighter drop-shadow-lg">
                    GOTHAM <span class="text-yellow-400">ARCHIVES</span>
                </h1>
                <p class="text-gray-400 text-xs font-bold tracking-[0.3em] uppercase mt-1">Wayne Enterprises Security System</p>
            </div>
            
            <div class="flex items-center gap-4">
                <a href="{{ route('buku.create') }}" 
                class="bg-yellow-400 hover:bg-yellow-500 text-black px-8 py-3 rounded-md shadow-[0_0_20px_rgba(250,204,21,0.3)] transition-all font-black uppercase tracking-widest text-xs active:scale-95">
                    + Add Record
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-md shadow-[0_0_20px_rgba(220,38,38,0.3)] transition-all font-black uppercase tracking-widest text-xs active:scale-95">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="bat-card p-6 shadow-2xl">
            <div class="bat-filter-container mb-2 p-4 flex flex-wrap items-center gap-6">
                <div class="flex flex-col gap-1">
                    <span class="text-[10px] text-yellow-400 font-black tracking-widest uppercase">Encryption Filter</span>
                    <div class="flex items-center gap-3">
                        <select id="filterGenre" class="px-4 py-2 rounded-sm text-xs font-bold outline-none border border-yellow-400/30">
                            <option value="">ALL SECTORS</option>
                            <option value="Ilmiah">SCIENTIFIC / ILMIAH</option>
                            <option value="Fantasi">FANTASY / FANTASI</option>
                            <option value="Romantis">ROMANTIC / ROMANTIS</option>
                        </select>
                    </div>
                </div>
            </div>

            <table id="myTable" class="display w-full">
                <thead>
                    <tr>
                        <th class="text-xs uppercase">Code</th>
                        <th class="text-xs uppercase">Title</th>
                        <th class="text-xs uppercase">Genre</th>
                        <th class="text-xs uppercase text-center">Stock</th>
                        <th class="text-xs uppercase text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($bukus as $buku)
                    <tr class="border-b border-gray-800/50">
                        <td class="font-mono text-yellow-400 font-bold px-4 py-4">{{ $buku->kode_buku }}</td>
                        <td class="font-semibold text-white px-4 py-4 uppercase tracking-tight">{{ $buku->judul_buku }}</td>
                        <td class="px-4 py-4">
                            <span class="px-2 py-0.5 rounded bg-yellow-400/10 text-yellow-400 border border-yellow-400/20 text-[10px] font-bold uppercase">
                                {{ $buku->genre }}
                            </span>
                        </td>
                        <td class="text-center px-4 py-4">{{ $buku->jumlah }}</td>
                        <td class="px-4 py-4">
                            <div class="flex justify-center items-center gap-4 font-bold text-[11px] tracking-widest">
                                <a href="{{ route('buku.show', $buku) }}" 
                                class="text-gray-400 hover:text-cyan-400 transition-colors duration-200">
                                    DETAIL
                                </a>
                                
                                <span class="text-gray-700">|</span>

                                <a href="{{ route('buku.edit', $buku) }}" 
                                class="text-yellow-400 hover:text-yellow-200 transition-colors duration-200">
                                    EDIT
                                </a>

                                <span class="text-gray-700">|</span>

                                <form action="{{ route('buku.destroy', $buku) }}" method="POST" class="inline" 
                                    onsubmit="return confirm('AUTHORIZE PURGE?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-400 transition-colors duration-200">
                                        DELETE
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
            var table = $('#myTable').DataTable({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json" },
                "pageLength": 10
            });

            // Filter logic
            $('#filterGenre').on('change', function() {
                var selectedGenre = $(this).val();
                // Column 2 is Genre
                table.column(2).search(selectedGenre).draw();
            });
        });
    </script>
</body>
</html>