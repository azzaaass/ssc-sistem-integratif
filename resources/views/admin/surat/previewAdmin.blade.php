@extends('admin.templates.main')

@section('container')
    @include('templates.antrean')
    <br>
    {{-- surat tidak ada tampilan revisi --}}
    @if (!$is_revisi)
        <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg px-20 py-14">
            <form action="/updateSuratRequest" method="POST">
                @csrf
                <!-- Nama Peminjam -->
                <div class="mt-5">
                    <label for="nama_peminjam" class="block tx-gray text-sm font-semibold mb-1.5">Nama Peminjam</label>
                    <input type="text" id="nama_peminjam" name="input1" value="{{ $surat->input1 }}" required
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                </div>
                <!-- Nama Peminjam -->
                <div class="mt-5">
                    <label for="nama_peminjam" class="block tx-gray text-sm font-semibold mb-1.5">Nama Peminjam</label>
                    <input type="text" id="nama_peminjam" name="input1" value="{{ $surat->input1 }}" required
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                </div>
                {{-- Nama Ruangan --}}
                <div class="mt-5">
                    <label for="nama_ruangan" class="block tx-gray text-sm font-semibold mb-1.5">Nama Ruangan</label>
                    <input type="text" id="nama_ruangan" name="input2" value="{{ $surat->input2 }}" required
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                </div>

                <!-- Keperluan Peminjaman -->
                <div class="mt-5">
                    <label for="keperluan" class="block tx-gray text-sm font-semibold mb-1.5">Keperluan Peminjaman</label>
                    <select type="text" id="keperluan" name="input3" required
                        class="text-sm bg-white appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        <option value="kelas" {{ $surat->input3 == 'kelas' ? 'selected' : '' }}>Ruang kelas</option>
                        <option value="lab" {{ $surat->input3 == 'lab' ? 'selected' : '' }}>Ruang Lab</option>
                        <option value="aula" {{ $surat->input3 == 'aula' ? 'selected' : '' }}>Ruang Aula</option>
                    </select>
                </div>

                <!-- Keterangan Tambahan -->
                <div class="mt-5">
                    <label for="keterangan" class="block tx-gray text-sm font-semibold mb-1.5">Keterangan Tambahan</label>
                    <textarea id="keterangan" name="input4" rows="1"
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ $surat->input4 }}</textarea>
                </div>

                <!-- Hari Peminjaman -->
                <div class="mt-5">
                    <label for="hari_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Hari Peminjaman</label>
                    <input type="date" id="hari_peminjaman" name="input5" value="{{ $surat->input5 }}" required
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                </div>

                <!-- Selesai Peminjaman -->
                <div class="mt-5">
                    <label for="selesai_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Selesai
                        Peminjaman</label>
                    <input type="date" id="selesai_peminjaman" name="input6" value="{{ $surat->input6 }}" required
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                </div>

                <!-- Jam Peminjaman -->
                <div class="mt-5">
                    <label for="jam_mulai" class="block tx-gray text-sm font-semibold mb-1.5">Jam Mulai</label>
                    <input type="time" id="jam_mulai" name="input7" value="{{ $surat->input7 }}" required
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                </div>
                <!-- Jam Peminjaman -->
                <div class="mt-5">
                    <label for="jam_selesai" class="block tx-gray text-sm font-semibold mb-1.5">Jam Selesai</label>
                    <input type="time" id="jam_selesai" name="input8" value="{{ $surat->input8 }}" required
                        class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                </div>
                <br>
                <!-- Deskripsi Revisi -->
                <div class="mt-5">
                    <label for="deskripsi" class="block tx-gray text-sm font-semibold mb-1.5">Deskripsi Revisi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="1"
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
                    <select type="text" id="status_surat" name="status_surat" required
                        class="text-sm bg-white appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        <option value="0" selected>Berikan revisi</option>
                        <option value="1">Revisi diterima</option>
                        <option value="2">Revisi diterima sebagian</option>
                        <option value="3">Revisi ditolak</option>
                        <option value="4">Mengirim ke PIC</option>
                    </select>
                </div>
                <!-- Hidden -->
                <input type="text" name="input9" value="null" hidden>
                <input type="text" name="input10" value="null" hidden>
                <input type="text" name="id" value="{{ $surat->id }}" hidden>
                <input type="text" name="type" value="1" hidden>
                <input type="text" name="estimasi" value="{{ $surat->estimasi }}" hidden>
                <br>
                <br>
                <!-- Tombol Submit -->
                <div class="flex w-full justify-between">
                    <a href="/deleteSurat/{{ $surat->id }}">
                        <div
                            class="text-sm bg-gradient-to-b from-[#ED212B] to-[#B6272C] hover:to-[#ED212B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">
                            Hapus surat
                        </div>
                    </a>
                    <button type="submit"
                        class="text-sm bg-gradient-to-b from-[#C16A0B] to-[#8A4F0E] hover:to-[#C16A0B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">Ajukan
                        Revisi</button>
                </div>
                
            </form>
        </div>
    @else
        <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg px-20 py-14">
            <form action="/updateSuratRequest" method="POST">
                @csrf
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
                        <input type="checkbox" name="input1_check"
                            {{ $surat->input1 == $surat->input1_revisi ? 'hidden' : '' }}>

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
                        <label for="nama_ruangan" class="block tx-gray text-sm font-semibold mb-1.5">Nama Ruangan</label>
                        <input type="text" id="nama_ruangan" name="input2" value="{{ $surat->input2 }}"
                            {{ $surat->input2 != $surat->input2_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    </div>
                    <div class="mt-10">
                        <input type="checkbox" name="input2_check"
                            {{ $surat->input2 == $surat->input2_revisi ? 'hidden' : '' }}>
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input2 != $surat->input2_revisi)
                            <label for="nama_ruangan_revisi" class="block tx-gray text-sm font-semibold mb-1.5">Nama
                                Ruangan (incoming)</label>
                            <input type="text" id="nama_ruangan_revisi" name="input2"
                                value="{{ $surat->input2_revisi }}" required
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        @endif
                    </div>
                </div>
                <!-- Keperluan Peminjaman -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="keperluan" class="block tx-gray text-sm font-semibold mb-1.5">Keperluan
                            Peminjaman</label>
                        <select type="text" id="keperluan" name="input3"
                            {{ $surat->input3 != $surat->input3_revisi ? 'disabled' : 'required' }}
                            class="text-sm bg-white appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                            <option value="kelas" {{ $surat->input3 == 'kelas' ? 'selected' : '' }}>Ruang kelas</option>
                            <option value="lab" {{ $surat->input3 == 'lab' ? 'selected' : '' }}>Ruang Lab</option>
                            <option value="aula" {{ $surat->input3 == 'aula' ? 'selected' : '' }}>Ruang Aula</option>
                        </select>
                    </div>
                    <div class="mt-10">
                        <input type="checkbox" name="input3_check"
                            {{ $surat->input3 == $surat->input3_revisi ? 'hidden' : '' }}>
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input3 != $surat->input3_revisi)
                            <label for="keperluan_revisi" class="block tx-gray text-sm font-semibold mb-1.5">Keperluan
                                Peminjaman (incoming)</label>
                            <select type="text" id="keperluan_revisi" name="input3" value="{{ $surat->input3 }}"
                                required
                                class="text-sm bg-white appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                                <option value="kelas" {{ $surat->input3_revisi == 'kelas' ? 'selected' : '' }}>Ruang
                                    kelas</option>
                                <option value="lab" {{ $surat->input3_revisi == 'lab' ? 'selected' : '' }}>Ruang Lab
                                </option>
                                <option value="aula" {{ $surat->input3_revisi == 'aula' ? 'selected' : '' }}>Ruang Aula
                                </option>
                            </select>
                        @endif
                    </div>
                </div>
                <!-- Keterangan Tambahan -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="keterangan" class="block tx-gray text-sm font-semibold mb-1.5">Keterangan
                            Tambahan</label>
                        <textarea id="keterangan" name="input4" rows="1"
                            {{ $surat->input4 != $surat->input4_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ $surat->input4 }}</textarea>
                    </div>
                    <div class="mt-10">
                        <input type="checkbox" name="input4_check"
                            {{ $surat->input4 == $surat->input4_revisi ? 'hidden' : '' }}>
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input4 != $surat->input4_revisi)
                            <label for="keterangan" class="block tx-gray text-sm font-semibold mb-1.5">Keterangan
                                Tambahan (incoming)</label>
                            <textarea id="keterangan" name="input4" rows="1"
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">{{ $surat->input4_revisi }}</textarea>
                        @endif
                    </div>
                </div>
                <!-- Hari Peminjaman -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="hari_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Hari
                            Peminjaman</label>
                        <input type="date" id="hari_peminjaman" name="input5" value="{{ $surat->input5 }}"
                            {{ $surat->input5 != $surat->input5_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    </div>
                    <div class="mt-10">
                        <input type="checkbox" name="input5_check"
                            {{ $surat->input5 == $surat->input5_revisi ? 'hidden' : '' }}>
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input5 != $surat->input5_revisi)
                            <label for="hari_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Hari
                                Peminjaman</label>
                            <input type="date" id="hari_peminjaman" name="input5"
                                value="{{ $surat->input5_revisi }}" required
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        @endif
                    </div>
                </div>
                <!-- Selesai Peminjaman -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="selesai_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Selesai
                            Peminjaman</label>
                        <input type="date" id="selesai_peminjaman" name="input6" value="{{ $surat->input6 }}"
                            {{ $surat->input6 != $surat->input6_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    </div>
                    <div class="mt-10">
                        <input type="checkbox" name="input6_check"
                            {{ $surat->input6 == $surat->input6_revisi ? 'hidden' : '' }}>
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input6 != $surat->input6_revisi)
                            <label for="selesai_peminjaman" class="block tx-gray text-sm font-semibold mb-1.5">Selesai
                                Peminjaman</label>
                            <input type="date" id="selesai_peminjaman" name="input6"
                                value="{{ $surat->input6_revisi }}" required
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        @endif
                    </div>
                </div>
                <!-- Jam Peminjaman -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="jam_mulai" class="block tx-gray text-sm font-semibold mb-1.5">Jam Mulai</label>
                        <input type="time" id="jam_mulai" name="input7" value="{{ $surat->input7 }}"
                            {{ $surat->input7 != $surat->input7_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    </div>
                    <div class="mt-10">
                        <input type="checkbox" name="input7_check"
                            {{ $surat->input7 == $surat->input7_revisi ? 'hidden' : '' }}>
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input7 != $surat->input7_revisi)
                            <label for="jam_mulai" class="block tx-gray text-sm font-semibold mb-1.5">Jam Mulai</label>
                            <input type="time" id="jam_mulai" name="input7" value="{{ $surat->input7_revisi }}"
                                required
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        @endif
                    </div>
                </div>

                <!-- Jam Peminjaman -->
                <div class="flex justify-between gap-16 items-center">
                    <div class="mt-5 w-full">
                        <label for="jam_selesai" class="block tx-gray text-sm font-semibold mb-1.5">Jam Selesai</label>
                        <input type="time" id="jam_selesai" name="input8" value="{{ $surat->input8 }}"
                            {{ $surat->input8 != $surat->input8_revisi ? 'disabled' : 'required' }}
                            class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                    </div>
                    <div class="mt-10">
                        <input type="checkbox" name="input8_check"
                            {{ $surat->input8 == $surat->input8_revisi ? 'hidden' : '' }}>
                    </div>
                    <div class="mt-5 w-full">
                        @if ($surat->input8 != $surat->input8_revisi)
                            <label for="jam_selesai" class="block tx-gray text-sm font-semibold mb-1.5">Jam
                                Selesai</label>
                            <input type="time" id="jam_selesai" name="input8" value="{{ $surat->input8_revisi }}"
                                required
                                class="text-sm appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        @endif
                    </div>
                </div>
                <br>
                <!-- Deskripsi Revisi -->
                <div class="mt-5">
                    <label for="deskripsi" class="block tx-gray text-sm font-semibold mb-1.5">Deskripsi Revisi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="1"
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
                    <select type="text" id="status_surat" name="status_surat" required
                        class="text-sm bg-white appearance-none border border-gray-400 rounded w-full py-2 px-3 tx-gray leading-tight focus:border-[#C16A0B] focus:outline-none">
                        <option value="0">Berikan revisi</option>
                        <option value="1" selected>Revisi diterima</option>
                        <option value="2">Revisi diterima sebagian</option>
                        <option value="3">Revisi ditolak</option>
                        <option value="4">Mengirim ke PIC</option>
                    </select>
                </div>
                <!-- Hidden -->
                <input type="text" name="input9" value="null" hidden>
                <input type="checkbox" name="input9_check" hidden>
                <input type="text" name="input10" value="null" hidden>
                <input type="checkbox" name="input10_check" hidden>
                <input type="text" name="id" value="{{ $surat->id }}" hidden>
                <input type="text" name="type" value="1" hidden>
                <input type="text" name="estimasi" value="{{ $surat->estimasi }}" hidden>
                <br>
                <br>
                <!-- Tombol Submit -->
                <div class="flex w-full justify-end gap-8">
                    <a href="/deleteSurat/{{ $surat->id }}">
                        <div
                            class="text-sm bg-gradient-to-b from-[#ED212B] to-[#B6272C] hover:to-[#ED212B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">
                            Hapus surat
                        </div>
                    </a>
                    <button type="submit"
                        class="text-sm bg-gradient-to-b from-[#C16A0B] to-[#8A4F0E] hover:to-[#C16A0B] text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline">Ajukan
                        Revisi</button>
                </div>
            </form>
        </div>
    @endif
@endsection
