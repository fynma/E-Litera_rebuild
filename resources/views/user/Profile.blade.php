<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Litera | Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="../css/user.css" />
    <link rel="icon" href="../img/logo-tanpa-tulisan.ico" type="image/x-icon" />
    <script>
        var appUrl = "{{ config('APP_URL') }}";
    </script>
</head>

<body>
    <header>
        <a href="homepage"><img src="../img/logo aplikasi billa 1.png" /></a>
        <!-- <div class="toggle">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>
      <div class="bg-sidebar"></div> -->
        <div class="kotak-search">
            <input type="search" name="cari" id="cari" placeholder="Cari" />
            <i class="bi bi-search"></i>
        </div>
        <div class="fav-notif">
            <a href="Favorit"><i class="bi bi-heart"></i> Favorit</a>
            <div class="garis-vertikal"></div>
            <a href="Notifikasi"><i class="bi bi-bell"></i> Notifikasi</a>
        </div>
    </header>
    <div class="navbar">
        <div class="kosongan-navbar"></div>
        <ul class="navigation">
            <li>
                <a href="#" class="kategori">Kategori <i class="bi bi-chevron-down"></i></a>
                <ul id="categoryList"></ul>
            </li>
            <li><a href="homepage">Beranda</a></li>
            <li><a href="Tentang">Tentang</a></li>
            <li>
                <a href="Riwayat">Riwayat</a>
            </li>
            <li><a href="Kontak">Kontak</a></li>
        </ul>
        <div class="username">
            @if (!session('photo'))
                <img src="" id="profil_menu" />
            @else
                <img id="prev_profile" alt="Nama Alt">
            @endif
            <a onclick="openModal(this)" style="cursor: pointer" id="usn_profile"></a>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="isi-popup">
            <div class="content-popup">
                <div class="username-content-popup">
                    @if (!session('photo'))
                        <img src="" id="prev_profile_pop" />
                    @else
                        <img id="prev_profile_pop"" alt="Nama Alt">
                    @endif
                    <div class="username-popup">
                        <p id="usn_profile_pop"></p>
                        <button id="btn-profile">
                            <a href="Profile">Lihat Profil</a>
                        </button>
                    </div>
                </div>
                <div class="widget">
                    <button id="btn-denda">
                        <img src="../img/icon-denda.png" />
                        <a href="Denda">Denda</a>
                    </button>
                    <button id="btn-bantuan">
                        <i class="bi bi-question-circle"></i>
                        <a href="Kontak">Bantuan</a>
                    </button>
                </div>
                <button class="btn-logout">
                    <div class="icon-logout">
                        <i class="bi bi-box-arrow-left"></i>
                    </div>
                    <p>Keluar Dari Aplikasi</p>
                </button>
                <br />
                <a onclick="closeModal()">Tutup</a>
            </div>
        </div>
    </div>

    <section class="profil">
        <form action="" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ session('user_id') }}">
            <h1>Profile</h1>
            <div class="content-profil">
                <div class="image-profile">
                    @if (!session('photo'))
                        <img src="" id="foto_profil" />
                    @else
                        <img id="prev_foto" alt="Nama Alt">
                    @endif
                    <div class="change-picture">
                        <i class="bi bi-camera"></i>
                        <input type="file" id="fileInput" name="photo" hidden />
                    </div>
                </div>
                <div class="data-user">

                    <div class="nama-user">
                        <label for="username">Nama Pengguna :</label>
                        <label for="long_name" style="margin-right: 314px;">Nama Panjang :</label>
                    </div>
                    <div class="nama-user">
                        <input type="text" name="username" id="username" placeholder="Nama Pengguna"
                            value=""  readonly/>
                        <input type="text" name="long_name" id="longname" placeholder="Nama Lengkap"
                            value=""  readonly/>
                    </div>
                    <label for="email" style="line-height: 60px;">Email Pengguna :</label>
                    <input type="text" name="email" id="email" placeholder="Email"
                    value="" readonly />
                    <label for="telp" style="line-height: 60px;">Nomor Telepon :</label>
                    <input type="text" name="telp" id="telp" placeholder="Nomor Telepon"
                    value=""  readonly/>
                    <label for="address" style="line-height: 60px;">Alamat Pengguna :</label>
                    <input type="text" name="address" id="address" placeholder="Alamat"
                        value="" readonly/>
                    <button id="editButton">
                        <a>Ubah Profil</a>
                    </button>
                    <button type="submit">Ubah</button>
        </form>
        </div>
        </div>
    </section>

    <section class="penutup">
        <div class="konten-penutup">
            <div class="books-footer">
                <div class="buku">
                    <img src="../img/books1.png" alt="Book 1" />
                    <img src="../img/books2.png" alt="Book 1" />
                    <img src="../img/books3.png" alt="Book 1" />
                    <img src="../img/books4.png" alt="Book 1" />
                </div>
                <h2>E-LITERA</h2>
                <p class="deskripsi-perpus">
                    E-Litera adalah sebuah sistem perpustakaan digital yang bisa di
                    akses kapanpun dan dimanapun
                </p>
                <p class="alamat">Jl. Raimei No 123 Kec. Klojen, Kota Malang</p>
                <p class="whatsapp">Whatsapp Contact Center : 0812-3456-7890</p>
                <p class="email">Email : e-litera@gmail.com</p>
            </div>
            <div class="layanan">
                <h2>layanan</h2>
                <a href="#">Direktori Peprustakaan</a>
            </div>
            <div class="informasi">
                <h2>Informasi</h2>
                <li>
                    <a href="Tentang">Tentang Kami</a>
                </li>
                <li>
                    <a href="Kontak">Hubungi Kami</a>
                </li>
                <div class="sosmed">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><img src="../img/yt-icon.png" /></a>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>&copy; E-Litera Perpustakaan Digital</p>
            <p>Perpustakaan Digital dengan berbagai ffitur</p>
        </div>
    </section>

    <script>
        // validasi button pinjam
        window.addEventListener("load", function() {
            closeModal();
        });

        let popup = document.getElementById("popup");

        function openModal(triggerElement) {
            // Tambahkan kelas untuk menampilkan modal
            popup.classList.add("open-popup");
        }

        function closeModal() {
            popup.classList.remove("open-popup");
        }

        // validasi ubah profil
        let editButton = document.getElementById("editButton");
        let inputs = document.querySelectorAll(".data-user input[readonly]");
        let submitButton = document.querySelector(
            ".data-user button[type='submit']"
        );

        editButton.addEventListener("click", function(event) {
            event.preventDefault(); // Mencegah form melakukan submit secara otomatis
            toggleEditStatus();
        });

        function toggleEditStatus() {
            inputs.forEach(function(input) {
                input.removeAttribute("readonly");
            });

            submitButton.style.display = "block";

            editButton.style.display = "none";
        }

        // change profil
        document
            .querySelector(".change-picture")
            .addEventListener("click", function() {
                document.getElementById("fileInput").click();
            });

        // button popup profile
        document
            .getElementById("btn-denda")
            .addEventListener("click", function() {
                var link = this.querySelector("a"); // Mengambil elemen <a> di dalam tombol
                if (link) {
                    window.location.href = link.href; // Mengarahkan ke URL yang ditentukan di dalam tag <a>
                }
            });
        document
            .getElementById("btn-bantuan")
            .addEventListener("click", function() {
                var link = this.querySelector("a"); // Mengambil elemen <a> di dalam tombol
                if (link) {
                    window.location.href = link.href; // Mengarahkan ke URL yang ditentukan di dalam tag <a>
                }
            });
        document
            .getElementById("btn-profile")
            .addEventListener("click", function() {
                var link = this.querySelector("a"); // Mengambil elemen <a> di dalam tombol
                if (link) {
                    window.location.href = link.href; // Mengarahkan ke URL yang ditentukan di dalam tag <a>
                }
            });
    </script>

    {{-- SCRIPT API  --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/search-category.js"></script>


    <script>
        $(document).ready(function() {
            getData();
            getCategories();
            $('form').submit(function(event) {
                event.preventDefault();

                // Menggunakan FormData untuk mengirim data formulir termasuk file
                var formData = new FormData(this);

                $.ajax({
                    url: appUrl + '/api/profile-edit',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            window.location.reload();
                        } else {
                            // Tampilkan pesan kesalahan jika validasi gagal
                            alert('Gagal memperbarui profil. Periksa kembali formulir Anda.');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan pesan kesalahan jika permintaan gagal
                        alert('Lengkapi semua bagian profile. foto tidak boleh lebih dari 50kb.');
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        function getData() {
            $.ajax({
                url: appUrl + '/profile',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        var data = response.data;

                        // Directly set values to HTML elements
                        $('#email').val(data.email);
                        $('#longname').val(data.long_name);
                        $('#telp').val(data.telp);
                        $('#username').val(data.username);
                        $('#address').val(data.address);
                        $('#role').val(data.role);

                        // Set values to input fields
                        $('#foto_profil, #profil_menu, #prev_foto, #prev_profile, #prev_profile_pop').attr(
                            'src', 'data:image/png;base64,' + data.photo)
                        $('#usn_profile, #usn_profile_pop').text(data.username)
                        console.log($('#username'));
                    }
                }
            });
        };

        // Fungsi untuk mengambil data kategori dari API
        function getCategories() {
            $.ajax({
                url: appUrl + '/api/categoryList',
                type: 'GET',
                success: function(response) {
                    // Panggil fungsi untuk menampilkan kategori ke dalam daftar
                    displayCategories(response.data);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        };

        // Fungsi untuk menampilkan kategori ke dalam daftar
        function displayCategories(categories) {
            const categoryList = $('#categoryList');
            // Kosongkan daftar sebelum menambahkan kategori baru
            categoryList.empty();
            // Tambahkan setiap kategori ke dalam daftar
            categories.forEach(category => {
                const li = $('<li>');
                const link = $('<a>').attr('href', '/user/category/' + category.name_category).text(category
                    .name_category);
                li.append(link);
                categoryList.append(li);
            });
        };
    </script>

</body>

</html>
