document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("registerForm");

    registerForm.addEventListener("submit", async function (event) {
        event.preventDefault();

        const formData = new FormData(registerForm);
        const url = "http://localhost:8000/api/auth/register";

        try {
            const response = await fetch(url, {
                method: "POST",
                body: formData,
            });

            const responseData = await response.json();

            if (response.ok) {
                // Registrasi berhasil
                console.log(responseData);
                alert("Registrasi berhasil!");
                // Tambahkan logika lain yang diperlukan setelah registrasi berhasil
            } else {
                // Registrasi gagal
                console.error(responseData);
                alert("Registrasi gagal: " + responseData.message);
                // Tambahkan logika lain yang diperlukan jika registrasi gagal
            }
        } catch (error) {
            console.error("Terjadi kesalahan:", error);
            alert("Terjadi kesalahan saat mengirim permintaan registrasi.");
            // Tambahkan logika lain jika terjadi kesalahan saat mengirim permintaan
        }
    });
});
