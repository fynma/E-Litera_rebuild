$(document).ready(function () {
    getData();
    getCategories();
});

function getData() {
    $.ajax({
        url: "http://127.0.0.1:8000/profile",
        type: "GET",
        success: function (response) {
            console.log(response);
            if (response.data) {
                var data = response.data;
                $("#user_id_val").val(data.user_id);
                $("#username").text(data.username);
                $("#username_pop").val(data.username);
                $("#username-popup").text(data.username);
                $("#prev_profile, #prev_profile_pop").attr(
                    "src",
                    "data:image/png;base64," + data.photo
                );
            }
        },
    });
}

// Fungsi untuk mengambil data kategori dari API
function getCategories() {
    $.ajax({
        url: "http://localhost:8000/api/categoryList",
        type: "GET",
        success: function (response) {
            // Panggil fungsi untuk menampilkan kategori ke dalam daftar
            displayCategories(response.data);
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
}

// Fungsi untuk menampilkan kategori ke dalam daftar
function displayCategories(categories) {
    const categoryList = $("#categoryList");
    // Kosongkan daftar sebelum menambahkan kategori baru
    categoryList.empty();
    // Tambahkan setiap kategori ke dalam daftar
    categories.forEach((category) => {
        const li = $("<li>");
        const link = $("<a>")
            .attr("href", "/categories/" + category.category_id)
            .text(category.name_category);
        li.append(link);
        categoryList.append(li);
    });
}
