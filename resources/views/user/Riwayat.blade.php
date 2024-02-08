<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Litera | Riwayat detail</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="../css/user.css" />
    <link rel="icon" href="../img/logo-tanpa-tulisan.ico" type="image/x-icon" />
  </head>
  <body>
    <header>
      <a href="index.html"><img src="../img/logo aplikasi billa 1.png" /></a>
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
        <a href="Favorit.html"><i class="bi bi-heart"></i> Favorit</a>
        <div class="garis-vertikal"></div>
        <a href="Notifikasi.html"><i class="bi bi-bell"></i> Notifikasi</a>
      </div>
    </header>
    <div class="navbar">
      <div class="kosongan-navbar"></div>
      <ul class="navigation">
        <li>
          <a href="#" class="kategori"
            >Kategori <i class="bi bi-chevron-down"></i
          ></a>
          <ul>
            <li>
              <a href="#" id="menu">Umum <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><h2></h2></li>
                <li><a href="#">Publikasi Umum</a></li>
                <li><a href="#">Informasi Umum</a></li>
                <li><a href="#">Ensiklopedia</a></li>
                <li><a href="#">Bibliografi</a></li>
                <li><a href="#">Majalah</a></li>
              </ul>
            </li>
            <li>
              <a href="#" id="menu"
                >Filsafat dan Psikologi <i class="bi bi-chevron-right"></i
              ></a>
              <ul>
                <li><h2></h2></li>
                <li><a href="#">Isu kesehatan Mental</a></li>
                <li><a href="#">Psikologi Positif</a></li>
                <li><a href="#">Psikologi dalam Filsafat</a></li>
                <li><a href="#">Filsafat Mindfulness</a></li>
                <li><a href="#">Psikologi Eksperimental</a></li>
                <li><a href="#">Filsafat Ontologi</a></li>
                <li><a href="#">Filsafat Epistemologi</a></li>
                <li><a href="#">Filsafat Aksiologi</a></li>
              </ul>
            </li>
            <li>
              <a href="#" id="menu"
                >Sosial <i class="bi bi-chevron-right"></i
              ></a>
              <ul>
                <li><h2></h2></li>
                <li><a href="#">Sosiologi</a></li>
                <li><a href="#">Kesejahteraan Masyarakat</a></li>
                <li><a href="#">Politik dan Ekonomi</a></li>
                <li><a href="#">Budaya dan Identitas</a></li>
                <li><a href="#">Isu Kontemporer</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Agama <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><h2></h2></li>
                <li><a href="#">Islam</a></li>
                <li><a href="#">Protestan dan Katolik</a></li>
                <li><a href="#">Hindu</a></li>
                <li><a href="#">Buddha</a></li>
                <li><a href="#">Konghucu</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Bahasa <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><h2></h2></li>
                <li><a href="#">Tata Bahasa</a></li>
                <li><a href="#">Cerpen Indonesia</a></li>
                <li><a href="#">Bahasa Indonesia</a></li>
                <li><a href="#">Bahasa Asing</a></li>
              </ul>
            </li>
            <li>
              <a href="#"
                >Sains dan Matematika <i class="bi bi-chevron-right"></i
              ></a>
              <ul>
                <li><h2></h2></li>
                <li><a href="#">Sains</a></li>
                <li><a href="#">Matematika Dasar</a></li>
                <li><a href="#">Kimia</a></li>
                <li><a href="#">Kalkulus</a></li>
                <li><a href="#">Fisika</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Teknologi <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><h2></h2></li>
                <li><a href="#">Inovasi</a></li>
                <li><a href="#">Pemrograman</a></li>
                <li><a href="#">Teknologi Medis</a></li>
                <li><a href="#">Machine Learning</a></li>
                <li><a href="#">Artificial Intelegent</a></li>
              </ul>
            </li>
            <li>
              <a href="#"
                >Seni dan Rekreasi <i class="bi bi-chevron-right"></i
              ></a>
              <ul>
                <li><h2></h2></li>
                <li><a href="#">Seni Lukis</a></li>
                <li><a href="#">Seni Rupa</a></li>
                <li><a href="#">Pariwisata</a></li>
                <li><a href="#">Wisata Alam</a></li>
                <li><a href="#">Seni Tari</a></li>
              </ul>
            </li>
            <li>
              <a href="#"
                >Literatur dan Sastra <i class="bi bi-chevron-right"></i
              ></a>
              <ul>
                <li><h2></h2></li>
                <li><a href="#">Novel</a></li>
                <li><a href="#">Sastra Indonesia</a></li>
                <li><a href="#">Cerpen</a></li>
                <li><a href="#">Komik</a></li>
                <li><a href="#">Sastra Dunia</a></li>
              </ul>
            </li>
            <li>
              <a href="#"
                >Sejarah dan Geografis <i class="bi bi-chevron-right"></i
              ></a>
              <ul>
                <li><h2></h2></li>
                <li><a href="#">Sejarah Dunia</a></li>
                <li><a href="#">Sejarah Nasional</a></li>
                <li><a href="#">Arkeologi</a></li>
                <li><a href="#">Geografis</a></li>
                <li><a href="#">Tokoh Bersejarah</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="index.html">Beranda</a></li>
        <li><a href="Tentang.html">Tentang</a></li>
        <li>
          <a href="Riwayat.html">Riwayat</a>
        </li>
        <li><a href="Kontak.html">Kontak</a></li>
      </ul>
      <div class="username">
        <img src="../img/avatar.jpg" />
        <a onclick="openModal(this)" style="cursor: pointer">Natalia Dita</a>
      </div>
    </div>

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

    <div class="bg-detail" id="bg-detail">
      <div class="detail">
        <div class="header-detail">
          <i
            class="bi bi-chevron-left"
            onclick="tutupDetail(this)"
            style="cursor: pointer"
          ></i>
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
        <div class="books-grid" style="height: auto">
          <div
            class="grid-item"
            style="cursor: pointer"
            onclick="bukaDetail(this)"
          >
            <img src="../img/books1.png" alt="Book 1" />
            <div class="details">
              <h3 id="judul-buku">
                <a href="Books-Page.html">Help Me Find My Stomach</a>
              </h3>
              <div id="status">
                <p>Dipinjam</p>
              </div>
            </div>
          </div>
          <div
            class="grid-item"
            style="cursor: pointer"
            onclick="bukaDetail(this)"
          >
            <img src="../img/books2.png" alt="Book 1" />
            <div class="details">
              <h3 id="judul-buku">
                <a href="Books-Page.html">Help Me Find My Stomach</a>
              </h3>
              <div id="status">
                <p>Dipinjam</p>
              </div>
            </div>
          </div>
          <div
            class="grid-item"
            style="cursor: pointer"
            onclick="bukaDetail(this)"
          >
            <img src="../img/books3.png" alt="Book 1" />
            <div class="details">
              <h3 id="judul-buku">
                <a href="Books-Page.html">Help Me Find My Stomach</a>
              </h3>
              <div id="status">
                <p>Dipinjam</p>
              </div>
            </div>
          </div>
          <div
            class="grid-item"
            style="cursor: pointer"
            onclick="bukaDetail(this)"
          >
            <img src="../img/books4.png" alt="Book 1" />
            <div class="details">
              <h3 id="judul-buku">
                <a href="Books-Page.html">Help Me Find My Stomach</a>
              </h3>
              <div id="status">
                <p>Dikembalikan</p>
              </div>
            </div>
          </div>
          <div
            class="grid-item"
            style="cursor: pointer"
            onclick="bukaDetail(this)"
          >
            <img src="../img/books5.png" alt="Book 1" />
            <div class="details">
              <h3 id="judul-buku">
                <a href="Books-Page.html">Help Me Find My Stomach</a>
              </h3>
              <div id="status">
                <p>Dipinjam</p>
              </div>
            </div>
          </div>
          <div
            class="grid-item"
            style="cursor: pointer"
            onclick="bukaDetail(this)"
          >
            <img src="../img/books6.png" alt="Book 1" />
            <div class="details">
              <h3 id="judul-buku">
                <a href="Books-Page.html">Help Me Find My Stomach</a>
              </h3>
              <div id="status">
                <p>Terlambat</p>
              </div>
            </div>
          </div>
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
        .addEventListener("click", function () {
          var link = this.querySelector("a"); // Mengambil elemen <a> di dalam tombol
          if (link) {
            window.location.href = link.href; // Mengarahkan ke URL yang ditentukan di dalam tag <a>
          }
        });
      document
        .getElementById("btn-bantuan")
        .addEventListener("click", function () {
          var link = this.querySelector("a"); // Mengambil elemen <a> di dalam tombol
          if (link) {
            window.location.href = link.href; // Mengarahkan ke URL yang ditentukan di dalam tag <a>
          }
        });
      document
        .getElementById("btn-profile")
        .addEventListener("click", function () {
          var link = this.querySelector("a"); // Mengambil elemen <a> di dalam tombol
          if (link) {
            window.location.href = link.href; // Mengarahkan ke URL yang ditentukan di dalam tag <a>
          }
        });

      // validasi detail
      window.addEventListener("load", function () {
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
    </script>
  </body>
</html>
