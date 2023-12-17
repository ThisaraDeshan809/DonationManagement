var ctx = document.getElementById('myChart').getContext('2d');

// Static data for products and percentages
var staticData = [
    { name: 'Product 1', percentage: 25 },
    { name: 'Product 2', percentage: 35 },
    { name: 'Product 3', percentage: 15 },
    { name: 'Product 4', percentage: 10 },
    { name: 'Product 5', percentage: 15 },
];

var chartData = {
    labels: staticData.map(product => product.name),
    datasets: [{
        data: staticData.map(product => product.percentage),
        backgroundColor: [
            'rgba(255, 99, 132, 0.7)',
            'rgba(54, 162, 235, 0.7)',
            'rgba(255, 206, 86, 0.7)',
            'rgba(75, 192, 192, 0.7)',
            'rgba(153, 102, 255, 0.7)',
        ],
    }],
};

var myChart = new Chart(ctx, {
    type: 'pie',
    data: chartData,
});
