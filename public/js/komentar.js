function handleKomentar() {
    // Function to handle comment submission
    $("#komen").submit(function (event) {
        event.preventDefault();


        var path = window.location.pathname;
        var parts = path.split('/');
        var bookID = parts[parts.length - 1];
        var userID = user-id;

        var formData = new FormData();
        formData.append("user_id", userID);
        formData.append("book_id", bookID);
        formData.append("komentar", $("#tambah-komen").val());

        $.ajax({
            type: "POST",
            url: appUrl + "/api/uploadComment",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                window.location.reload();
            }
        });
    });
    $("#komen").keypress(function (e) {
        if (e.which === 13 && !e.shiftKey) {
            e.preventDefault(); // Hindari submit default form saat menekan "Enter"
            // Panggil submit form secara manual
            $("#form-komen").submit();
        }
    });

    // Menangani klik pada tombol "Submit"
    $("#btn-komen").click(function () {
        $("#komen").submit(); // Panggil submit form secara manual
    });
}