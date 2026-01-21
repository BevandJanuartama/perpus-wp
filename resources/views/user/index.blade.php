<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 border-l-4 border-yellow-400 pl-4">
                <h1 class="text-3xl font-black text-white tracking-tighter">
                    GOTHAM <span class="text-yellow-400">ARCHIVES</span>: PUBLIC RECORDS
                </h1>
                <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mt-1">Wayne Enterprises Library System</p>
            </div>

            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-gray-700">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-700 text-yellow-400 uppercase text-xs tracking-widest">
                            <th class="px-6 py-4 font-black">Code</th>
                            <th class="px-6 py-4 font-black">Title</th>
                            <th class="px-6 py-4 font-black">Genre</th>
                            <th class="px-6 py-4 font-black">Stock</th>
                            <th class="px-6 py-4 font-black">Description</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300 divide-y divide-gray-700">
                        @forelse ($bukus as $buku)
                            <tr class="hover:bg-gray-750 transition-colors">
                                <td class="px-6 py-4 font-mono text-yellow-500">{{ $buku->kode_buku }}</td>
                                <td class="px-6 py-4 font-bold text-white">{{ $buku->judul_buku }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-gray-900 border border-gray-600 rounded text-[10px] uppercase font-bold">
                                        {{ $buku->genre }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $buku->jumlah }}</td>
                                <td class="px-6 py-4 text-sm text-gray-400">{{ Str::limit($buku->deskripsi, 50) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">
                                    No records found in Gotham Archives.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>