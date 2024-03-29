@extends('templates.main')

@section('container')
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-800 uppercase text-sm font-semibold text-left">
                <tr>
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">ID Admin</th>
                    <th class="py-3 px-4">Tipe Surat</th>
                    <th class="py-3 px-4">Estimasi</th>
                    <th class="py-3 px-4">Action</th>
                </tr>
            </thead>
            @foreach ($historys as $history)
                <tbody class="text-gray-700">
                    <tr>
                        <td class="py-3 px-4">{{ $history->id }}</td>
                        <td class="py-3 px-4">{{ $history->id_admin }}</td>
                        <td class="py-3 px-4">{{ $history->type }}</td>
                        <td class="py-3 px-4">{{ $history->estimasi }}</td>
                        <td class="py-3 px-4"><a href="/detailSurat/{{ $history->id }}">Detail</a></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
