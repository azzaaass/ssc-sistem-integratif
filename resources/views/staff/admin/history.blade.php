@extends('templates.staff.admin.navbar')

@section('container')
@include('templates.alert')
    @include('templates.history', ['surat_url' => '/admin/surats/'])
    <script>
        function getDataSurat() {

            var search = $("#search").val();
            var status = $("#status").val();

            $("#surat-table-body").empty();
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/api/surats",
                dataType: "json",
                headers: {
                    "search": search,
                    "status": status,
                    "pagination": 8
                },
                success: function(resoponse) {
                    console.log(resoponse.surats)
                    $.each(resoponse.surats, function(key, value) {
                        // console.log("test");
                        $("#surat-table-body").append(
                            "<tr class='text-sm'>" +
                            "<td class='py-3 px-4'>" + value.id + "</td>" +
                            "<td class='py-3 px-4'>" + value.tipe.tipe_surat + "</td>" +
                            "<td class='py-3 px-4'>" + value.estimasi + " Hari</td>" +
                            "<td class='py-3 px-4'>" + (value.status == '0' ? 'On-going' :
                                'Selesai') + "</td>" +
                            "<td class='py-3 px-4'>" + moment(value.created_at).format(
                                'dddd, D MMMM YYYY') + "</td>" +
                            "<td class='py-3 px-4'><a href='/admin/surats/" + value.id +
                            "'><p class='bg-[#013056] w-fit rounded text-xs text-white py-1 px-2 font-semibold'>Detail</p></a></td>" +
                            "</tr>");
                    });
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection
