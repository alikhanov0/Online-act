document.addEventListener("DOMContentLoaded", function() {
    // Обработчик клика на элементы <a>
    document.querySelectorAll(".dropdown-item").forEach(function(item) {
        item.addEventListener("click", function(e) {
            e.preventDefault();
            
            // Получаем значение атрибута data-value
            var value = this.getAttribute("data-value");
            
            // Отправляем AJAX-запрос на сервер, передавая значение value
            // Ваш код для обработки клика на элементы <a>...

            $.ajax({
                type: 'POST',
                url: '../backend/acts.php',
                data: { value: value },
                dataType: 'json', // Укажите, что ожидается JSON-ответ
                success: function(response) {
                    // Обрабатываем ответ от сервера
                    console.log(response);

                    // Отображаем данные внутри <select>
                    var select = document.getElementById("act_types");

                    // Очистите существующие элементы, если они есть
                    select.innerHTML = "";

                    // Добавляем новые элементы на основе данных из базы
                    response.forEach(function(item) {
                        var option = document.createElement("option");
                        option.value = item.id; // Здесь указывайте поле с названием акта
                        option.text = item.name; // Здесь указывайте поле с названием акта
                        select.appendChild(option);
                    });

                    // div act-types
                    var d = document.getElementById("act-types");
                    // button
                    var b = document.getElementById("btn");

                    // Отображаем <select> после добавления элементов
                    d.style.display = "block";
                    b.style.display = "block";
                },
                error: function(xhr, status, error) {
                    console.error("Ошибка: " + error);
                }
            });

        });
    });
});


function chooseStudent() {
    var select = document.getElementById("act_types");

    var selectedOption = select.options[select.selectedIndex];

    var selectedValue = selectedOption.value;

    var first = document.getElementById("first");
    var second = document.getElementById("second");

    first.style.display = "none";
    second.style.display = "block";
}


// Получите ссылки на элементы <select>
const classSelect = $("#grade");
const letterSelect = $("#liter");

classSelect.on("change", function() {
  // Получите выбранный класс
  const selectedClass = classSelect.val();

  $("#liter").empty();
  $("#liter").append('<option value="" disabled selected>Выберите литер</option>');
  
  $("#student").empty();
  $("#student").append('<option value="" disabled selected>Выберите ученика</option>');

  // Отправьте AJAX-запрос
  $.ajax({
    type: "POST",
    url: "../backend/getLetters.php",
    data: { grade: selectedClass },
    dataType: "json",
    success: function(response) {
      console.log(response);

    // Получаем ссылку на элемент <select>
    var select = $("#liter");

    // Добавляем новые элементы на основе данных из базы
    $.each(response, function(index, item) {
        select.append($('<option>', {
            value: item.liter,
            text: item.liter 
        }));
    });
    },
    error: function(xhr, status, error) {
      console.error("Ошибка запроса: " + error);
    }
  });
});



letterSelect.on("change", function() {
  var block = document.getElementById("block");
  block.style.display = "block";

  const selectedClass = classSelect.val();
  const selectedLiter = letterSelect.val();

  $("#student").empty();
  $("#student").append('<option value="" disabled selected>Выберите ученика</option>');

  $.ajax({
    type: "POST",
    url: "../backend/getStudents.php",
    data: { grade: selectedClass, liter: selectedLiter},
    dataType: "json",
    success: function(response) {
      console.log(response);

    // Получаем ссылку на элемент <select>
    var select = $("#student");

    $.each(response, function(index, item) {
      select.append($('<option>', {
          value: item.student_id,
          text: item.last_name + " " + item.first_name
      }));
  });
  
    },
    error: function(xhr, status, error) {
      console.error("Ошибка запроса: " + error);
    }
  });
});





$("#button1").on("click", function () {

  const student_id = $("#student").val();
  const act_type = $("#act_types").val();
  const user_id = $("#user").text();
  $data = { student: student_id, act: act_type, user: user_id};
  $.ajax({
    type: "POST",
    url: "../backend/writeAct.php",
    data: { $data },
    dataType: "json",
    success: function(response) {
      console.log(response);
    },
    error: function(xhr, status, error) {
      console.error("Ошибка запроса: " + error);
    }
  });
});