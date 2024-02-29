$(document).ready(function () {

    $("#dataTable").dataTable({
        Destroy: true,
        processing: true,
        ajax: {
            url: appUrl + "/api/list_denda",
            dataSrc: "borrows",
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                },
            },
            { data: "username" },
            { data: "judul" },
            { data: "petugas_pinjam" },
            { data: "tgl_pinjam" },
            { data: "tgl_kembali" },
            { data: "jumlah_pinjam" },
            { data: "status" },
            {
                data: null,
                render: function (data, type, row) {
                    return '<div><button class="btn-confirm">Konfirmasi</button></div>';
                },
            },
        ],
        language: {
            lengthMenu: "Tampilkan _MENU_ hasil",
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",
            infoEmpty: "Tidak ada data",
            infoFiltered: "(filtered from _MAX_ total records)",
            emptyTable: "Tidak ada data",
            search: "Cari data :",
            paginate: {
                first: "Awal",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya",
            },
        },
    });
    getData();
});

function getData() {
    $.ajax({
        url: appUrl + "/profile",
        type: "GET",
        success: function (response) {
            console.log(response);
            if (response.success) {
                var data = response.data;
                $("#user").text(data.username + " | " + data.access);
                $("#prev-prof").attr(
                    "src",
                    "data:image/png;base64," + data.photo
                );
            }
        },
    });
}
