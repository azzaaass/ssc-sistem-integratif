@extends('templates.user.navbar')
@section('container')
    <div class="max-w-5xl mx-auto">
        @include('templates.alert')
    </div>
    @include('templates.status')

    {{-- Delete data --}}
    <div id="panel-delete"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 bg-white shadow-xl shadow-gray-400 rounded px-8 pt-6 pb-8 mb-4 hidden">
        <h2 class="text-md font-semibold mb-1">Yakin ingin menghapus data?</h2>
        <p class="text-gray-700 mb-6 text-sm">Data yang dihapus tidak dapat dipulihkan.</p>
        <div class="flex items-center justify-between">
            <form action="/surats/{{ $surat->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="text-sm bg-gradient-to-b from-[#ED212B] to-[#B6272C] hover:to-[#ED212B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">Ya,
                    Hapus</button>
            </form>
            <button
                class="text-sm bg-gradient-to-b from-gray-200 to-gray-300 hover:to-gray-400 text-gray-800 font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline"
                onclick="panelDelete()">Batal</button>
        </div>
    </div>
    {{-- Delete data --}}

    {{-- surat tidak ada tampilan revisi --}}
    @if (!$is_revisi)
        <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg px-20 py-14 ">
            <form action="/surats" method="POST">
                @csrf
                @method('PUT')
                <!-- Nama Peminjam -->
                <div class="mt-5">
                    <label for="nama_peminjam" class="block tx-gray text-sm font-semibold mb-1.5">Nama Peminjam</label>
                    <input type="text" id="nama_peminjam" name="input1" value="{{ $surat->input1 }}" required
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                </div>

                <!-- Nama Ruangan -->
                <div class="mt-5">
                    <label for="ruangan" class="block tx-gray text-sm font-semibold mb-1.5">Nama Ruangan</label>
                    <select type="text" id="ruangan" name="input2" onclick="getDataRuangan(this)" required
                        class="text-sm bg-white appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        <option value="{{ $surat->input2 }}">{{ $surat->input2 }}</option>
                    </select>
                </div>

                <!-- Keterangan Tambahan -->
                <div class="mt-5">
                    <label for="keterangan" class="block tx-gray text-sm font-semibold mb-1.5">Keterangan
                        Tambahan</label>
                    <textarea id="keterangan" name="input3" rows="1"
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ $surat->input3 }}</textarea>
                </div>

                <!-- Hari Peminjaman -->
                <div class="mt-5">
                    <label for="hari_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Hari
                        Peminjaman</label>
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
                <!-- Deskripsi Revisi (admin)-->
                <div class="mt-5">
                    <label for="message" class="block tx-gray text-sm font-semibold mb-1.5">Pesan Revisi (admin)<span
                            class="font-normal text-xs">{{ isset($revisi_now) ? ' | ' . $revisi_now->created_at : '' }}</span></label>
                    <textarea id="message" name="message" rows="1" disabled
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ isset($revisi_now) ? $revisi_now->message : 'Belum ada revisi' }}</textarea>
                </div>
                <!-- Deskripsi Revisi -->
                <div class="mt-5">
                    <label for="deskripsi" class="block tx-gray text-sm font-semibold mb-1.5">Deskripsi Revisi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="1" required
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ $surat->deskripsi }}</textarea>
                </div>
                <!-- Hidden -->
                <input type="text" name="input8" value="null" hidden>
                <input type="text" name="input9" value="null" hidden>
                <input type="text" name="input10" value="null" hidden>
                <input type="text" name="id" value="{{ $surat->id }}" hidden>
                <input type="text" name="type" value="1" hidden>
                <input type="text" name="estimasi" value="{{ $surat->estimasi }}" hidden>
                <br>
                <br>
                <!-- Tombol Submit -->
                @if (isset($revisi_now->status) ? $revisi_now->status!= '5' : true)
                    <div class="flex w-full justify-between">
                        <button type="button" onclick="panelDelete()">
                            <div
                                class="text-sm bg-gradient-to-b from-[#ED212B] to-[#B6272C] hover:to-[#ED212B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">
                                Hapus surat
                            </div>
                        </button>
                        <button type="submit"
                            class="text-sm bg-gradient-to-b from-[#C16A0B] to-[#8A4F0E] hover:to-[#C16A0B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">Ajukan
                            Revisi</button>
                    </div>
                @endif
            </form>
        </div>
    @else
        <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg px-20 py-14">
            <form action="/surats" method="POST">
                @csrf
                @method('PUT')
                <!-- Nama Peminjam -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="nama_peminjam" class="block tx-gray text-sm font-semibold mb-1.5">Nama
                            Peminjam</label>
                        <input type="text" id="nama_peminjam" name="input1" value="{{ $surat->input1 }}"
                            {{ $surat->input1 != $surat->input1_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    </div>
                    <div class="mt-10">
                        @if ($surat->input1 != $surat->input1_revisi)
                            <i class="fa-solid fa-angles-left text-[#B6272C]"></i>
                        @endif
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input1 != $surat->input1_revisi)
                            <label for="nama_peminjam_revisi" class="block tx-gray text-sm font-semibold mb-1.5">Nama
                                Peminjam (Incoming)</label>
                            <input type="text" id="nama_peminjam_revisi" name="input1"
                                value="{{ $surat->input1_revisi }}" required
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        @endif
                    </div>
                </div>
                <!-- Nama Ruangan -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="ruangan" class="block tx-gray text-sm font-semibold mb-1.5">Nama Ruangan</label>
                        <select type="text" id="ruangan" name="input2" onclick="getDataRuangan(this)"
                            {{ $surat->input2 != $surat->input2_revisi ? 'disabled' : 'required' }}
                            class="text-sm bg-white appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                            <option value="{{ $surat->input2 }}">{{ $surat->input2 }}</option>
                        </select>
                    </div>
                    <div class="mt-10">
                        @if ($surat->input2 != $surat->input2_revisi)
                            <i class="fa-solid fa-angles-left text-[#B6272C]"></i>
                        @endif
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input2 != $surat->input2_revisi)
                            <label for="ruangan_revisi" class="block tx-gray text-sm font-semibold mb-1.5">Nama
                                Ruangan (incoming)</label>
                            <select type="text" id="ruangan_revisi" name="input2" onclick="getDataRuangan(this)"
                                required
                                class="text-sm bg-white appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                                <option value="{{ $surat->input2_revisi }}">{{ $surat->input2_revisi }}</option>
                            </select>
                        @endif
                    </div>
                </div>

                <!-- Keterangan Tambahan -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="keterangan" class="block tx-gray text-sm font-semibold mb-1.5">Keterangan
                            Tambahan</label>
                        <textarea id="keterangan" name="input3" rows="1"
                            {{ $surat->input3 != $surat->input3_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ $surat->input3 }}</textarea>
                    </div>
                    <div class="mt-10">
                        @if ($surat->input3 != $surat->input3_revisi)
                            <i class="fa-solid fa-angles-left text-[#B6272C]"></i>
                        @endif
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input3 != $surat->input3_revisi)
                            <label for="keterangan" class="block tx-gray text-sm font-semibold mb-1.5">Keterangan
                                Tambahan (incoming)</label>
                            <textarea id="keterangan" name="input3" rows="1"
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ $surat->input3_revisi }}</textarea>
                        @endif
                    </div>
                </div>
                <!-- Hari Peminjaman -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="hari_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Hari
                            Peminjaman</label>
                        <input type="date" id="hari_peminjaman" name="input4" value="{{ $surat->input4 }}"
                            {{ $surat->input4 != $surat->input4_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    </div>
                    <div class="mt-10">
                        @if ($surat->input4 != $surat->input4_revisi)
                            <i class="fa-solid fa-angles-left text-[#B6272C]"></i>
                        @endif
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input4 != $surat->input4_revisi)
                            <label for="hari_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Hari
                                Peminjaman</label>
                            <input type="date" id="hari_peminjaman" name="input4"
                                value="{{ $surat->input4_revisi }}" required
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        @endif
                    </div>
                </div>
                <!-- Selesai Peminjaman -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="selesai_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Selesai
                            Peminjaman</label>
                        <input type="date" id="selesai_peminjaman" name="input5" value="{{ $surat->input5 }}"
                            {{ $surat->input5 != $surat->input5_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    </div>
                    <div class="mt-10">
                        @if ($surat->input5 != $surat->input5_revisi)
                            <i class="fa-solid fa-angles-left text-[#B6272C]"></i>
                        @endif
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input5 != $surat->input5_revisi)
                            <label for="selesai_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Selesai
                                Peminjaman</label>
                            <input type="date" id="selesai_peminjaman" name="input5"
                                value="{{ $surat->input5_revisi }}" required
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        @endif
                    </div>
                </div>
                <!-- Jam Peminjaman -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="jam_mulai" class="block tx-gray text-sm font-semibold mb-1.5">Jam Mulai</label>
                        <input type="time" id="jam_mulai" name="input6" value="{{ $surat->input6 }}"
                            {{ $surat->input6 != $surat->input6_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    </div>
                    <div class="mt-10">
                        @if ($surat->input6 != $surat->input6_revisi)
                            <i class="fa-solid fa-angles-left text-[#B6272C]"></i>
                        @endif
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input6 != $surat->input6_revisi)
                            <label for="jam_mulai" class="block tx-gray text-sm font-semibold mb-1.5">Jam
                                Mulai</label>
                            <input type="time" id="jam_mulai" name="input6" value="{{ $surat->input6_revisi }}"
                                required
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        @endif
                    </div>
                </div>

                <!-- Jam Peminjaman -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="jam_selesai" class="block tx-gray text-sm font-semibold mb-1.5">Jam
                            Selesai</label>
                        <input type="time" id="jam_selesai" name="input7" value="{{ $surat->input7 }}"
                            {{ $surat->input7 != $surat->input7_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    </div>
                    <div class="mt-10">
                        @if ($surat->input7 != $surat->input7_revisi)
                            <i class="fa-solid fa-angles-left text-[#B6272C]"></i>
                        @endif
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input7 != $surat->input7_revisi)
                            <label for="jam_selesai" class="block tx-gray text-sm font-semibold mb-1.5">Jam
                                Selesai</label>
                            <input type="time" id="jam_selesai" name="input7" value="{{ $surat->input7_revisi }}"
                                required
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        @endif
                    </div>
                </div>
                <br>
                <!-- Deskripsi Revisi (admin)-->
                <div class="mt-5">
                    <label for="message" class="block tx-gray text-sm font-semibold mb-1.5">Pesan Revisi (admin)<span
                            class="font-normal text-xs">{{ isset($revisi_now) ? ' | ' . $revisi_now->created_at : '' }}</span></label>
                    <textarea id="message" name="message" rows="1" disabled
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ isset($revisi_now) ? $revisi_now->message : '' }}</textarea>
                </div>
                <!-- Deskripsi Revisi -->
                <div class="mt-5">
                    <label for="deskripsi" class="block tx-gray text-sm font-semibold mb-1.5">Deskripsi Revisi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="1"
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ $surat->deskripsi }}</textarea>
                </div>
                <!-- Hidden -->
                <input type="text" name="input8" value="null" hidden>
                <input type="text" name="input9" value="null" hidden>
                <input type="text" name="input10" value="null" hidden>
                <input type="text" name="id" value="{{ $surat->id }}" hidden>
                <input type="text" name="type" value="1" hidden>
                <input type="text" name="estimasi" value="{{ $surat->estimasi }}" hidden>
                <br>
                <br>
                <br>
                <!-- Tombol Submit -->
                <div class="flex w-full justify-between">

                    <button type="button" onclick="panelDelete()">
                        <div
                            class="text-sm bg-gradient-to-b from-[#ED212B] to-[#B6272C] hover:to-[#ED212B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">
                            Hapus surat
                        </div>
                    </button>
                    <button type="submit"
                        class="text-sm bg-gradient-to-b from-[#C16A0B] to-[#8A4F0E] hover:to-[#C16A0B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">Ajukan
                        Revisi</button>
                </div>
            </form>
        </div>
    @endif
    <script>
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
                        // Handle errors here

                        console.error(xhr.responseText);
                    }
                });
            }
        }

        function panelDelete() {
            $("#panel-delete").toggleClass("hidden");
        }
    </script>
@endsection
