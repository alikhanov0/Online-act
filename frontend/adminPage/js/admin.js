$("#addStudentBtn").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("addStudent").style.display = "block";
})

$("#addCuratorBtn").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("addCurator").style.display = "block";
})

$("#addTeacherBtn").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("addTeacher").style.display = "block";
})

$("#addModerBtn").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("addModer").style.display = "block";
})

$("#addClassBtn").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("addClass").style.display = "block";
})

$("#addShanyrak").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("addShanyrakBlock").style.display = "block";

    $.ajax({
        type: "POST",
        url: "../../backend/getCurators.php",
        dataType: "json",
        success: function(response) {
            var select = $("#curatorId");

            select.empty();
            select.append($('<option>', {
                value: "",
                text: "Выберите куратора",
                disabled: true,
                selected: true
            }));
            
            $.each(response, function(index, item) {
                select.append($('<option>', {
                    value: item.id,
                    text: item.last_name + " " + item.first_name
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error("Ошибка запроса: " + error);
        }
    });    
})


$("#studentTransferBtn").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("studentTransfer").style.display = "block";
})

$("#promoteBtn").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("promote").style.display = "block";

    $.ajax({
        type: "POST",
        url: "../../backend/getTeachers.php",
        dataType: "json",
        success: function(response) {
            var select = $("#promoteTeacher");

            $.each(response, function(index, item) {
                select.append($('<option>', {
                    value: item.id,
                    text: item.last_name + " " + item.first_name
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error("Ошибка запроса: " + error);
        }
    });    
})

$("#demoteBtn").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("demote").style.display = "block";

    $.ajax({
        type: "POST",
        url: "../../backend/getModers.php",
        dataType: "json",
        success: function(response) {
            var select = $("#demoteModer");

            $.each(response, function(index, item) {
                select.append($('<option>', {
                    value: item.id,
                    text: item.last_name + " " + item.first_name
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error("Ошибка запроса: " + error);
        }
    });    
})

$("#changeCuratorBtn").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("changeShanyrakCurator").style.display = "block";

    $.ajax({
        type: "POST",
        url: "../../backend/getShanyraks.php",
        dataType: "json",
        success: function(response) {
            var select = $("#shanyrakSelect");
            select.empty();
            select.append($('<option>', {
                value: "",
                text: "Выберите Шанырак",
                disabled: true,
                selected: true
            }));
            
            $.each(response, function(index, item) {
                select.append($('<option>', {
                    value: item.id,
                    text: item.shanyrak_name
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error("Ошибка запроса: " + error);
        }
    });
});


$("#changeUserNameBtn").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("changeUserName").style.display = "block";
})

$("#changeShanyrakNameBtn").on("click", function() {
    document.getElementById("main").style.display = "none";
    document.getElementById("changeShanyrak").style.display = "block";

    $.ajax({
        type: "POST",
        url: "../../backend/getShanyraks.php",
        dataType: "json",
        success: function(response) {
            var select = $("#shanyrakSelect1");

            $.each(response, function(index, item) {
                select.append($('<option>', {
                    value: item.id,
                    text: item.shanyrak_name
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error("Ошибка запроса: " + error);
        }
    });
})


// Добавление ученика

$("#btn").on("click", function () {
    if (document.getElementById("reg1").style.display != "none") {
        if ($("#name").val() == "" || /\d/.test($("#name").val())) {
            $('#errorModal').modal('show');
        }
        else if ($("#surname").val() == "" || /\d/.test($("#surname").val())) {
            $('#errorModal').modal('show');
        }
        else {
            document.getElementById("reg1").style.display = "none";
            document.getElementById("reg2").style.display = "block";
        }
    }
    else if (document.getElementById("reg2").style.display != "none") {
        if ($("#login").val() == "") {
            $('#errorModal').modal('show');
        }
        else if ($("#pass").val() == "") {
            $('#errorModal').modal('show');
        }
        else {
            document.getElementById("reg2").style.display = "none";
            document.getElementById("reg3").style.display = "block";
        }
    }
    else if (document.getElementById("reg3").style.display != "none") {
        if ($("#grade").val() == null) {
            $('#errorModal').modal('show');
        }
        else if ($("#liter").val() == null) {
            $('#errorModal').modal('show');
        }
        else {
            var name = $("#name").val();
            var surname = $("#surname").val();
            var login = $("#login").val();
            var pass = $("#pass").val();
            var grade = $("#grade").val();
            var liter = $("#liter").val();
            $data = {name: name, surname: surname, login: login, pass: pass, grade: grade, liter: liter};

            $.ajax({
                type: "POST",
                url: "../../backend/addStudent.php",
                data: $data,
                dataType: "json",
                success: function(response) {
                    $('#successModal').modal('show');
                    document.getElementById("main").style.display = "block";
                    document.getElementById("addStudent").style.display = "none";
                    document.getElementById("reg3").style.display = "none";
                    document.getElementById("reg1").style.display = "block";

                    $("#name").val('');
                    $("#surname").val('');
                    $("#login").val('');
                    $("#pass").val('');
                    $("#grade").val('');
                    $("#liter").val('');

                        
                    $("#grade").empty();
                    $("#grade").append('<option value="" disabled selected>Выберите класс</option>');
                    $("#liter").empty();
                    $("#liter").append('<option value="" disabled selected>Выберите класс</option>');
                },
                error: function(xhr, status, error) {
                    console.error("Ошибка запроса: " + error);
                }
            });
        }
    }
})


// Добавление куратора


$("#curatorBtn").on("click", function () {
    if (document.getElementById("curatorReg1").style.display != "none") {
        if ($("#curatorName").val() == "" || /\d/.test($("#curatorName").val())) {
            $('#errorModal').modal('show');
        }
        else if ($("#curatorSurname").val() == "" || /\d/.test($("#curatorSurname").val())) {
            $('#errorModal').modal('show');
        }
        else {
            document.getElementById("curatorReg1").style.display = "none";
            document.getElementById("curatorReg2").style.display = "block";
        }
    }
    else if (document.getElementById("curatorReg2").style.display != "none") {
        if ($("#curatorLogin").val() == "") {
            $('#errorModal').modal('show');
        }
        else if ($("#curatorPass").val() == "") {
            $('#errorModal').modal('show');
        }
        else {
            var name = $("#curatorName").val();
            var surname = $("#curatorSurname").val();
            var login = $("#curatorLogin").val();
            var pass = $("#curatorPass").val();
            $data = {name: name, surname: surname, login: login, pass: pass};

            $.ajax({
                type: "POST",
                url: "../../backend/addCurator.php",
                data: $data,
                dataType: "json",
                success: function(response) {
                    $('#successModal').modal('show');
                    document.getElementById("main").style.display = "block";
                    document.getElementById("addCurator").style.display = "none";
                    document.getElementById("curatorReg2").style.display = "none";
                    document.getElementById("curatorReg1").style.display = "block";
                    
                    $("#curatorName").val('');
                    $("#curatorSurname").val('');
                    $("#curatorLogin").val('');
                    $("#curatorPass").val('');
                },
                error: function(xhr, status, error) {
                    console.error("Ошибка запроса: " + error);
                }
            });
        }
    }
})





// Добавление учителя
$("#teacherBtn").on("click", function () {
    if (document.getElementById("teacherReg1").style.display != "none") {
        if ($("#teacherName").val() == "" || /\d/.test($("#teacherName").val())) {
            $('#errorModal').modal('show');
        }
        else if ($("#teacherSurname").val() == "" || /\d/.test($("#teacherSurname").val())) {
            $('#errorModal').modal('show');
        }
        else {
            document.getElementById("teacherReg1").style.display = "none";
            document.getElementById("teacherReg2").style.display = "block";
        }
    }
    else if (document.getElementById("teacherReg2").style.display != "none") {
        if ($("#teacherLogin").val() == "") {
            $('#errorModal').modal('show');
        }
        else if ($("#teacherPass").val() == "") {
            $('#errorModal').modal('show');
        }
        else {
            var name = $("#teacherName").val();
            var surname = $("#teacherSurname").val();
            var login = $("#teacherLogin").val();
            var pass = $("#teacherPass").val();
            $data = {name: name, surname: surname, login: login, pass: pass};

            $.ajax({
                type: "POST",
                url: "../../backend/addTeacher.php",
                data: $data,
                dataType: "json",
                success: function(response) {
                    $('#successModal').modal('show');
                    document.getElementById("main").style.display = "block";
                    document.getElementById("addTeacher").style.display = "none";
                    document.getElementById("teacherReg2").style.display = "none";
                    document.getElementById("teacherReg1").style.display = "block";
                    
                    $("#teacherName").val('');
                    $("#teacherSurname").val('');
                    $("#teacherLogin").val('');
                    $("#teacherPass").val('');
                },
                error: function(xhr, status, error) {
                    console.error("Ошибка запроса: " + error);
                }
            });
        }
    }
})








// Добавление модератора

$("#moderBtn").on("click", function () {
    if (document.getElementById("#moderReg1").style.display != "none") {
        if ($("#moderName").val() == "" || /\d/.test($("#moderName").val())) {
            $('#errorModal').modal('show');
        }
        else if ($("#moderSurname").val() == "" || /\d/.test($("#moderSurname").val())) {
            $('#errorModal').modal('show');
        }
        else {
            document.getElementById("moderReg1").style.display = "none";
            document.getElementById("moderReg2").style.display = "block";
        }
    }
    else if (document.getElementById("moderReg2").style.display != "none") {
        if ($("#moderLogin").val() == "") {
            $('#errorModal').modal('show');
        }
        else if ($("#moderPass").val() == "") {
            $('#errorModal').modal('show');
        }
        else {
            var name = $("#moderName").val();
            var surname = $("#moderSurname").val();
            var login = $("#moderLogin").val();
            var pass = $("#moderPass").val();
            $data = {name: name, surname: surname, login: login, pass: pass};

            $.ajax({
                type: "POST",
                url: "../../backend/addModer.php",
                data: $data,
                dataType: "json",
                success: function(response) {
                    $('#successModal').modal('show');
                    document.getElementById("main").style.display = "block";
                    document.getElementById("addModer").style.display = "none";
                    document.getElementById("moderReg2").style.display = "none";
                    document.getElementById("moderReg1").style.display = "block";

                    $("#moderName").val("");
                    $("#moderSurname").val("");
                    $("#moderLogin").val("");
                    $("#moderPass").val("");
                },
                error: function(xhr, status, error) {
                    console.error("Ошибка запроса: " + error);
                }
            });
        }
    }
})


// Добавление класса

$("#classNumber, #classLetter").on("change", function() {
    if ($("#classNumber").val() != null && $("#classLetter").val() != null) {
        $("#classReg2").show();

        $.ajax({
            type: "POST",
            url: "../../backend/getShanyraks.php",
            dataType: "json",
            success: function(response) {
                var select = $("#shanirak");
    
                $.each(response, function(index, item) {
                    select.append($('<option>', {
                        value: item.id,
                        text: item.shanyrak_name
                    }));
                });
            },
            error: function(xhr, status, error) {
                console.error("Ошибка запроса: " + error);
            }
        });

    } else {
        $("#classReg2").hide();
    }
});


$("#classBtn").on("click", function () {
    if (document.getElementById("classReg1").style.display != "none") {
        if ($("#classNumber").val() == "" || $("#classLetter").val() == "" || $("#shanirak").val() == "") {
            $('#errorModal').modal('show'); 
        }
        else {
            var classNumber = $("#classNumber").val();
            var classLetter = $("#classLetter").val(); 
            var shanyrak = $("#shanirak").val(); 
            var data = {classNumber: classNumber, classLetter: classLetter, shanyrak_id: shanyrak}; 


            $.ajax({
                type: "POST",
                url: "../../backend/addClass.php",
                data: data,
                dataType: "json",
                success: function(response) {
                    $('#successModal').modal('show');
                    document.getElementById("main").style.display = "block"; 
                    document.getElementById("addClass").style.display = "none";
                    
                    $("#classNumber").val('');
                    $("#classLetter").val('');
                },
                error: function(xhr, status, error) {
                    console.error("Ошибка запроса: " + error); 
                }
            });
        }
    }
});


// Добавление шанырака

$("#addShanyrakBtn").on("click", function () {
    if ($("#shanyrakName").val() == "" || $("#curatorId").val() == null) {
        $('#errorModal').modal('show');
    }
    else {
        var shanyrakName = $("#shanyrakName").val(); 
        var curatorId = $("#curatorId").val(); 
        var data = {shanyrakName: shanyrakName, curatorId: curatorId}; 

        $.ajax({
            type: "POST",
            url: "../../backend/addShanyrak.php",
            data: data,
            dataType: "json",
            success: function(response) {
                $('#successModal').modal('show');
                document.getElementById("main").style.display = "block"; 
                document.getElementById("addShanyrakBlock").style.display = "none";
                
                $("#shanyrakName").val('');
                $("#curatorId").val('');
                
                $("#curatorId").empty();
                $("#curatorId").append('<option value="" disabled selected>Выберите куратора</option>');
            },
            error: function(xhr, status, error) {
                console.error("Ошибка запроса: " + error); 
            }
        });
    }
});


// Перевод ученика в другой класс



$("#transferGrade").on("change", function() {

  $("#transferLiter").empty();
  $("#transferLiter").append('<option value="" disabled selected>Выберите литер</option>');
  
  $("#student").empty();
  $("#student").append('<option value="" disabled selected>Выберите ученика</option>');

  // Отправьте AJAX-запрос
  $.ajax({
    type: "POST",
    url: "../../backend/getLetters.php",
    data: { grade: $("#transferGrade").val() },
    dataType: "json",
    success: function(response) {
        console.log(response);
        var select = $("#transferLiter");

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



$("#transferLiter").on("change", function() {
    document.getElementById("studentChoose").style.display = "block";

  const selectedClass = $("#transferGrade").val();
  const selectedLiter = $("#transferLiter").val();

  $("#student").empty();
  $("#student").append('<option value="" disabled selected>Выберите ученика</option>');

  $.ajax({
    type: "POST",
    url: "../../backend/getStudents.php",
    data: { grade: selectedClass, liter: selectedLiter},
    dataType: "json",
    success: function(response) {
      console.log(response);

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


$("#transferBtn").on("click", function() {
    if(document.getElementById("transfer1").style.display != "none"){
        if ($("#transferGrade").val() == null) {
            $('#errorModal').modal('show');
        }
        else if ($("#transferLiter").val() == null) {
            $('#errorModal').modal('show');
        }
        else if ($("#student").val() == null){
            $('#errorModal').modal('show');
        }
        else{
            document.getElementById("transfer1").style.display = "none";
            document.getElementById("transfer2").style.display = "block";
        }
    }
    else{
        if ($("#transferGrade2").val() == null) {
            $('#errorModal').modal('show');
        }
        else if ($("#transferLiter2").val() == null) {
            $('#errorModal').modal('show');
        }
        else{

            $data = {student_id: $("#student").val(), grade: $("#transferGrade2").val(), liter: $("#transferLiter2").val()};

            $.ajax({
                type: "POST",
                url: "../../backend/transfer.php",
                data: $data,
                dataType: "json",
                success: function(response) {
                    console.log(response);

                    $('#successModal').modal('show');
                    document.getElementById("main").style.display = "block";
                    document.getElementById("studentTransfer").style.display = "none";
                    document.getElementById("transfer2").style.display = "none";
                    document.getElementById("transfer1").style.display = "block";


                    $("#transferGrade").val("").change();
                    $("#transferLiter").empty().append('<option value="" disabled selected>Выберите литер</option>');
                    $("#student").empty().append('<option value="" disabled selected>Выберите ученика</option>');
                    $("#transferGrade2").val("").change();
                    $("#transferLiter2").empty().append('<option value="" disabled selected>Выберите литер</option>');
                    document.getElementById("studentChoose").style.display = "none";
                },
                error: function(xhr, status, error) {
                  console.error("Ошибка запроса: " + error);
                }
            });
        }
    }
})


$("#transferGrade2").on("change", function() {

    $("#transferLiter2").empty();
    $("#transferLiter2").append('<option value="" disabled selected>Выберите литер</option>');

    // Отправьте AJAX-запрос
    $.ajax({
      type: "POST",
      url: "../../backend/getLetters.php",
      data: { grade: $("#transferGrade2").val() },
      dataType: "json",
      success: function(response) {
          console.log(response);
          var select = $("#transferLiter2");
  
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



// Повышение учителя до модератора


$("#promoteNext").on("click", function () {
    if ($("#promoteTeacher").val() == null){
        $('#errorModal').modal('show');
    }
    else{

        $data = {id: $("#promoteTeacher").val()};

        $.ajax({
            type: "POST",
            url: "../../backend/promoteTeacher.php",
            data: $data,
            dataType: "json",
            success: function(response) {
                $('#successModal').modal('show');
                document.getElementById("main").style.display = "block";
                document.getElementById("promote").style.display = "none";
                $("#promoteTeacher").empty();
                $("#promoteTeacher").append('<option value="" disabled selected>Выберите учителя</option>');
            },
            error: function(xhr, status, error) {
              console.error("Ошибка запроса: " + error);
            }
        });
    }
})


// Пониежние модератора до учителя


$("#demoteNext").on("click", function () {
    if ($("#demoteModer").val() == null){
        $('#errorModal').modal('show');
    }
    else{

        $data = {id: $("#demoteModer").val()};

        $.ajax({
            type: "POST",
            url: "../../backend/demoteModer.php",
            data: $data,
            dataType: "json",
            success: function(response) {
                $('#successModal').modal('show');
                document.getElementById("main").style.display = "block";
                document.getElementById("demote").style.display = "none";
                $("#demoteModer").empty();
                $("#demoteModer").append('<option value="" disabled selected>Выберите модератора</option>');
            },
            error: function(xhr, status, error) {
              console.error("Ошибка запроса: " + error);
            }
        });
    }
})


// Изменение куратора

$("#shanyrakSelect").on("change", function() {
    var shanyrakId = $(this).val();

    if(shanyrakId) {
        $.ajax({
            type: "POST",
            url: "../../backend/getCurators.php",
            dataType: "json",
            success: function(response) {
                var select = $("#curatorSelect");
                select.empty();
                select.append($('<option>', {
                    value: "",
                    text: "Выберите Куратора",
                    disabled: true,
                    selected: true
                }));
                
                $.each(response, function(index, item) {
                    select.append($('<option>', {
                        value: item.id,
                        text: item.last_name + " " + item.first_name
                    }));
                });
                
                $("#curatorSelectDiv").show();
            },
            error: function(xhr, status, error) {
                console.error("Ошибка запроса: " + error);
            }
        });
    } else {
        $("#curatorSelectDiv").hide();
    }
});

$("#changeShanyrakCuratorBtn").on("click", function() {
    var shanyrakId = $("#shanyrakSelect").val();
    var curatorId = $("#curatorSelect").val();

    if(shanyrakId && curatorId) {
        $.ajax({
            type: "POST",
            url: "../../backend/changeShanyrakCurator.php",
            data: {
                shanyrak_id: shanyrakId,
                curator_id: curatorId
            },
            dataType: "json",
            success: function(response) {
                $('#successModal').modal('show');
                document.getElementById("main").style.display = "block";
                document.getElementById("changeShanyrakCurator").style.display = "none";

                $("#shanyrakSelect").val('').find('option:not(:first)').remove();
                $("#curatorSelect").val('').find('option:not(:first)').remove();

                $('#curatorSelectionDiv').hide();
            },
            error: function(xhr, status, error) {
                console.error("Ошибка запроса: " + error);
            }
        });
    } else {
        $('#errorModal').modal('show');
    }
});


// Изменение имени/фамилии

$("#studentName").on("click", function() {
    $("#changeNameDiv1").hide();
    $("#changeNameDiv2").show();
    $("#changeNameBtn").show();
});

$("#personalName").on("click", function() {
    $("#changeNameDiv1").hide();
    $("#changeNameDiv3").show();
    $("#changeNameBtn").show();

    $.ajax({
        type: "POST",
        url: "../../backend/getPersonal.php",
        dataType: "json",
        success: function(response) {
            console.log(response);
            var select = $("#personal");
            $.each(response, function(index, item) {
                select.append($('<option>', {
                    value: item.id,
                    text: item.last_name + " " + item.first_name
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error("Ошибка запроса: " + error);
        }
    });
});


$("#changeName").on("change", function() {
    $("#changeNameLiter").empty();
    $("#changeNameLiter").append('<option value="" disabled selected>Выберите литер</option>');

    $("#changeNameStudentSelect").empty();
    $("#changeNameStudentSelect").append('<option value="" disabled selected>Выберите ученика</option>');

    $.ajax({
        type: "POST",
        url: "../../backend/getLetters.php",
        data: { grade: $("#changeName").val() },
        dataType: "json",
        success: function(response) {
            console.log(response);
            var select = $("#changeNameLiter");
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

$("#changeNameLiter").on("change", function() {
    $("#changeNameStudentChoose").show();

    const selectedClass = $("#changeName").val();
    const selectedLiter = $("#changeNameLiter").val();

    $("#changeNameStudentSelect").empty();
    $("#changeNameStudentSelect").append('<option value="" disabled selected>Выберите ученика</option>');

    $.ajax({
        type: "POST",
        url: "../../backend/getStudents.php",
        data: { grade: selectedClass, liter: selectedLiter },
        dataType: "json",
        success: function(response) {
            console.log(response);
            var select = $("#changeNameStudentSelect");
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


$user_id = 0;

$("#changeNameBtn").on("click", function() {
    let isDiv2Visible = $("#changeNameDiv2").is(":visible");
    let isDiv3Visible = $("#changeNameDiv3").is(":visible");
    let isDiv4Visible = $("#changeNameDiv4").is(":visible");

    if (isDiv2Visible) {
        if ($("#changeName").val() == null || $("#changeNameLiter").val() == null || $("#changeNameStudentSelect").val() == null) {
            $('#errorModal').modal('show');
        } else {
            $("#changeNameDiv2").hide();
            $("#changeNameDiv4").show();
            $student_id = $("#changeNameStudentSelect").val();
            
            $.ajax({
                type: "POST",
                url: "../../backend/getUserID.php",
                data: { student_id: $student_id },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $user_id = response;

                        
                    $("#changeName").empty();
                    $("#changeName").append('<option value="" disabled selected>Выберите класс</option>');    
                    $("#changeNameLiter").empty();
                    $("#changeNameLiter").append('<option value="" disabled selected>Выберите литер</option>');    
                    $("#changeNameStudentSelect").empty();
                    $("#changeNameStudentSelect").append('<option value="" disabled selected>Выберите студента</option>');
                },
                error: function(xhr, status, error) {
                console.error("Ошибка запроса: " + error);
                }
            });
        }

    } else if (isDiv3Visible) {
        if ($("#personal").val() == null) {
            $('#errorModal').modal('show');
        } else {
            $user_id = $("#personal").val();
            $("#changeNameDiv3").hide();
            $("#changeNameDiv4").show();

            
            $("#personal").empty();
            $("#personal").append('<option value="" disabled selected>Выберите персонал</option>'); 
        }

    } else if(isDiv4Visible){
        if ($("#firstName").val() == "" || $("#lastName").val() == "") {
            $('#errorModal').modal('show');
        } else {
            $data = { user_id: $user_id[0].user_id, firstName: $("#firstName").val(), lastName: $("#lastName").val()}; 

            console.log($data);

            $.ajax({
                type: "POST",
                url: "../../backend/changeName.php",
                data: $data,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                  console.error("Ошибка запроса: " + error);
                }
            });
        }
    }
});


// Изменить имя шанырака


$("#shanyrakSelect1").on("change", function () {
    $("#changeShanyrakDiv").show();
})

$("#changeShanyrakBtn").on("click", function () {
    if($("#shanyrakNameLabel").val() == ""){
        $('#errorModal').modal('show');
    }
    else {
        $data = { id: $("#shanyrakSelect1").val(), shanyrakName: $("#shanyrakNameLabel").val() };

        $.ajax({
            type: "POST",
            url: "../../backend/changeShanyrakName.php",
            data: $data,
            dataType: "json",
            success: function(response) {
                $('#successModal').modal('show');
                document.getElementById("main").style.display = "block";
                document.getElementById("changeShanyrak").style.display = "none";
                document.getElementById("changeShanyrakDiv").style.display = "none";

                $("#shanyrakSelect1").val('');
                $("#shanyrakNameLabel").val('');

                $("#shanyrakSelect1").empty();
                $("#shanyrakSelect1").append('<option value="" disabled selected>Выберите шанырак</option>');
            },
            error: function(xhr, status, error) {
              console.error("Ошибка запроса: " + error);
            }
        });
    }
})




// Работа с модальными окнами

$("#closeModal").on("click", function () {
    $('#errorModal').modal('hide');
})

$("#closeModalSuccess").on("click", function () {
    $('#successModal').modal('hide');
})

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
        url: "../../backend/getLetters.php",
        data: { grade: selectedClass },
        dataType: "json",
        success: function(response) {
            console.log(response);

            // Получаем ссылку на элемент <select>
            var select = $("#liter");

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