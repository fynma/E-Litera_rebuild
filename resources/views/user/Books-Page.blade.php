<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="../../css/user.css" />
    <link rel="icon" href="../../img/logo-tanpa-tulisan.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <meta name="user-id" content="{{ session('user_id') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        var appUrl = "{{ config('APP_URL') }}";
    </script>
    <style>
        .nilai-bintang {
            cursor: pointer;
        }

        .bi-star, .bi-star-fill {
      color: #ccc; /* Warna awal bintang (belum diklik) */
      cursor: pointer;
    }

    .bi-star-fill {
      color: gold !important; /* Warna bintang yang sudah diklik */
    }
    </style>
</head>

<body>
    <header>
        <a href="../homepage"><img src="../../img/logo aplikasi billa 1.png" /></a>

        <div class="kotak-search">
            <input type="search" name="cari" id="cari" placeholder="Cari" />
            <i class="bi bi-search"></i>
        </div>
        <div class="fav-notif">
            <a href="../Favorit"><i class="bi bi-heart"></i> Favorit</a>
            <div class="garis-vertikal"></div>
            <a href="../Notifikasi"><i class="bi bi-bell"></i> Notifikasi</a>
        </div>
    </header>
    <div class="navbar">
        <div class="kosongan-navbar"></div>
        <ul class="navigation">
            <li>
                <a href="#" class="kategori">Kategori <i class="bi bi-chevron-down"></i></a>
                <ul id="categoryList"></ul>
            </li>
            <li><a href="../homepage">Beranda</a></li>
            <li><a href="../Tentang">Tentang</a></li>
            <li>
                <a href="../Riwayat">Riwayat</a>
            </li>
            <li><a href="../Kontak">Kontak</a></li>
        </ul>
        <div class="username">
            @if (!session('photo'))
                <img src="" id="prev_profile" />
            @else
                <img id="prev_profile" alt="Nama Alt">
            @endif
            <a onclick="openModal(this)" style="cursor: pointer" id="username"></a>
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
                <img src="../../img/logo aplikasi billa 1.png" />
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
                            <input type="text" name="judul-buku" id="judul-buku-pop"
                                style="pointer-events: none;" readonly />
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
                            <input type="number" name="jumlah" id="jumlah" placeholder="isilah jumlah buku.."
                                min="0" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                        </div>
                    </div>
                    <button type="submit" style="cursor: pointer;">Pinjam</button>
                </form>
            </div>
        </div>
    </div>

    <section class="deskripsi-buku">
        <div class="container">
            <h2>Detail Buku</h2>
            <div class="identitas-buku">
                <img src="" / id="gambar_book">
                <div class="identitas">
                    <h2 id="judul_buku"></h2>
                    <a style="font-size: 14px; color: #666666;">By: <span id="penulis_buku"></span></a>
                    <div class="rating" id="bookRating">
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
                    </p>
                    <a id="read-more" class="read-more" style="cursor: pointer;">Selengkapnya</a>
                </div>

                <div id="content-details" class="content">
                    <div class="nama-kolom">
                        <li>Penulis</li>
                        <li>Penerbit</li>
                        <li>Tahun Terbit</li>
                        <li>Jumlah Buku</li>
                        <li>Kategori</li>
                    </div>
                    <div class="isi-kolom">
                        <li id="penulis_book"></li>
                        <li id="penerbit_buku"></li>
                        <li id="terbit_buku"></li>
                        <li id="stok_buku"></li>
                        <li id="kategori_buku"></li>
                    </div>
                </div>

                <div id="content-comments" class="content">
                    <div id="displayComent">
                        
                    </div>
                    <!-- pemanggilan id="komentar" pada div konten komen -->
                    <!-- <div class="konten-komen">
                        <div class="komentar">
                            <img src="../../img/avatar.jpg" />
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
                    </div> -->
                    <div class="tambah-komen">
                        <div class="inputan">
                            @if (!session('photo'))
                                <img src="" id="prev_profile" />
                            @else
                                <img id="prev_profile" alt="Nama Alt">
                            @endif
                            <input type="text" name="tambah-komen" id="tambah-komen"
                                    placeholder="Tambahkan Komentar..." />
                        </div>
                        <button id="kirim_komen"><i class="bi bi-send"></i></button>
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
        <div class="books-grid" id="grid-item">
        </div>
    </section>

    <div class="popup" id="popup">
        <div class="isi-popup">
            <div class="content-popup">
                <div class="username-content-popup">
                    @if (!session('photo'))
                        <img src="" id="prev_profile_pop" />
                    @else
                        <img src="data:image/png;base64,{{ session('photo') }}" alt="Nama Alt">
                    @endif
                    <div class="username-popup">
                        <p id="username-popup"></p>
                        <button id="btn-profile">
                            <a href="../Profile">Lihat Profil</a>
                        </button>
                    </div>
                </div>
                <div class="widget">
                    <button id="btn-denda">
                    <img src="../../img/icon-denda.png" />
                    <a href="../Denda">Denda</a>
                    </button>
                    <button id="btn-bantuan">
                    <i class="bi bi-question-circle"></i>
                    <a href="../Kontak">Bantuan</a>
                    </button>
                </div>
                <button class="btn-logout" onclick="logout()">
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
                    <img src="../../img/books1.png" alt="Book 1" />
                    <img src="../../img/books2.png" alt="Book 1" />
                    <img src="../../img/books3.png" alt="Book 1" />
                    <img src="../../img/books4.png" alt="Book 1" />
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
                    <a href="../Tentang">Tentang Kami</a>
                </li>
                <li>
                    <a href="../Kontak">Hubungi Kami</a>
                </li>
                <div class="sosmed">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><img src="../../img/yt-icon.png" /></a>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>&copy; E-Litera Perpustakaan Digital</p>
            <p>Perpustakaan Digital dengan berbagai ffitur</p>
        </div>
    </section>

    <script>
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

            function logout() {
            // Ambil token CSRF dari meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Kirim permintaan logout dengan menyertakan token CSRF
            $.ajax({
                url: appUrl + '/hapussession',
                type: 'POST',
                data: {
                    _token: csrfToken // Sertakan token CSRF dalam data permintaan
                },
                success: function(response) {
                    console.log(response);
                    location.reload()
                },
                error: function(error) {
                    console.error('Logout failed:', error);
                }
            });
        }
    </script>
    <script src="../../js/bookDetail.js"></script>
    <script src="../../js/search-category.js"></script>
    <script src="../../js/rating.js"></script>

</body>

</html>
