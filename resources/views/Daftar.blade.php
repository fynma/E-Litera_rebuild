<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Litera | Daftar</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/Daftar.css" />
    <link rel="icon" href="img/logo-tanpa-tulisan.ico" type="image/x-icon" />
  </head>
  <body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div
        class="flex flex-wrap items-center justify-between mx-auto"
        style="padding-left: 60px; padding-top: 24px"
      >
        <a
          href="https://flowbite.com/"
          class="flex items-center space-x-3 rtl:space-x-reverse"
        >
          <img src="img/logo aplikasi billa 1.png" id="logo" alt="E-Litera" />
        </a>
      </div>
    </nav>

    <div class="popup" id="popup">
        <div class="content-popup">
          <img src="" />
          <h2></h2>
        </div>
      </div>
    </div>

    <section>
      <div class="content">
        <img src="img/vektor-login.png" />
        <div class="form-login">
          <h2>Selamat Datang!</h2>
          <h3>Silahkan isi formulir untuk mendaftar</h3>
          <form id="registerForm">
            <div class="grid md:grid-cols-2 md:gap-6 mb-8">
              <div class="relative">
                <input
                  type="email"
                  id="email"
                  name="email"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Masukan Email"
                  required
                />
              </div>
              <div class="relative">
                <input
                  type="text"
                  id="username"
                  name="username"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Masukan Nama Pengguna"
                  required
                />
              </div>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6 mb-8">
              <div class="relative">
              <input
                  type="text"
                  id="telp"
                  name="telp"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Nomor Telepon"
                  required
                />
              </div>
              <div class="relative">
                <input
                  type="texr"
                  id="nama-lengkap"
                  name="long_name"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Nama Lengkap"
                  required
                />
              </div>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
              <div class="relative flex items-center">
              <input
                  type="password"
                  id="password"
                  name="password"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Kata sandi"
                  required
                />
                <svg
                  class="absolute right-2 w-6 h-6 text-gray-800 dark:text-white"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 20 18"
                  id="eye"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1.933 10.909A4.357 4.357 0 0 1 1 9c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 19 9c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M2 17 18 1m-5 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                  />
                </svg>
              </div>
              <div class="relative">
                <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Konfirmasi Kata sandi"
                required
                />
              </div>
            </div>
            <p
              class="text-base font-bold"
              style="color: red; margin-bottom: 32px; margin-top: 10px"
            >
              *Minimal 8 Karakter
            </p>

            <button
              type="submit"
              class="text-white font-bold rounded-md text-base w-full sm:w-auto px-5 py-4 text-center"
            >
              DAFTAR
            </button>
          </form>
          <div class="divider">
            <div class="divider-line"></div>
            <div class="divider-text">ATAU</div>
            <div class="divider-line"></div>
          </div>
          <button class="login-google font-bold rounded-md text-base w-full">
            <img src="img/google.png" />
            <p><a href="#">DAFTAR DENGAN GOOGLE</a></p>
          </button>
          <div class="links text-base">
            <p>Sudah mempunyai akun?</p>
            <a href="/Login" class="font-bold">Masuk</a>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="js/register.js"></script>
  </body>
</html>
