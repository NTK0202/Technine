const ctv = document.getElementById('phan_tich_san_pham_ban_ra');
const phan_tich_san_pham_ban_ra = new Chart(ctv, {
    type: 'pie',
          data: {
              labels: ['Gaming', 'Ultrabook', 'Workstation'],
              datasets: [{
                 label: 'Sản phẩm bán ra',
                    data: [257, 186, 73],
                    backgroundColor: [
                    '#40bf78',
                    '#f78da7',
                    'rgb(255, 205, 86)'
                  ],
                  borderWidth: 1
              }]
          },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});