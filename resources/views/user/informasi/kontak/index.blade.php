@extends('templates.user.navbar')

@section('container')
    @php
        use Carbon\Carbon;
    @endphp
    {{-- Create data --}}
    <div id="panel-delete"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 bg-white shadow-xl shadow-gray-400 rounded px-8 pt-6 pb-8 mb-4 hidden">
        <h2 class="text-md font-semibold mb-1">Masukan keluhan anda</h2>
        <p class="text-gray-700 mb-6 text-sm">Chat dapat dilakukan setelah membuat topik.</p>
        <div class="">
            <form action="/kontak" method="POST">
                @csrf
                @method('POST')
                <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                {{-- Topik permasalahan --}}
                <div class="mt-5">
                    <label for="topic" class="block tx-gray text-sm font-semibold mb-1.5">Topic</label>
                    <input type="text" id="topic" name="topic" required
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                </div>

                <br>
                <div class="flex items-center justify-between">

                    <button type="submit"
                        class="text-sm bg-gradient-to-b from-[#ED212B] to-[#B6272C] hover:to-[#ED212B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">Buat
                        chat</button>
                    <div class="text-sm bg-gradient-to-b from-gray-200 to-gray-300 hover:to-gray-400 text-gray-800 font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline"
                        onclick="panelDelete()">Batal</div>
                </div>
            </form>
        </div>
    </div>
    {{-- Create data --}}
    <button type="button" onclick="panelDelete()"
        class="text-sm bg-gradient-to-b from-[#ED212B] to-[#B6272C] hover:to-[#ED212B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">Mulai
        chat</button>
    <br>
    <br>

    {{-- @dd($kontaks['kontaks']) --}}
    <div id="container-kontak">
        @foreach ($kontaks['kontaks'] as $kontak)
            <a href="/detailKontak/{{ $kontak['id'] }}">
                <div class="mb-2 bg-white w-full rounded-lg border border-gray-200 p-3 flex justify-between items-center">
                    <p class="text-sm">{{ $kontak['topic'] }}</p>
                    <div class="text-end">
                        <p class="text-xs">{{ Carbon::parse($kontak['created_at'])->format('j F Y') }}</p>
                        <p class="text-xs">{{ Carbon::parse($kontak['created_at'])->format('H:i') }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <script>
        function panelDelete() {
            $("#panel-delete").toggleClass("hidden");
        }

        // $(document).ready(function () {
        //     getDataKontak();
        // });

        // function getDataKontak() {

        //     var userId = '{{ Auth::user()->id }}';

        //     $.ajax({
        //         type: "GET",
        //         url: "http://127.0.0.1:8000/api/kontak?userId=" + userId,
        //         dataType: "json",
        //         success: function(response) {
        //             console.log(response);
        //             $.each(response.kontaks, function(key, value) {
        //                 // console.log(value);
        //                 $("#container-kontak").append(
        //                    "<a href='#''>" +
        //     "<div class="bg-white w-full rounded-lg border border-gray-200 p-3">" +
        //     </div>
        // </a>");
        //             });
        //         },
        //         error: function(xhr, status, error) {
        //             // Handle errors here

        //             console.error(xhr.responseText);
        //         }
        //     });
        // }
    </script>
@endsection
