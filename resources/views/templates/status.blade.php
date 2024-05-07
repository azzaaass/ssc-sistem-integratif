@php
    $status_name = [
        'Memberi revisi',
        'Revisi diterima',
        'Revisi diterima sebagian',
        'Revisi ditolak',
        'Mengirim ke PIC',
        'Surat selesai',
        'Surat ditolak',
    ];

@endphp
<div class="{{ $is_revisi ? 'max-w-5xl' : 'max-w-xl' }} mx-auto bg-white shadow-md rounded-lg px-20 pt-10 pb-14">
    <p class="block tx-gray text-lg font-semibold mb-1.5">Antrean No {{ $antrean_surat }}</p>
    <br>
    <div class="relative flex flex-row items-center">
        <div class="absolute z-1 p-0.5 bg-[#b6272c] w-full"></div>
        <div class="absolute z-2 flex gap-6">
            <div class="group/info rounded-[100%] bg-[#278A0E] p-3 w-min">
                <div
                    class="absolute top-8 shadow-sm px-5 py-3 border-2 border-[#d9d8d8] bg-white w-96 rounded-md hidden gap-4 items-center group-hover/info:flex duration-200">
                    <img src="https://source.unsplash.com/random/?profile" alt="" class="w-10 h-10 object-cover">
                    <div class="w-full">
                        <div class="flex justify-between items-center">
                            <p class="text-sm font-semibold">{{ $surat->user->name }}</p>
                            <p class="text-xs">{{ $surat->created_at }}</p>
                        </div>
                        <p class="text-sm mt-1 font-semibold">Membuat surat</p>
                    </div>

                </div>
            </div>
            @foreach ($revisis as $revisi)
                @php
                    if ($revisi->status == '0' || $revisi->status == '3' || $revisi->status == '6') {
                        $status_color = 'bg-[#b6272c]'; // red
                    } elseif ($revisi->status == '1' || $revisi->status == '4') {
                        $status_color = 'bg-[#013056]'; // blue
                    } elseif ($revisi->status == '2') {
                        $status_color = 'bg-[#8A4F0E]'; // yellow
                    } elseif ($revisi->status == '5') {
                        $status_color = 'bg-[#278A0E]'; // green
                    }
                @endphp
                <div class="group/info rounded-[100%] {{ $status_color }} p-3 w-min">
                    <div
                        class="absolute top-8 shadow-sm px-5 py-3 border-2 border-[#d9d8d8] bg-white w-96 rounded-md hidden gap-4 items-center group-hover/info:flex duration-200">
                        <img src="https://source.unsplash.com/random/?profile" alt=""
                            class="w-10 h-10 object-cover">
                        <div class="w-full">
                            <div class="flex justify-between items-center">
                                <p class="text-sm font-semibold">{{ $revisi->admin->name }}</p>
                                <p class="text-xs">{{ $revisi->created_at }}</p>
                            </div>
                            {{-- @dd($revisi) --}}
                            @php
                                $pic_name = null;

                                if (isset($revisi->pic_name)) {
                                    $pic_name = ' [' . $revisi->pic_name . '] ';
                                }
                            @endphp
                            <p class="text-sm mt-1"><span
                                    class="font-semibold">{{ $status_name[intval($revisi->status)] . $pic_name }}</span>
                                |
                                {{ $revisi->message }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($is_revisi)
                <div class="group/info rounded-[100%] bg-[#013056] p-3 w-min">
                    <div
                        class="absolute top-8 shadow-sm px-5 py-3 border-2 border-[#d9d8d8] bg-white w-96 rounded-md hidden gap-4 items-center group-hover/info:flex duration-200">
                        <img src="https://source.unsplash.com/random/?profile" alt=""
                            class="w-10 h-10 object-cover">
                        <div class="w-full">
                            <div class="flex justify-between items-center">
                                <p class="text-sm font-semibold">{{ $surat->user->name }}</p>
                                <p class="text-xs">Now</p>
                            </div>
                            <p class="text-sm mt-1"><span class="font-semibold">Melakukan revisi</span> | Menunggu
                                respon admin</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<br>
