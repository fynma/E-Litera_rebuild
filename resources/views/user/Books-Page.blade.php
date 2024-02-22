<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="../css/user.css" />
    <link rel="icon" href="../img/logo-tanpa-tulisan.ico" type="image/x-icon" />
</head>

<body>
    <header>
        <a href="homepage"><img src="../img/logo aplikasi billa 1.png" /></a>
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
                <img src="../img/avatar.jpg" />
            @else
                <img id="prev_profile" alt="Nama Alt">
            @endif
            <a onclick="openModal(this)" style="cursor: pointer" id="username"></a>
        </div>
    </div>

    <div class="bg-peminjaman" id="bg-peminjaman">
        <div class="peminjaman">
            <div class="header-peminjaman">
                <img src="../img/logo aplikasi billa 1.png" />
                <i class="bi bi-x-lg" onclick="closePinjam(this)" style="cursor: pointer"></i>
            </div>
            <div class="content-peminjaman" id="content-peminjaman">
                <div class="gambar-buku-dipopup">
                    <img id="gambar-buku-pop" alt="gambar buku" />
                </div>
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id_val">
                    <!-- <input type="hidden" name="tgl_pinjam" id="tanggal-pinjam"> -->
                    <input type="hidden" name="book_id" id="book-id-popup">
                    <h3>Formulir Peminjaman</h3>
                    <div class="get-pinjam">
                        <label for="nama">Nama</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <input type="text" name="nama" id="username_pop" style="pointer-events: none;"
                                readonly />
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="judul-buku">Judul buku</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <input type="text" name="judul-buku" id="judul-buku-pop" style="pointer-events: none;"
                                readonly />
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="tanggal-pinjam">Tanggal Pinjam</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <input type="text" name="tanggal-pinjam" id="tanggal-pinjam"
                                style="pointer-events: none;" readonly />
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="tgl-kembali">Tanggal kembali</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <input type="text" name="tgl-kembali" id="tgl-kembali" style="pointer-events: none;"
                                readonly />
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="jumlah">Jumlah</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <input type="text" name="jumlah" id="jumlah" placeholder="isilah jumlah buku.." />
                        </div>
                    </div>
                    <button type="submit" style="cursor: pointer;">Pinjam</button>
                </form>
            </div>
        </div>
    </div>

    <section class="banner" id="banner">
        <div class="content">
            <h1>Selamat Datang Di</h1>
            <h1>Website <a href="#">E-Litera</a></h1>
            <p>
                Jelajahi dunia literasi dengan koleksi digital kami. Baca, pelajari,
                dan temukan pengetahuan baru di perpustakaan digital kami.
            </p>
            <a href="Tentang" class="btn-banner">Baca Selengkapnya</a>
        </div>
    </section>
    <section class="rekomendasi">
        <div class="title">
            <div class="judul">
                <p>Rekomendasi</p>
                <h1>Pilihan buku terbaik untuk anda</h1>
            </div>
            <div class="btn-rekomendasi">
                <a href="#">Baca Selengkapnya</a>
            </div>
        </div>
        <div class="books-grid" id="grid-item">
        </div>
    </section>

    <div class="popup" id="popup">
        <div class="isi-popup">
            <div class="content-popup">
                <div class="username-content-popup">
                    @if (!session('photo'))
                        <img src="../img/avatar.jpg" />
                    @else
                        <img src="data:image/png;base64,{{ session('photo') }}" alt="Nama Alt">
                    @endif
                    <div class="username-popup">
                        <p id="username-popup"></p>
                        <button id="btn-profile">
                            <a href="/user/profile">Lihat Profil</a>
                        </button>
                    </div>
                </div>
                <div class="widget">
                    <button id="btn-denda">
                        <img src="../img/icon-denda.png" />
                        <a href="/user/Denda">Denda</a>
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
    <div class="beri-nilai" id="beri-nilai">
        <div class="content-beri-nilai">
            <div class="btn-close-nilai">
                <i class="bi bi-x-lg" onclick="tutupNilai()"></i>
            </div>
            <h2>Beri Nilai</h2>
            <p>Ketuk bintang untuk menilai buku</p>
            <div class="nilai-bintang">
                <i class="bi bi-star" value="1"></i>
                <i class="bi bi-star" value="2"></i>
                <i class="bi bi-star" value="3"></i>
                <i class="bi bi-star" value="4"></i>
                <i class="bi bi-star" value="5"></i>
            </div>
        </div>
    </div>

    <div class="bg-peminjaman" id="bg-peminjaman">
        <div class="peminjaman">
            <div class="header-peminjaman">
                <i class="bi bi-chevron-left" onclick="closePinjam(this)" style="cursor: pointer"></i>
                <img src="../img/logo aplikasi billa 1.png" />
            </div>
            <div class="content-peminjaman">
                <img src="../img/vektor-login.png" />
                <form>
                    <h3>Formulir Peminjaman</h3>
                    <div class="get-pinjam">
                        <label for="nama">Nama</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <p>Natalia Dita</p>
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="judul-buku">Judul buku</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <p>Help Me Find My Stomach</p>
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="stok">Sisa buku tersedia</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <p>3</p>
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="tgl-kembali">Tanggal kembali</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <p>29/01/2024</p>
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="nama">Jumlah</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <input type="text" name="jumlah" id="jumlah"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                placeholder="isilah jumlah buku.." />
                        </div>
                    </div>
                    <button type="submit">kirim</button>
                </form>
            </div>
        </div>
    </div>

    <section class="deskripsi-buku">
        <div class="container">
            <h2>Detail Buku</h2>
            <div class="identitas-buku">
                <img src="../img/books1.png" />
                <div class="identitas">
                    <h2>Help Me Find My Stomach</h2>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="pinjam-buku">
                        <button style="cursor: pointer" onclick="bukaNilai()">
                            <a>Beri Nilai</a>
                        </button>
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                        <i id="heartIcon" class="bi bi-heart-fill"></i>
                    </div>
                </div>
            </div>
            <div class="menu-buku">
                <ul>
                    <li>
                        <a href="#description" class="active" data-target="description">Deskripsi</a>
                    </li>
                    <li><a href="#details" data-target="details">Detail</a></li>
                    <li><a href="#comments" data-target="comments">Komentar</a></li>
                </ul>

                <div id="content-description" class="content">
                    <p id="description-text" class="">
                        Kami bertiga teman baik. Remaja, murid kelas sebelas. Penampilan
                        kami sama seperti murid pada umumnya. Kami sedang berada di masa
                        di mana kami sedang mengerjakan sebuah projek untuk tugas akhir.
                        Ini adalah kisah kami dengan lika-liku dan drama dalam mengerjakan
                        tugas akhir yang merepotkan ini.
                    </p>
                    <a href="#" id="read-more" class="read-more">Selengkapnya</a>
                </div>

                <div id="content-details" class="content">
                    <div class="nama-kolom">
                        <li>Penulis</li>
                        <li>Penerbit</li>
                        <li>Tahun Terbit</li>
                        <li>Jumlah</li>
                        <li>Kategori</li>
                    </div>
                    <div class="isi-kolom">
                        <li>Angela Gunning</li>
                        <li>Pustaka Utama</li>
                        <li>2018</li>
                        <li>6</li>
                        <li>Adventure, Fun</li>
                    </div>
                </div>

                <div id="content-comments" class="content">
                    <div class="konten-komen">
                        <div class="komentar">
                            <img src="../img/avatar.jpg" />
                            <div class="isi-komen">
                                <h2 class="username-komen" id="username-komen">Dika</h2>
                                <p class="tanggal-komen" id="tanggal-komen">
                                    9 Januari 2020 - 20.23 WIB
                                </p>
                                <p class="isi" id="isi">
                                    Bukunya membuat saya mendapatkan banyak pengalaman
                                </p>
                                <a href="#">Balas</a>
                            </div>
                        </div>
                        <div class="komentar">
                            <img src="../img/avatar.jpg" />
                            <div class="isi-komen">
                                <h2 class="username-komen" id="username-komen">Dika</h2>
                                <p class="tanggal-komen" id="tanggal-komen">
                                    9 Januari 2020 - 20.23 WIB
                                </p>
                                <p class="isi" id="isi">
                                    Bukunya membuat saya mendapatkan banyak pengalaman
                                </p>
                                <a href="#">Balas</a>
                            </div>
                        </div>
                        <div class="komentar">
                            <img src="../img/avatar.jpg" />
                            <div class="isi-komen">
                                <h2 class="username-komen" id="username-komen">Dika</h2>
                                <p class="tanggal-komen" id="tanggal-komen">
                                    9 Januari 2020 - 20.23 WIB
                                </p>
                                <p class="isi" id="isi">
                                    Bukunya membuat saya mendapatkan banyak pengalaman
                                </p>
                                <a href="#">Balas</a>
                            </div>
                        </div>
                    </div>
                    <div class="tambah-komen">
                        <div class="inputan">
                            <img src="../img/avatar.jpg" />
                            <input type="text" name="tambah-komen" id="tambah-komen"
                                placeholder="Tambahkan Komentar..." />
                        </div>
                        <button><i class="bi bi-send"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rekomendasi">
        <div class="title">
            <div class="judul">
                <h1>Buku Serupa</h1>
            </div>
        </div>
        <div class="books-grid">
            <div class="grid-item" data-rating="5">
                <img src="../img/books1.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="../img/books2.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="../img/books3.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="../img/books4.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="../img/books5.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="../img/books6.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="popup" id="popup">
        <div class="isi-popup">
            <div class="content-popup">
                <div class="username-content-popup">
                    <img src="../img/avatar.jpg" />
                    <div class="username-popup">
                        <p>Natalia Dita</p>
                        <button id="btn-profile">
                            <a href="Profile.html">Lihat Profil</a>
                        </button>
                    </div>
                </div>
                <div class="widget">
                    <button id="btn-denda">
                        <img src="../img/icon-denda.png" />
                        <a href="Denda.html">Denda</a>
                    </button>
                    <button id="btn-bantuan">
                        <i class="bi bi-question-circle"></i>
                        <a href="Kontak.html">Bantuan</a>
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
                    <a href="Tentang.html">Tentang Kami</a>
                </li>
                <li>
                    <a href="Kontak.html">Hubungi Kami</a>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>
      $(document).ready(function() {
            getData();
            getCategories();
        });

        function getData() {
            $.ajax({
                url: 'http://127.0.0.1:8000/profile',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response.data) {
                        var data = response.data;
                        $('#user_id_val').val(data.user_id);
                        $('#username').text(data.username);
                        $('#username_pop').val(data.username);
                        $('#username-popup').text(data.username);
                        $('#prev_profile, #prev_profile_pop').attr('src', 'data:image/png;base64,' + data.photo)
                    }
                },
            });
        }

        // Fungsi untuk mengambil data kategori dari API
        function getCategories() {
            $.ajax({
                url: 'http://localhost:8000/api/categoryList',
                type: 'GET',
                success: function(response) {
                    // Panggil fungsi untuk menampilkan kategori ke dalam daftar
                    displayCategories(response.data);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Fungsi untuk menampilkan kategori ke dalam daftar
        function displayCategories(categories) {
            const categoryList = $('#categoryList');
            // Kosongkan daftar sebelum menambahkan kategori baru
            categoryList.empty();
            // Tambahkan setiap kategori ke dalam daftar
            categories.forEach(category => {
                const li = $('<li>');
                const link = $('<a>').attr('href', '/categories/' + category.category_id).text(category.name_category);
                li.append(link);
                categoryList.append(li);
            });
        }




        const menuLinks = document.querySelectorAll(".menu-buku ul li a");
        const contentContainers = document.querySelectorAll(".content");

        menuLinks.forEach((link) => {
            link.addEventListener("click", (event) => {
                event.preventDefault();

                // Remove active class from all menu links
                menuLinks.forEach((link) => link.classList.remove("active"));

                // Add active class to clicked menu link
                event.target.classList.add("active");

                // Hide all content containers
                contentContainers.forEach(
                    (container) => (container.style.display = "none")
                );

                // Show content container corresponding to clicked menu link
                const targetId = event.target.getAttribute("data-target");

                if (targetId === "details") {
                    document.getElementById(`content-${targetId}`).style.display =
                        "flex";
                } else {
                    document.getElementById(`content-${targetId}`).style.display =
                        "block";
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var contentDescription = document.getElementById("content-description");
            var descriptionText = document.getElementById("description-text");
            var readMore = document.getElementById("read-more");

            readMore.addEventListener("click", function(event) {
                event.preventDefault();

                // Toggle class expand pada content-description
                contentDescription.classList.toggle("expand");

                // Toggle antara Selengkapnya dan Sembunyikan
                if (readMore.textContent === "Selengkapnya") {
                    readMore.textContent = "Sembunyikan";
                } else {
                    readMore.textContent = "Selengkapnya";
                }
            });
        });

        // title halaman
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil elemen dengan kelas identitas dan dapatkan teks dari elemen tersebut
            const identitasTitle =
                document.querySelector(".identitas-buku h2").innerText;

            // Gabungkan teks dari identitas dengan judul awal
            const fullTitle = "E-Litera | " + identitasTitle;

            // Atur judul halaman dengan hasil gabungan
            document.title = fullTitle;
        });

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

        // validasi icon favorit
        document.addEventListener("DOMContentLoaded", function() {
            var favorit = document.getElementById("heartIcon");

            favorit.addEventListener("click", function(event) {
                event.preventDefault();

                // Ambil warna saat ini
                var currentColor = favorit.style.color;

                // Toggle antara warna default dan merah muda
                if (currentColor === "rgb(204, 204, 204)") {
                    favorit.style.color = "#ff69b4"; // Ubah ke merah muda
                } else {
                    favorit.style.color = "#ccc"; // Kembali ke warna default
                }
            });
        });

        // validasi Pinjam
        window.addEventListener("load", function() {
            closePinjam();
        });

        let pinjam = document.getElementById("bg-peminjaman");

        function openPinjam(triggerElement) {
            // Tambahkan kelas untuk menampilkan modal
            pinjam.classList.add("open-peminjaman");
        }

        function closePinjam() {
            pinjam.classList.remove("open-peminjaman");
        }

        // popup beri nilai
        window.addEventListener("load", function() {
            tutupNilai();
        });

        let nilai = document.getElementById("beri-nilai");

        function bukaNilai(triggerElement) {
            // Tambahkan kelas untuk menampilkan modal
            nilai.classList.add("open-nilai");
        }

        function tutupNilai() {
            nilai.classList.remove("open-nilai");
        }

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
</body>

</html>
