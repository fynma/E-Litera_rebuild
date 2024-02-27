
// function getTotalPinjam() {
//   $.ajax({
//       url: 'http://127.0.0.1:8000/api/total-pinjam', // Ganti dengan URL yang sesuai
//       type: 'GET',
//       success: function (response) {
//           console.log(response);
//           if (response.data) {
//               // Mengupdate elemen HTML dengan data dari backend
//               $('#getTotalBorrow').text(response.data);
//           } else {
//               console.error('Gagal mendapatkan total buku yang dipinjam: ' + response.message);
//           }
//       },
//       error: function (xhr, status, error) {
//           console.error('Terjadi kesalahan: ' + error);
//       }
//   });
// }

// function getTotalStok() {
//   // AJAX request to your Laravel endpoint
//   $.ajax({
//       url: 'http://127.0.0.1:8000/api/showStok', // Change this URL to match your Laravel route
//       type: 'GET',
//       dataType: 'json',
//       success: function (response) {
//           // Update the HTML element with the total stok value
//           $('#totalStok').text(response.data);
//       },
//       error: function (error) {
//           console.error('Error fetching total book stok:', error);
//           $('#totalStok').text('Failed to fetch data');
//       }
//   });
// };


// function getTotalDenda() {
//   $.ajax({
//       url: 'http://127.0.0.1:8000/api/list_denda',
//       type: 'GET',
//       success: function (response) {
//           console.log(response);
//           if (response.borrows) {
//               var denda = response.borrows;
//               var uniquedenda = []; // Array untuk menyimpan ID buku unik

//               // Loop melalui setiap buku dan tambahkan ID buku ke dalam array jika belum ada
//               denda.forEach(function (denda) {
//                   var dendaId = denda.denda_id;
//                   if (!uniquedenda.includes(dendaId)) {
//                       uniquedenda.push(dendaId);
//                   }
//               });

//               // Hitung jumlah ID buku unik
//               var totalUniquedenda = uniquedenda.length;
//               $('#TotalDenda').text(totalUniquedenda);

//           } else {
//               console.error('Gagal mengambil data buku dari API.');
//           }
//       },
//       error: function (xhr, status, error) {
//           console.error('Error saat mengambil data buku:', error);
//       }
//   });
// }





// (Chart.defaults.global.defaultFontFamily = "Nunito"),
//   '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
// Chart.defaults.global.defaultFontColor = "#858796";

// // Pie Chart Example
// var ctx = document.getElementById("myPieChart");
// var myPieChart = new Chart(ctx, {
//   type: "doughnut",
//   data: {
//     labels: ["Tersedia", "Dipinjam", "Terlambat"],
//     datasets: [
//       {
//         data: [getTotalDenda(), getTotalPinjam(), getTotalStok()],
//         backgroundColor: ["#41C588", "#F9A63A", "#F36960"],
//         hoverBackgroundColor: ["#2F9E6B", "#DC830F", "#DD5148"],
//         hoverBorderColor: "rgba(234, 236, 244, 1)",
//       },
//     ],
//   },
//   options: {
//     maintainAspectRatio: false,
//     tooltips: {
//       backgroundColor: "rgb(255,255,255)",
//       bodyFontColor: "#858796",
//       borderColor: "#dddfeb",
//       borderWidth: 1,
//       xPadding: 15,
//       yPadding: 15,
//       displayColors: false,
//       caretPadding: 10,
//     },
//     legend: {
//       display: false,
//     },
//     cutoutPercentage: 80,
//   },
// });
// Fungsi untuk mendapatkan total pinjam
function getTotalPinjam() {
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: 'http://127.0.0.1:8000/api/total-pinjam',
      type: 'GET',
      success: function(response) {
        if (response.data) {
          $('#getTotalBorrow').text(response.data);
          resolve(response.data);
        } else {
          console.error('Gagal mendapatkan total buku yang dipinjam: ' + response.message);
          reject('Gagal mendapatkan total buku yang dipinjam');
        }
      },
      error: function(xhr, status, error) {
        console.error('Terjadi kesalahan: ' + error);
        reject('Terjadi kesalahan');
      }
    });
  });
}

// Fungsi untuk mendapatkan total stok
function getTotalStok() {
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: 'http://127.0.0.1:8000/api/showStok',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        $('#totalStok').text(response.data);
        resolve(response.data);
      },
      error: function(error) {
        console.error('Error fetching total book stok:', error);
        $('#totalStok').text('Failed to fetch data');
        reject('Gagal mendapatkan total stok buku');
      }
    });
  });
}

// Fungsi untuk mendapatkan total denda
function getTotalDenda() {
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: 'http://127.0.0.1:8000/api/list_denda',
      type: 'GET',
      success: function(response) {
        if (response.borrows) {
          var denda = response.borrows;
          var uniquedenda = [];
          denda.forEach(function(denda) {
            var dendaId = denda.denda_id;
            if (!uniquedenda.includes(dendaId)) {
              uniquedenda.push(dendaId);
            }
          });
          var totalUniquedenda = uniquedenda.length;
          $('#TotalDenda').text(totalUniquedenda);
          resolve(totalUniquedenda);
        } else {
          console.error('Gagal mengambil data buku dari API.');
          reject('Gagal mengambil data buku dari API');
        }
      },
      error: function(xhr, status, error) {
        console.error('Error saat mengambil data buku:', error);
        reject('Terjadi kesalahan saat mengambil data buku');
      }
    });
  });
}

// Setelah semua data diambil, buat grafik
Promise.all([getTotalPinjam(), getTotalStok(), getTotalDenda()])
  .then(function(data) {
    // data[0] adalah hasil dari getTotalPinjam()
    // data[1] adalah hasil dari getTotalStok()
    // data[2] adalah hasil dari getTotalDenda()

    // Buat grafik setelah mendapatkan semua data
    createPieChart(data[0], data[1], data[2]);
  })
  .catch(function(error) {
    console.error('Terjadi kesalahan:', error);
  });

// Fungsi untuk membuat pie chart
function createPieChart(totalPinjam, totalStok, totalDenda) {
  Chart.defaults.global.defaultFontFamily = "Nunito, -apple-system,system-ui,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif";
  Chart.defaults.global.defaultFontColor = "#858796";

  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: "doughnut",
    data: {
      labels: ["Terlambat", "Dipinjam", "Tersedia"],
      datasets: [
        {
          data: [totalDenda, totalPinjam, totalStok],
          backgroundColor: ["#F36960","#F9A63A","#41C588"],
          hoverBackgroundColor: ["#f2584e", "#DC830F", "#2ab876"],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: "#dddfeb",
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false,
      },
      cutoutPercentage: 80,
    },
  });
}
