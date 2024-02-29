$(document).ready(function () {
    tampilkanKategori();
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
                $("#user").text(data.username);
                $("#prev-prof").attr(
                    "src",
                    "data:image/png;base64," + data.photo
                );
            }
        },
    });
}

function tampilkanKategori() {
    // Mendapatkan token CSRF dari meta tag
    const csrfToken = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        url: appUrl + "/api/categoryList", // Sesuaikan dengan endpoint API Anda
        method: "GET",
        headers: {
            "X-CSRF-Token": csrfToken, // Menambahkan token CSRF dalam header
        },
        success: function (response) {
            // Mendapatkan referensi elemen div yang akan menampung checkbox
            const checkboxContainer = $("#checkboxContainer");

            // Hapus semua elemen di dalam container sebelum menambahkan yang baru
            checkboxContainer.empty();

            // Loop melalui data kategori dan membuat checkbox untuk masing-masing
            $.each(response.data, function (index, category) {
                const checkbox = $("<input>").attr({
                    type: "checkbox",
                    name: "category[]",
                    value: category.category_id,
                });

                const label = $("<label>")
                    .attr({
                        for: "category" + category.category_id,
                    })
                    .text(category.name_category);

                // Menambahkan checkbox dan label ke dalam div container
                checkboxContainer.append(checkbox);
                checkboxContainer.append(label);

                // Menambahkan line break
                checkboxContainer.append("<br>");
            });
        },
        error: function (xhr, status, error) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan
            console.error(xhr.responseText);
            alert("Gagal mengambil data kategori. Silakan coba lagi.");
        },
    });
}

// menampilkan input gambar
function previewImage() {
    const fileInput = document.getElementById("gambar");
    const preview = document.getElementById("preview");

    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = "block";
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "#";
        preview.style.display = "none";
    }
}

// btn-kembali
function goBack() {
    window.history.back();
}

// kirim form
$(document).ready(function () {
    // Menangani submit form
    $("form").submit(function (event) {
        // Mencegah perilaku default form
        event.preventDefault();

        // Mendapatkan token CSRF dari meta tag
        const csrfToken = $('meta[name="csrf-token"]').attr("content");

        // Mendapatkan nilai dari input form
        const judul = $("#judul").val();
        const kodeBuku = $("#kode_buku").val();
        const penulis = $("#penulis").val();
        const penerbit = $("#penerbit").val();
        const tahunRilis = $("#tahun_terbit").val();
        const stokBuku = $("#total_buku").val();
        const deskripsi = $("#deskripsi").val();
        const gambar = $("#gambar")[0].files[0];
        const kategori = []; // Menyimpan kategori yang dipilih
        $.each($("input[name='category[]']:checked"), function () {
            kategori.push($(this).val());
        });

        // Membuat objek FormData untuk mengirim data formulir
        const formData = new FormData();
        formData.append("gambar", gambar);
        formData.append("judul", judul);
        formData.append("kode_buku", kodeBuku);
        formData.append("penulis", penulis);
        formData.append("penerbit", penerbit);
        formData.append("tahun_terbit", tahunRilis);
        formData.append("total_buku", stokBuku);
        formData.append("deskripsi", deskripsi);
        formData.append("category", kategori);

        // Mengirim data ke endpoint API
        $.ajax({
            url: appUrl + "/api/newBook", // Sesuaikan dengan endpoint API Anda
            method: "POST",
            data: formData,
            processData: false, // Memastikan tidak memproses data secara otomatis
            contentType: false, // Memastikan tidak mengatur tipe konten secara otomatis
            headers: {
                "X-CSRF-Token": csrfToken, // Menambahkan token CSRF dalam header
            },
            success: function (response) {
                // Handle sukses
                console.log(response);
                alert("Data buku berhasil ditambahkan!");
                // Redirect atau lakukan aksi lainnya setelah berhasil menambahkan data
            },
            error: function (xhr, status, error) {
                // Handle kesalahan
                console.error(xhr.responseText);
                alert("Gagal menambahkan data buku. Silakan coba lagi.");
            },
        });
    });
});
