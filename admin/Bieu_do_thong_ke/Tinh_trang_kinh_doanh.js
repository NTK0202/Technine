const ctx = document.getElementById('kinh_doanh');
const kinh_doanh = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Đã giao', 'Hủy'],
        datasets: [{
            data: [25, 3],
            backgroundColor: [
                '#03a9f4',
                '#d4392e'
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