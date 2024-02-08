// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
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
});
