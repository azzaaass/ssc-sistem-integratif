@extends('admin.templates.main')

@section('container')
    @include('pic.templates.antrean')
    <br>
    {{-- surat tidak ada tampilan revisi --}}

    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg px-20 py-14">
        <form action="/updateSuratPic" method="POST">
            @csrf
            <!-- Nama Peminjam -->
            <div class="mt-5">
                <label for="nama_peminjam" class="block tx-gray text-sm font-semibold mb-1.5">Nama Peminjam</label>
                <input type="text" id="nama_peminjam" name="input1" value="{{ $surat->input1 }}" required
                    class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
            </div>

            <!-- Nama Ruangan -->
            <div class="mt-5">
                <label for="ruangan" class="block tx-gray text-sm font-semibold mb-1.5">Nama Ruangan</label>
                <select type="text" id="ruangan" name="input2" required
                    class="text-sm bg-white appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    <option value="{{ $surat->input2 }}" selected>{{ $surat->input2 }}</option>
                </select>
            </div>

            <!-- Keterangan Tambahan -->
            <div class="mt-5">
                <label for="keterangan" class="block tx-gray text-sm font-semibold mb-1.5">Keterangan Tambahan</label>
                <textarea id="keterangan" name="input3" rows="1"
                    class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ $surat->input3 }}</textarea>
            </div>

            <!-- Hari Peminjaman -->
            <div class="mt-5">
                <label for="hari_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Hari Peminjaman</label>
                <input type="date" id="hari_peminjaman" name="input4" value="{{ $surat->input4 }}" required
                    class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
            </div>

            <!-- Selesai Peminjaman -->
            <div class="mt-5">
                <label for="selesai_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Selesai
                    Peminjaman</label>
                <input type="date" id="selesai_peminjaman" name="input5" value="{{ $surat->input5 }}" required
                    class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
            </div>

            <!-- Jam Peminjaman -->
            <div class="mt-5">
                <label for="jam_mulai" class="block tx-gray text-sm font-semibold mb-1.5">Jam Mulai</label>
                <input type="time" id="jam_mulai" name="input6" value="{{ $surat->input6 }}" required
                    class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
            </div>
            <!-- Jam Peminjaman -->
            <div class="mt-5">
                <label for="jam_selesai" class="block tx-gray text-sm font-semibold mb-1.5">Jam Selesai</label>
                <input type="time" id="jam_selesai" name="input7" value="{{ $surat->input7 }}" required
                    class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
            </div>
            <br>
            <!-- Deskripsi Revisi -->
            <div class="mt-5">
                <label for="deskripsi" class="block tx-gray text-sm font-semibold mb-1.5">Deskripsi Revisi</label>
                <textarea id="deskripsi" name="deskripsi" rows="1" disabled
                    class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ $surat->deskripsi }}</textarea>
            </div>
            <!-- Pesan Revisi (admin) -->
            <div class="mt-5">
                <label for="message" class="block tx-gray text-sm font-semibold mb-1.5">Pesan Revisi (admin)
                    <span
                        class="font-normal text-xs">{{ isset($revisi_now[0]) ? ' | ' . $revisi_now[0]->created_at : '' }}</span></label>
                <textarea id="message" name="message" rows="1"
                    class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ isset($revisi_now[0]) ? $revisi_now[0]->message : '' }}</textarea>
            </div>
            <!-- Status Revisi -->
            <div class="mt-5">
                <label for="status_surat" class="block tx-gray text-sm font-semibold mb-1.5">Status Surat</label>
                <select type="text" id="status_surat" name="status_surat" onchange="showContainer(this,'container-pic')"
                    required
                    class="text-sm bg-white appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    <option value="setuju" selected>Setujui</option>
                    <option value="tidak_setuju">Tidak setuju</option>
                </select>
            </div>
            <!-- Hidden -->
            <input type="text" name="input8" value="null" hidden>
            <input type="text" name="input9" value="null" hidden>
            <input type="text" name="input10" value="null" hidden>
            <input type="text" name="id" value="{{ $surat->id }}" hidden>
            <input type="text" name="id_pic" value="{{ $surat->id_pic }}" hidden>
            <input type="text" name="type" value="1" hidden>
            <input type="text" name="estimasi" value="{{ $surat->estimasi }}" hidden>
            <br>
            <br>
            <!-- Tombol Submit -->
            <div class="flex w-full justify-end">
                <button type="submit"
                    class="text-sm bg-gradient-to-b from-[#C16A0B] to-[#8A4F0E] hover:to-[#C16A0B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">Submit Hasil</button>
            </div>
        </form>
    </div>

    <script>
        function showContainer(element, id) {
            if (element.value == "4") {
                $("#" + id).removeClass("hidden");
            } else {
                $("#" + id).addClass("hidden");
            }
        }

        function getDataRuangan(element) {
            if ($("#" + element.id).find('option').length <= 1) {
                $("#" + element.id).empty();
                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/api/ruangans",
                    dataType: "json",
                    success: function(data) {
                        $.each(data.data, function(key, value) {
                            $("#" + element.id).append("<option value='" +
                                value.name + "'>" + value.name +
                                "</option>");
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }

      
    </script>
@endsection
