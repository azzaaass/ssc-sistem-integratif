@extends('templates.user.navbar')

@section('container')
    <div class="flex justify-evenly w-full">
        <div class="w-[45%]">
            <p class="tx-red font-semibold text-3xl">SSC <span class="tx-gray font-light text-sm">
                    <em>(student service center)</em></span></p>
            <p class="tx-gray font-light text-sm leading-loose">Ditunjukkan untuk mempermudah perangkat kerja serta mahasiswa
                Institut Teknologi Telkom Surabaya untuk melakukan pelaporan
                pemintaan bantuan, demi terciptanya lingkungan kerja serta perkuliahan
                yang lebih baik dan efisien. Guna mendukung perkembangan mahasiswa.</p>
            <p class="mt-3 tx-gray font-light text-xs">Buat surat, Pantau, Ambil</p>
            <br>
            <div class="w-fit bg-gradient-to-t from-[#B6272C] to-[#ED212B] rounded-lg">
                <p class="py-1.5 px-5 text-white text-sm font-semibold">Lihat layanan</p>
            </div>
        </div>
        <div class="w-[45%]">
            <img src="{{ asset('images/banner-ssc.png') }}" alt="" class="2xl:w-[900px] lg:w-[500px]">
        </div>
    </div>
@endsection
