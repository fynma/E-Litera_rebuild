<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Litera | Riwayat Pinjam</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="../css/user.css" />
    <link rel="icon" href="../img/logo-tanpa-tulisan.ico" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
                <img src="" id="prev_profile" />
            @else
                <img id="prev_profile" alt="Nama Alt">
            @endif
            <a onclick="openModal(this)" style="cursor: pointer" id="username"></a>
        </div>
    </div>

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

    <div class="bg-detail" id="bg-detail">
        <div class="detail">
            <div class="header-detail">
                <i class="bi bi-chevron-left" onclick="tutupDetail(this)" style="cursor: pointer"></i>
                <img src="../img/logo aplikasi billa 1.png" />
            </div>
            <div class="content-detail">
                <div class="gambar-buku-detail">
                    <img src="" />
                </div>
                <form>
                    <h3>detail peminjaman</h3>
                    <div class="get-detail">
                        <label for="judul-buku">Judul buku</label>
                        <p>:</p>
                        <div class="data-get-detail">
                            <p>Help Me Find My Stomach</p>
                        </div>
                    </div>
                    <div class="get-detail">
                        <label for="tgl-pinjam">Tanggal Pinjam</label>
                        <p>:</p>
                        <div class="data-get-detail">
                            <p>29/01/2024</p>
                        </div>
                    </div>
                    <div class="get-detail">
                        <label for="tgl-kembali">Tanggal kembali</label>
                        <p>:</p>
                        <div class="data-get-detail">
                            <p>05/02/2024</p>
                        </div>
                    </div>
                    <div class="get-detail">
                        <label for="jumlah-pinjam">Jumlah</label>
                        <p>:</p>
                        <div class="data-get-detail">
                            <p>1</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="favorit">
      <h1>Riwayat detail</h1>
      <div class="content-favorit">
        <div class="books-grid" style="height: auto" id="grid-item">
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

    <script src="../js/riwayatPinjam.js"></script>
    <script src="../js/search-category.js"></script>

    <script>
      // validasi Profil
      window.addEventListener("load", function () {
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

        // validasi detail
        window.addEventListener("load", function() {
            tutupDetail();
        });

        let detail = document.getElementById("bg-detail");

        function bukaDetail(triggerElement) {
            // Tambahkan kelas untuk menampilkan modal
            detail.classList.add("open-detail");

            // Mengambil URL gambar dari gambar yang diklik
            var gambarURL = triggerElement.querySelector("img").src;

            // Mengganti gambar pada elemen dengan kelas gambar-buku-detail
            var gambarDetail = document.querySelector(".gambar-buku-detail img");
            if (gambarDetail) {
                gambarDetail.src = gambarURL;
            }
        }

        function tutupDetail() {
            detail.classList.remove("open-detail");
        }

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
  </body>
</html>
