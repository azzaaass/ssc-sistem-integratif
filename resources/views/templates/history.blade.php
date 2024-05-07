<div class=" mx-auto bg-white shadow-md rounded-lg px-20 py-14">
    <div class="bg-gray-200 p-2 rounded-md flex justify-between gap-5">
        <div class="relative w-full">
            <input type="text" id="search" name="search" oninput="getDataSurat()"
                class="w-[50%] pl-10 pr-4 py-1.5 rounded-lg text-sm tx-gray border border-gray-300 focus:border-[#C16A0B] focus:outline-none"
                placeholder="Search...">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fa-solid fa-magnifying-glass tx-gray"></i>
            </div>
        </div>
        <div class="flex justify-evenly gap-4">
            <div class="flex gap-2 border border-gray-300 bg-white px-3 rounded-md">
                <div class="flex items-center">
                    <i class="fa-solid fa-list"></i>
                </div>
                <p class="flex items-center">|</p>
                <div class="flex items-center">
                    <i class="fa-solid fa-table-cells-large"></i>
                </div>
            </div>
            <div class="relative">
                <p class="pl-10 pr-4 py-1.5 rounded-lg text-sm tx-gray border border-gray-300 bg-white">Filter</p>
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fa-solid fa-filter"></i>
                </div>
            </div>
        </div>
    </div>
    <br>
    <table class="min-w-full bg-white rounded-lg overflow-hidden">
        <thead class="bg-gray-200 text-gray-800 uppercase text-sm font-semibold text-left">
            <tr>
                <th class="py-3 px-4">ID</th>
                <th class="py-3 px-4">Tipe Surat</th>
                <th class="py-3 px-4">Estimasi</th>
                <th class="py-3 px-4 text-left">
                    <div class="text-left">
                        <select type="text" id="status" name="status" onchange="getDataSurat()" required
                            class="bg-gray-100 text-gray-800 uppercase text-sm font-bold">
                            <option value="0" selected>On-going</option>
                            <option value="1">Selesai</option>
                        </select>
                    </div>
                </th>
                <th class="py-3 px-4">Tanggal Pembuatan</th>
                <th class="py-3 px-4">Action</th>
            </tr>
        </thead>
        <tbody id="surat-table-body" class="text-gray-700">
            @foreach ($surats as $surat)
                <tr class="text-sm even:bg-gray-100">
                    <td class="py-3 px-4">{{ $surat->id }}</td>
                    <td class="py-3 px-4">{{ $surat->tipe->tipe_surat }} </td>
                    <td class="py-3 px-4">{{ $surat->estimasi }} Hari</td>
                    <td class="py-3 px-4">{{ $surat->status == '0' ? 'On-going' : 'Selesai' }}</td>
                    <td class="py-3 px-4">
                        {{ \Carbon\Carbon::parse($surat->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                    </td>
                    <td class="px-4"><a href="{{ $surat_url . $surat->id }}">
                            <p class="bg-[#013056] w-fit rounded text-xs text-white py-1 px-2 font-semibold">Detail</p>
                        </a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-start my-6">
        <nav id="pagination-nav" class="inline-flex">
            {{-- Previous Page Link --}}
            @if ($surats->onFirstPage())
                <span
                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 cursor-default rounded-md leading-5">
                    &laquo; Previous
                </span>
            @else
                <a href="{{ $surats->previousPageUrl() }}" rel="prev"
                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 cursor-default rounded-md leading-5 hover:bg-gray-100">
                    &laquo; Previous
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($surats->links()->elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default rounded-md leading-5">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $surats->currentPage())
                            <span aria-current="page"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-[#b6272c] bg-white border border-gray-300 cursor-default rounded-md leading-5">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md leading-5 hover:bg-gray-50">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($surats->hasMorePages())
                <a href="{{ $surats->nextPageUrl() }}" rel="next"
                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 cursor-default rounded-md leading-5 hover:bg-gray-100">
                    Next &raquo;
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 cursor-default rounded-md leading-5">
                    Next &raquo;
                </span>
            @endif
        </nav>
    </div>
</div>
