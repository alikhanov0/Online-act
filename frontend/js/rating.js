function fetchData() {
    $.ajax({
        type: 'GET',
        url: '../backend/getRating.php', // Замените на путь к вашему PHP-скрипту
        dataType: 'json',
        success: function(data) {
            console.log(data);
            // Создание графика после успешного получения данных
            createChart(data);
        },
        error: function(xhr, status, error) {
            console.error("Ошибка: " + error);
        }
    });
}

function createChart(data) {
    var ctx = document.getElementById('myChart').getContext('2d');
    var labels = []; 
    var values = [];

    data.forEach(function(item) {
        labels.push(item.shanyrak_name); 
        values.push(item.rating); 
    });

    var myChart = new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: labels,
            datasets: [{
                label: 'Рейтинг',
                data: values,
                backgroundColor: 'rgba(226,226,226, 1)', 
                borderColor: 'rgba(0, 0, 0, 1)', 
                borderWidth: 2
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
}

// Вызов функции для получения данных и создания графика
fetchData();