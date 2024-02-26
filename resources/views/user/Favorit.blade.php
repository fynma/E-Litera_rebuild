<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Litera | Favorit</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="../css/user.css" />
    <link rel="icon" href="../img/logo-tanpa-tulisan.ico" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
              <p>Natalia Dita</p>
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

    <div class="bg-peminjaman" id="bg-peminjaman">
      <div class="peminjaman">
        <div class="header-peminjaman">
          <i
            class="bi bi-chevron-left"
            onclick="closePinjam(this)"
            style="cursor: pointer"
          ></i>
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
                <input
                  type="text"
                  name="jumlah"
                  id="jumlah"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  placeholder="isilah jumlah buku.."
                />
              </div>
            </div>
            <button type="submit">kirim</button>
          </form>
        </div>
      </div>
    </div>

    <section class="favorit">
      <h1>Favorit</h1>
      <div class="content-favorit">
        <div class="books-grid">
          <div class="grid-item" data-rating="5">
            <img src="../img/books1.png" alt="Book 1" />
            <div class="details">
              <div id="kategori-buku">
                <a href="#">Adventure</a>, <a href="#">Fun</a>
              </div>
              <h3 id="judul-buku">
                <a href="Books-Page">Help Me Find My Stomach</a>
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
                <a href="Books-Page">Help Me Find My Stomach</a>
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
                <a href="Books-Page">Help Me Find My Stomach</a>
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
                <a href="Books-Page">Help Me Find My Stomach</a>
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
                <a href="Books-Page">Help Me Find My Stomach</a>
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
                <a href="Books-Page">Help Me Find My Stomach</a>
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
        <div class="books-grid">
          <div class="grid-item" data-rating="5">
            <img src="../img/books1.png" alt="Book 1" />
            <div class="details">
              <div id="kategori-buku">
                <a href="#">Adventure</a>, <a href="#">Fun</a>
              </div>
              <h3 id="judul-buku">
                <a href="Books-Page">Help Me Find My Stomach</a>
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
                <a href="Books-Page">Help Me Find My Stomach</a>
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
                <a href="Books-Page">Help Me Find My Stomach</a>
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
                <a href="Books-Page">Help Me Find My Stomach</a>
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
                <a href="Books-Page">Help Me Find My Stomach</a>
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
                <a href="Books-Page">Help Me Find My Stomach</a>
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

      // validasi Pinjam
      window.addEventListener("load", function () {
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
    </script>
  </body>
</html>
