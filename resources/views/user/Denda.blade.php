<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Litera | Denda</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="icon" href="../img/logo-tanpa-tulisan.ico" type="image/x-icon" />

    <!-- css tabel -->
    <link
      rel="stylesheet"
      href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"
    />

    <!-- css custom -->
    <link rel="stylesheet" href="../css/user.css" />

    <!-- js tabel -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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

    <section class="denda">
      <h1>Denda</h1>
      <table
        id="tabel-data"
        class="table table-striped table-bordered"
        width="100%"
        cellspacing="0"
      >
        <thead>
          <tr>
            <th style="width: 10px">No</th>
            <th style="width: 300px">Buku</th>
            <th style="width: 120px">Tanggal Pinjam</th>
            <th style="width: 170px">Tanggal Pengembalian</th>
            <th style="width: 170px">Keterlambatan (hari)</th>
            <th style="width: 170px">Total Denda (Rp)</th>
            <th style="width: 170px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>4</td>
            <td>4000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>2</td>
            <td>2000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>3</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>3</td>
            <td>3000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>4</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>4</td>
            <td>4000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>5</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>5</td>
            <td>5000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>6</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>3</td>
            <td>3000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>7</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>2</td>
            <td>2000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>8</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>1</td>
            <td>1000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>9</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>9</td>
            <td>9000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>10</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>4</td>
            <td>4000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>11</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>2</td>
            <td>2000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>12</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>3</td>
            <td>3000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>13</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>2</td>
            <td>2000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>14</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>5</td>
            <td>5000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>15</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>5</td>
            <td>5000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>16</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>6</td>
            <td>6000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>17</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>4</td>
            <td>4000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>18</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>2</td>
            <td>2000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
          <tr>
            <td>19</td>
            <td>Help Me Find My Stomach</td>
            <td>20-12-2023</td>
            <td>27-12-2023</td>
            <td>7</td>
            <td>7000</td>
            <td class="btn-bayar"><button>Bayar</button></td>
          </tr>
        </tbody>
      </table>
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

    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
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

      // table data
      $(document).ready(function () {
        $("#tabel-data").DataTable({
          language: {
            lengthMenu: "Tampilkan _MENU_ hasil",
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",
            infoEmpty: "Tidak ada data",
            infoFiltered: "(filtered from _MAX_ total records)",
            emptyTable: "Tidak ada data",
            search: "Cari data:",
            paginate: {
              first: "Awal",
              last: "Terakhir",
              next: "Selanjutnya",
              previous: "Sebelumnya",
            },
          },
        });
      });
    </script>
  </body>
</html>
