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
    var labels = []; // Массив меток для оси X
    var values = []; // Массив значений для оси Y

    // Преобразование данных из формата, который вы получили с сервера
    data.forEach(function(item) {
        labels.push(item.shanyrak_name); // Замените на поле, содержащее метку
        values.push(item.rating); // Замените на поле, содержащее значение
    });

    var myChart = new Chart(ctx, {
        type: 'bar', // Тип графика (гистограмма, можно выбрать другой)
        data: {
            labels: labels,
            datasets: [{
                label: 'Рейтинг',
                data: values,
                backgroundColor: 'rgba(163, 59, 161, 0.8)', // Цвет столбцов
                borderColor: 'rgba(75, 192, 192, 1)', // Цвет границ столбцов
                borderWidth: 5
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