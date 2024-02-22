$(document).ready(function () {
    tampilkanDenda();
  });
  
  function tampilkanDenda() {
    $.ajax({
      url: "http://127.0.0.1:8000/api/listPinjam",
      method: "GET",
      success: function (response) {
        console.log(response);
        $("#dataTable").DataTable().clear().draw(); // Hapus semua baris yang ada di tabel
  
        var borrowsFiltered = response.borrows.filter(function (borrows) {
          return borrows.status === "Dipinjam";
        });
  
        // Tambahkan data buku ke tabel
        $.each(borrowsFiltered, function (index, borrows) {
          var newRow =
            "<tr><td>" +
            (index + 1) +
            "</td><td>" +
            borrows.username +
            "</td><td>" +
            borrows.judul +
            "</td><td>" +
            borrows.tgl_pinjam +
            "</td><td>" +
            borrows.tgl_kembali +
            "</td><td>" +
            borrows.petugas_pinjam +
            "</td><td>" +
            borrows.jumlah_pinjam +
            "</td><td>" +
            borrows.status +
            "</td>";
          $("#dataTable").DataTable().row.add($(newRow)).draw();
        });
  
        // Menambahkan event listener untuk tombol delete
        $(".btn-delete").click(function () {
          var bookId = $(this).data("id");
          deleteBook(bookId);
        });
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        alert("Gagal mengambil data buku. Silakan coba lagi.");
      },
    });
  }