<!-- resources/views/admin/partials/table.blade.php -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-4 bg-green-50">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-700">{{ $title }}</h3>
            <div class="relative">
                <input type="text" placeholder="Search..." class="pl-8 pr-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-green-500">
                <svg class="w-5 h-5 text-gray-500 absolute left-2 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-green-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">NIK</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Jenis Surat</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Jam</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Dokumen</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- You can loop through your data here when you have the backend ready -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-700">Bagas Saras Budi Prasetia</td>
                    <td class="px-6 py-4 text-sm text-gray-700">3325081234567890</td>
                    <td class="px-6 py-4 text-sm text-gray-700">Surat Keterangan</td>
                    <td class="px-6 py-4 text-sm text-gray-700">09:30</td>
                    <td class="px-6 py-4 flex items-center space-x-2">
                        <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.5 4.5-4.5 4.5M9 20H4V4h16v8m-9 4h5" />
                            </svg>
                            View
                        </a>
                        <a href="#" download class="text-green-600 hover:text-green-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                            </svg>
                            Download
                        </a>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-700">Sumbul</td>
                    <td class="px-6 py-4 text-sm text-gray-700">33260987120001</td>
                    <td class="px-6 py-4 text-sm text-gray-700">Surat Keterangan</td>
                    <td class="px-6 py-4 text-sm text-gray-700">11:30</td>
                    <td class="px-6 py-4 flex items-center space-x-2">
                        <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.5 4.5-4.5 4.5M9 20H4V4h16v8m-9 4h5" />
                            </svg>
                            View
                        </a>
                        <a href="#" download class="text-green-600 hover:text-green-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                            </svg>
                            Download
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>