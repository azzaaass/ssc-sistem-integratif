@extends('templates.user.navbar')


@section('container')
    @include('templates.alert')
    @include('templates.history', ['surat_url'=>'/surats/'])
    <script>
        function getClearLinkPagination(link) {
            var parts = link.split("=");
            var result = parts.pop();
            return result;
        }

        function getDataSurat(url = '1') {
            var userId = '{{ Auth::id() }}';

            var search = $("#search").val();
            var status = $("#status").val();

            $("#surat-table-body").empty();

            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/api/surats?page=" + url,
                dataType: "json",
                headers: {
                    "X-User-ID": userId,
                    "search": search,
                    "status": status,
                    "pagination": 8
                },
                success: function(response) {
                    // console.log(response);
                    $.each(response.surats.data, function(key, value) {
                        // console.log(value);
                        $("#surat-table-body").append(
                            "<tr class='text-sm'>" +
                            "<td class='py-3 px-4'>" + value.id + "</td>" +
                            "<td class='py-3 px-4'>" + value.tipe.tipe_surat + "</td>" +
                            "<td class='py-3 px-4'>" + value.estimasi + " Hari</td>" +
                            "<td class='py-3 px-4'>" + (value.status == '0' ? 'On-going' :
                                'Selesai') + "</td>" +
                            "<td class='py-3 px-4'>" + moment(value.created_at).format(
                                'dddd, D MMMM YYYY') + "</td>" +
                            "<td class='py-3 px-4'><a href='surats/" + value.id +
                            "'><p class='bg-[#013056] w-fit rounded text-xs text-white py-1 px-2 font-semibold'>Detail</p></a></td>" +
                            "</tr>");
                    });

                    // pagination
                    $("#pagination-nav").empty();

                    if (response.surats.prev_page_url === null) {
                        $("#pagination-nav").append(
                            '<span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 cursor-default rounded-md leading-5" >&laquo; Previous </span>'
                        );
                    } else {
                        var prev_link = getClearLinkPagination(response.surats.prev_page_url);
                        $("#pagination-nav").append(
                            '<button onclick="getDataSurat(' + prev_link +
                            ')" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 cursor-default rounded-md leading-5 hover:bg-gray-100">&laquo; Previous</button>'
                        );
                    }

                    $.each(response.surats.links, function(key, value) {
                        if (!isNaN(value.label)) {
                            if (value.label == response.surats.current_page) {
                                $("#pagination-nav").append(
                                    '<button onclick="getDataSurat(' + value.label +
                                    ')" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-[#b6272c] bg-white border border-gray-300 rounded-md leading-5 hover:bg-gray-50">' +
                                    value.label + '</button>'
                                );
                            } else {
                                $("#pagination-nav").append(
                                    '<button onclick="getDataSurat(' + value.label +
                                    ')" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md leading-5 hover:bg-gray-50">' +
                                    value.label + '</button>'
                                );
                            }
                        }
                    });

                    if (response.surats.next_page_url === null) {
                        $("#pagination-nav").append(
                            '<span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 cursor-default rounded-md leading-5" >Next &raquo;</span>'
                        );
                    } else {
                        var next_link = getClearLinkPagination(response.surats.next_page_url);
                        $("#pagination-nav").append(
                            '<button onclick="getDataSurat(' + next_link +
                            ')" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 cursor-default rounded-md leading-5 hover:bg-gray-100">Next &raquo;</button>'
                        );
                    }

                },
                error: function(xhr, status, error) {
                    // Handle errors here

                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection
