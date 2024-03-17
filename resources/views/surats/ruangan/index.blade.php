@extends('templates.main')

@section('container')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="/prosesRuangan" method="POST" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <!-- Keperluan Peminjaman -->
        <div class="mb-4">
            <label for="keperluan" class="block text-gray-700 text-sm font-bold mb-2">Keperluan Peminjaman:</label>
            <input type="text" id="keperluan" name="keperluan" value="asu" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Keterangan Tambahan -->
        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700 text-sm font-bold mb-2">Keterangan Tambahan:</label>
            <textarea id="keterangan" name="keterangan" rows="4"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>

        <!-- Hari Peminjaman -->
        <div class="mb-4">
            <label for="hari_peminjaman" class="block text-gray-700 text-sm font-bold mb-2">Hari Peminjaman:</label>
            <input type="date" id="hari_peminjaman" name="hari_peminjaman" value="02/02/2003" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Selesai Peminjaman -->
        <div class="mb-4">
            <label for="selesai_peminjaman" class="block text-gray-700 text-sm font-bold mb-2">Selesai Peminjaman:</label>
            <input type="date" id="selesai_peminjaman" name="selesai_peminjaman" value="02/02/2003" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Nama Peminjam -->
        <div class="mb-4">
            <label for="nama_peminjam" class="block text-gray-700 text-sm font-bold mb-2">Nama Peminjam:</label>
            <input type="text" id="nama_peminjam" name="nama_peminjam" value="asu" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Nama Penanggung Jawab 1 -->
        <div class="mb-4">
            <label for="nama_penanggung_jawab1" class="block text-gray-700 text-sm font-bold mb-2">Nama Penanggung Jawab
                1:</label>
            <input type="text" id="nama_penanggung_jawab1" name="nama_penanggung_jawab1" value="asu" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Nama Penanggung Jawab 2 -->
        <div class="mb-6">
            <label for="nama_penanggung_jawab2" class="block text-gray-700 text-sm font-bold mb-2">Nama Penanggung Jawab
                2:</label>
            <input type="text" id="nama_penanggung_jawab2" name="nama_penanggung_jawab2" value="asu"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Tombol Submit -->
        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
        </div>
    </form>
@endsection
