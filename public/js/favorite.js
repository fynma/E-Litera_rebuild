$(document).ready(function () {
    getfavorite();
});



function getfavorite() {
    $.ajax({
        url: "http://127.0.0.1:8000/api/showFavorite",
        type: "GET",
        success: function (response) {
            console.log(response);
            if (response.data) {
                var books = response.data;
                books.sort((a, b) => new Date(b.published_date) - new Date(a.published_date));
                displayBooks(books);
            } else {
                console.error("Failed to retrieve categories from the API.");
            }
        },
        error: function (xhr, status, error) {
            console.error("Error while fetching book:", error);
        },
    });
}

function displayBooks(books) {
    var gridContainer = $("#grid-item");
    gridContainer.empty();

    books = books.slice(0, 6).reverse();


    $.each(books, function (index, book) {
        var gridItem = $(
            '<div class="grid-item" data-rating="' + book.rating + '"></div>'
        );
        var img = $("<img>")
            .attr("src", "data:image/png;base64," + book.gambar)
            .attr("alt", book.judul);

        var details = $('<div class="details"></div>');

        var categories = $('<div id="kategori-buku"></div>');
        $.each(book.kategori, function (i, category) {
            categories.append('<a href="#">' + category + "</a>, ");
        });

        var title = $(
            '<h3 id="judul-buku"><a style="cursor:pointer;" id="book_judul" data-id="' +
                book.book_id +
                '">' +
                book.judul +
                "</a></h3>"
        );
        var author = $(
            '<a href="#" id="penulis-buku">By: ' + book.penulis + "</a>"
        );

        var rating = $('<div class="rating"></div>');
        var fullStars = Math.floor(book.rating); // Bintang penuh
        var decimalPart = book.rating - fullStars; // Bagian desimal
        var halfStar = decimalPart >= 0.25 && decimalPart < 0.75; // Setengah bintang
        var fullStarAfterHalf = decimalPart >= 0.75; // Bintang penuh setelah setengah bintang

        for (var i = 1; i <= 5; i++) {
            if (i <= fullStars) {
                rating.append(
                    '<i class="bi bi-star-fill" value="' + i + '"></i>'
                );
            } else if (i === fullStars + 1 && halfStar) {
                rating.append(
                    '<i class="bi bi-star-half" value="' + i + '"></i>'
                );
            } else if (i === fullStars + 1 && fullStarAfterHalf) {
                rating.append(
                    '<i class="bi bi-star-fill" value="' + i + '"></i>'
                );
            } else {
                rating.append('<i class="bi bi-star" value="' + i + '"></i>');
            }
        }

        var linkPinjam = $('<div class="link-pinjam" id="disabledLink"></div>');
        var buttonPinjam = $(
            '<button style="cursor: pointer" id="btn-pinjam" onclick="openPinjam()" data-id=' +
                book.book_id +
                "><a>Pinjam</a></button>"
        );

        details.append(
            categories,
            title,
            author,
            rating,
            linkPinjam.append(buttonPinjam)
        );
        gridItem.append(img, details);
        gridContainer.append(gridItem);
    });
}