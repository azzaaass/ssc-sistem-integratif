@extends('templates.user.navbar')

@section('container')
<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg px-20 py-14">
    <form action="/surats" method="POST">
        @csrf
        <!-- Nama Peminjam -->
        <div class="mt-5">
            <label for="nama_peminjam" class="block tx-gray text-sm font-semibold mb-1.5">Nama Peminjam</label>
            <input type="text" id="nama_peminjam" name="input1" value="asu" required
                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
        </div>

        <!-- Nama Alat -->
        <div class="mt-5">
            <label for="alat" class="block tx-gray text-sm font-semibold mb-1.5">Nama Alat</label>
            <select type="text" id="alat" name="input2" onclick="getDataAlat(this)" required
                class="text-sm bg-white appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
            </select>
        </div>

        <!-- Keterangan Tambahan -->
        <div class="mt-5">
            <label for="keterangan" class="block tx-gray text-sm font-semibold mb-1.5">Keterangan Tambahan</label>
            <textarea id="keterangan" name="input3" rows="1"
                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">testing</textarea>
        </div>

        <!-- Hari Peminjaman -->
        <div class="mt-5">
            <label for="hari_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Hari Peminjaman</label>
            <input type="date" id="hari_peminjaman" name="input4" value="02/02/2003" required
                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
        </div>

        <!-- Selesai Peminjaman -->
        <div class="mt-5">
            <label for="selesai_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Selesai
                Peminjaman</label>
            <input type="date" id="selesai_peminjaman" name="input5" value="02/02/2003" required
                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
        </div>

        <!-- Jam Peminjaman -->
        <div class="mt-5">
            <label for="jam_mulai" class="block tx-gray text-sm font-semibold mb-1.5">Jam Mulai</label>
            <input type="time" id="jam_mulai" name="input6" required
                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
        </div>
        <!-- Jam Peminjaman -->
        <div class="mt-5">
            <label for="jam_selesai" class="block tx-gray text-sm font-semibold mb-1.5">Jam Selesai</label>
            <input type="time" id="jam_selesai" name="input7" required
                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
        </div>
        <!-- Hidden -->
        <input type="text" name="input8" value="null" hidden>
        <input type="text" name="input9" value="null" hidden>
        <input type="text" name="input10" value="null" hidden>
        <input type="text" name="type" value="2" hidden>
        <input type="text" name="estimasi" value="3" hidden>
        <br>
        <br>
        <!-- Tombol Submit -->
        <div class="w-full text-end">
            <button type="submit"
                class="text-sm bg-gradient-to-b from-[#154770] to-[#013056] hover:to-[#154770] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">Submit</button>
        </div>
    </form>
</div>
<script>
    function getDataAlat(element) {
        if ($("#" + element.id).find('option').length <= 0) {
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/api/alats",
                dataType: "json",
                success: function(data) {
                    $.each(data.data, function(key, value) {
                        $("#" + element.id).append("<option value='" +
                            value.name + "'>" + value.name +
                            "</option>");
                    });
                },
                error: function(xhr, status, error) {
                    // Handle errors here

                    console.error(xhr.responseText);
                }
            });
        }
    }
</script>
@endsection