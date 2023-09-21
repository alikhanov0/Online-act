$("#button1").on("click", function () {
    var input = Number($("#input").val());
    var a = Number($("#role").text());


    if(a==2){
        if(input >= 5 && input <= 15){
            next();
        }
        else{
            $('#input').val('');
            $('#ModalCenter').modal('show');
        }
    }
    if(a==3){
        if(input >= 5 && input <= 100){
            next();
        }
        else{
            $('#input').val('');
            $('#ModalCenter').modal('show');
        }
    }
})

function closeModal(){
    $('#ModalCenter').modal('hide');
}

function next(){

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


$("#addPoints").on("click", function () {
    const student_id = $("#student").val();
    const user_id = $("#user").text();
    
    $data = { student: student_id, user: user_id, points: Number($("#input").val())};
    $.ajax({
      type: "POST",
      url: "../backend/addPoint.php",
      data: $data,
      dataType: "json",
      success: function(response) {
        console.log(response);
        $('#ModalCenter2').modal('show'); // Показать модальное окно
      },
      error: function(xhr, status, error) {
        console.error("Ошибка запроса: " + error);
      }
    });
  })

$("#closeModal").on("click", function () {
    $('#ModalCenter2').modal('hide');
})