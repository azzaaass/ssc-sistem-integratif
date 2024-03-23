<div class="{{ $is_revisi ? 'max-w-5xl' : 'max-w-xl' }} mx-auto bg-white shadow-md rounded-lg px-20 pt-10 pb-14">
    <p class="block tx-gray text-lg font-semibold mb-1.5">Antrean No 4</p>
    <br>
    <div class="relative flex flex-row items-center">
        <div class="absolute z-1 p-0.5 bg-[#b6272c] w-full"></div>
        <div class="absolute z-2 flex gap-6">
            <div class="group/info rounded-[100%] bg-[#013056] p-3 w-min">
                <div
                    class="absolute top-8 shadow-sm px-5 py-3 border-2 border-[#d9d8d8] bg-white w-96 rounded-md hidden gap-4 items-center group-hover/info:flex duration-200">
                    <img src="https://source.unsplash.com/random/?profile" alt="" class="w-10 h-10 object-cover">
                    <div class="w-full">
                        <div class="flex justify-between items-center">
                            <p class="text-sm font-semibold">{{ $surat->user->name }}</p>
                            <p class="text-xs">{{ $surat->created_at }}</p>
                        </div>
                        <p class="text-sm mt-1">Membuat surat</p>
                    </div>

                </div>
            </div>
            @foreach ($revisis as $revisi)
                <div class="group/info rounded-[100%] bg-[#b6272c] p-3 w-min">
                    <div
                        class="absolute top-8 shadow-sm px-5 py-3 border-2 border-[#d9d8d8] bg-white w-96 rounded-md hidden gap-4 items-center group-hover/info:flex duration-200">
                        <img src="https://source.unsplash.com/random/?profile" alt=""
                            class="w-10 h-10 object-cover">
                        <div class="w-full">
                            <div class="flex justify-between items-center">
                                <p class="text-sm font-semibold">{{ $revisi->admin->name }}</p>
                                <p class="text-xs">{{ $revisi->created_at }}</p>
                            </div>
                            <p class="text-sm mt-1">{{ $revisi->message }}</p>
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
                            <p class="text-sm mt-1">Melakukan revisi -> Menunggu respon admin</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
