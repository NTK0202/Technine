const cty = document.getElementById('bieu_do_thong_ke');
const bieu_do_thong_ke = new Chart(cty, {
    type: 'bar',
    data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6'],
        datasets: [{
            label: 'Đơn hàng đã giao',
            data: [125, 725, 365, 553, 385, 365],
            backgroundColor: [
                '#389c86'
            ],
            borderColor: [
                'rgba(255, 255, 255, 0.1)',
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
