<!DOCTYPE html>
<html lang="en">
<head>
    
<?php
    
    session_start();
    if(!$_SESSION['loggedIn']){
        header("Location: form.php");
    }

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель админа</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
        
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="#">Online act</a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../rating.php">Рейтинг<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="">Панель админа<span class="sr-only"></span></a>
            </li>
        </ul>
    </div>
    <button class="btn navbar-btn ml-auto" id="exit" style="height:50px; width: 50px; margin-top: auto; padding:0; border:0; margin-right:15%">
            <img src="../exit.png" style="width:50px; height: 50px;"alt="Button Image">
        </button>
    </nav>

    <div class="container" id="main">
    <div class="row">
        <h1 class="text-center w-100" style="margin-top: 5%">Панель админа</h1>
    </div>
    <div class="row mt-3">
        <div class="col text-center">
            <button class="btn" id="addStudentBtn" style="height: 60px;">Добавить нового ученика</button>
        </div>
        <div class="col text-center">
            <button class="btn" id="addCuratorBtn" style="height: 60px;">Добавить нового куратора</button>
        </div>
        <div class="col text-center">
            <button class="btn" id="addModerBtn" style="height: 60px;">Добавить нового модератора</button>
        </div>
    </div>
    
    <div class="row mt-3">
        <div class="col text-center">
            <button class="btn" id="addTeacherBtn" style="height: 60px;">Добавить нового учителя</button>
        </div>
        <div class="col text-center">
            <button class="btn" id="addClassBtn" style="height: 60px;">Добавить новый класс</button>
        </div>
        <div class="col text-center">
            <button class="btn" id="addShanyrak" style="height: 60px;">Добавить шанырак</button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col text-center">
            <button class="btn" id="promoteBtn" style="height: 60px;">Повысить учителя</button>
        </div>
        <div class="col text-center">
            <button class="btn" id="demoteBtn" style="height: 60px;">Понизить модератора</button>
        </div>
        <div class="col text-center">
            <button class="btn" id="studentTransferBtn" style="height: 60px;">Перевести ученика</button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col text-center">
            <button class="btn" id="changeCuratorBtn" style="height: 60px;">Изменить куратора у шанырака</button>
        </div>
        <div class="col text-center">
            <button class="btn" id="changeUserNameBtn" style="height: 60px;">Изменить имя/фамилию</button>
        </div>
        <div class="col text-center">
            <button class="btn" id="changeShanyrakNameBtn" style="height: 60px;">Изменить название шанырака</button>
        </div>
    </div>
</div>

<!-------- ADD STUDENT ------->

<div class="container mx-auto" id="addStudent" style="display: none;">
    
    <div class="row">
        <h1 style="margin: auto; margin-top: 5%">Регистрация ученика</h1>
    </div>

    <div class="row my-auto mx-auto" id="reg1">
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите имя ученика</h3>
                <input type="text" name="" id="name">
            </center>
        </div>
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите фамилию ученика</h3>
                <input type="text" name="" id="surname">
            </center>
        </div>
    </div>

    <div class="row my-auto mx-auto" id="reg2" style="display:none;">
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите логин ученика</h3>
                <input type="text" name="" id="login">
            </center>
        </div>
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите пароль ученика</h3>
                <input type="password" name="" id="pass">
            </center>
        </div>
    </div>

    <div class="row my-auto mx-auto" id="reg3" style="display:none;">
        <div class="col mx-auto">
            <center>
            <p id="choose">Выберите класс ученика:</p>
            <select data-default="Выберите класс" name="grade" id="grade" class="mx-auto" style="margin-top:10%;">
                <option value="" disabled selected>Выберите класс</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select data-default="Выберите литер" name="liter" id="liter">
                <option value="" disabled selected>Выберите литер</option>
            </select>
        </div>
    </div>
    
    <center>
        <button id="btn" class="btn btn-lg" style="margin-bottom: 2%; margin-top: 0%">Далее</button>
    </center>
</div>


<!------ ADD CURATOR ------>


<div class="container mx-auto" id="addCurator" style="display: none;">

    <div class="row">
        <h1 style="margin: auto; margin-top: 5%">Регистрация куратора</h1>
    </div>

    <div class="row my-auto mx-auto" id="curatorReg1">
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите имя куратора</h3>
                <input type="text" name="" id="curatorName">
            </center>
        </div>
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите фамилию куратора</h3>
                <input type="text" name="" id="curatorSurname">
            </center>
        </div>
    </div>

    <div class="row my-auto mx-auto" id="curatorReg2" style="display:none;">
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите логин куратора</h3>
                <input type="text" name="" id="curatorLogin">
            </center>
        </div>
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите пароль куратора</h3>
                <input type="password" name="" id="curatorPass">
            </center>
        </div>
    </div>
    
    <center>
        <button id="curatorBtn" class="btn btn-lg" style="margin-bottom: 2%; margin-top: 0%">Далее</button>
    </center>
</div>




<!------ ADD TEACHER ------>


<div class="container mx-auto" id="addTeacher" style="display: none;">
    
    <div class="row">
        <h1 style="margin: auto; margin-top: 5%">Регистрация учителя</h1>
    </div>

    <div class="row my-auto mx-auto" id="teacherReg1">
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите имя учителя</h3>
                <input type="text" name="" id="teacherName">
            </center>
        </div>
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите фамилию учителя</h3>
                <input type="text" name="" id="teacherSurname">
            </center>
        </div>
    </div>

    <div class="row my-auto mx-auto" id="teacherReg2" style="display:none;">
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите логин учителя</h3>
                <input type="text" name="" id="teacherLogin">
            </center>
        </div>
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите пароль учителя</h3>
                <input type="password" name="" id="teacherPass">
            </center>
        </div>
    </div>
    
    <center>
        <button id="teacherBtn" class="btn btn-lg" style="margin-bottom: 2%; margin-top: 0%">Далее</button>
    </center>
</div>


<!------- ADD MODER --------->


<div class="container mx-auto" id="addModer" style="display: none;">
    
    <div class="row">
        <h1 style="margin: auto; margin-top: 5%">Регистрация модератора</h1>
    </div>

    <div class="row my-auto mx-auto" id="moderReg1">
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите имя модератора</h3>
                <input type="text" name="" id="moderName">
            </center>
        </div>
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите фамилию модератора</h3>
                <input type="text" name="" id="moderSurname">
            </center>
        </div>
    </div>

    <div class="row my-auto mx-auto" id="moderReg2" style="display:none;">
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите логин модератора</h3>
                <input type="text" name="" id="moderLogin">
            </center>
        </div>
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Введите пароль модератора</h3>
                <input type="password" name="" id="moderPass">
            </center>
        </div>
    </div>
    
    <center>
        <button id="moderBtn" class="btn btn-lg" style="margin-bottom: 2%; margin-top: 0%">Далее</button>
    </center>
</div>

<!------ ПЕРЕВОД УЧЕНИКА -------->

<div class="container mx-auto" id="studentTransfer" style="display: none;">
    
    <div class="row my-auto mx-auto">
        <h1 style="margin: auto; margin-top: 5%">Перевод ученика в другой класс</h1>
    </div>

    <div class="row my-auto mx-auto" id="transfer1">
        <div class="col mx-auto">
            <center>
            <p id="choose">Выберите класс ученика:</p>
            <select data-default="Выберите класс" name="transferGrade" id="transferGrade" class="mx-auto" style="margin-top:10%;">
                <option value="" disabled selected>Выберите класс</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select data-default="Выберите литер" name="transferLiter" id="transferLiter">
                <option value="" disabled selected>Выберите литер</option>
            </select>

            <div id="studentChoose" style="display: none;">
                <p id="choose">Выберите ученика</p>
                <select name="" id="student">
                    <option value="" disabled selected>Выберите ученика</option>
                </select>
            </div>
        </div>
    </div>


    <div class="row my-auto mx-auto" id="transfer2" style="display:none;">
        <div class="col mx-auto">
            <center>
            <p id="choose">Выберите класс в который хотите перевести ученика:</p>
            <select data-default="Выберите класс" name="transferGrade2" id="transferGrade2" class="mx-auto" style="margin-top:10%;">
                <option value="" disabled selected>Выберите класс</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select data-default="Выберите литер" name="transferLiter2" id="transferLiter2">
                <option value="" disabled selected>Выберите литер</option>
            </select>
        </div>
    </div>



    <center>
        <button id="transferBtn" class="btn btn-lg" style="margin-bottom: 2%; margin-top: 0%">Далее</button>
    </center>
</div>


<!------ PROMOTE TEACHER ------->


<div class="container mx-auto" id="promote" style="display: none;">
    
    <div class="row my-auto mx-auto">
        <h1 style="margin: auto; margin-top: 5%">Повысить учителя до модератора</h1>
    </div>

    <div class="row my-auto mx-auto" id="promote1">
        <div class="col mx-auto">
            <center>
            <p id="choose">Выберите учителя:</p>
            <select data-default="Выберите учителя" name="promoteTeacher" id="promoteTeacher" class="mx-auto" style="margin-top:10%;">
                <option value="" disabled selected>Выберите учителя</option>
            </select>
        </div>
    </div>

    <center>
        <button id="promoteNext" class="btn btn-lg" style="margin-bottom: 2%; margin-top: 0%">Далее</button>
    </center>
</div>


<!------ DEMOTE MODER ------->


<div class="container mx-auto" id="demote" style="display: none;">
    
    <div class="row my-auto mx-auto">
        <h1 style="margin: auto; margin-top: 5%">Понизить модератора до учителя</h1>
    </div>

    <div class="row my-auto mx-auto" id="promote1">
        <div class="col mx-auto">
            <center>
            <p id="choose">Выберите модератора:</p>
            <select data-default="Выберите модератора" name="demoteModer" id="demoteModer" class="mx-auto" style="margin-top:10%;">
                <option value="" disabled selected>Выберите модератора</option>
            </select>
        </div>
    </div>

    <center>
        <button id="demoteNext" class="btn btn-lg" style="margin-bottom: 2%; margin-top: 0%">Далее</button>
    </center>
</div>


<!------ ADD CLASS ------>


<div class="container mx-auto" id="addClass" style="display: none;">

    <div class="row">
        <h1 style="margin: auto; margin-top: 5%">Регистрация класса</h1>
    </div>

    <div class="row my-auto mx-auto" id="classReg1">
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Выберите номер класса</h3>
                <select name="classNumber" id="classNumber">
                    <option value="" disabled selected>Выберите номер</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </center>
        </div>
        <div class="col mx-auto">
            <center>
                <h3 id="choose">Выберите букву класса</h3>
                <select name="classLetter" id="classLetter">
                    <option value="" disabled selected>Выберите букву</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                </select>
            </center>
        </div>
    </div>

    <div class="row my-auto mx-auto" id="classReg2" style="display:none;">
        <div class="col mx-auto" id="shanirakDiv">
            <center>
                <h3 id="choose">Выберите шанырак</h3>
                <select name="shanirak" id="shanirak">
                    <option value="" disabled selected>Выберите шанырак</option>
                </select>
            </center>
        </div>
    </div>

    <center>
        <button id="classBtn" class="btn btn-info btn-lg" style="margin-bottom: 2%; margin-top: 0%">Далее</button>
    </center>
</div>


<!----- ADD SHANYRAK ---->

<div class="container mx-auto" id="addShanyrakBlock" style="display: none;">
    
    <div class="row my-auto mx-auto">
        <h1 style="margin: auto; margin-top: 5%">Добавить Шанырак</h1>
    </div>

    <div class="row my-auto mx-auto" id="shanyrak1">
        <div class="col mx-auto">
            <center>
            <p id="choose">Введите название Шанырака:</p>
            <input type="text" id="shanyrakName" name="shanyrakName" placeholder="Название Шанырака" class="mx-auto" style="margin-top:10%;">
            </center>
        </div>
        <div class="col mx-auto">
            <center>
            <p id="choose">Выберите куратора:</p>
            <select data-default="Выберите куратора" name="curatorId" id="curatorId" class="mx-auto" style="margin-top:10%;">
                <option value="" disabled selected>Выберите куратора</option>
            </select>
            </center>
        </div>
    </div>

    <center>
        <button id="addShanyrakBtn" class="btn btn-lg" style="margin-bottom: 2%; margin-top: 0%">Добавить</button>
    </center>
</div>


<!------ CHANGE CURATOR ----->

<div class="container mx-auto" id="changeShanyrakCurator" style="display: none;">
    <div class="row my-auto mx-auto">
        <h1 style="margin: auto; margin-top: 5%">Изменить куратора у шанырака</h1>
    </div>

    <div class="row my-auto mx-auto">
        <div class="col mx-auto">
            <center>
                <p id="choose">Выберите шанырак:</p>
                <select data-default="Выберите Шанырак" name="shanyrakSelect" id="shanyrakSelect" class="mx-auto" style="margin-top:10%;">
                    <option value="" disabled selected>Выберите шанырак</option>
                </select>
            </center>
        </div>
        <div class="col mx-auto" id="curatorSelectDiv" style="display:none;">
            <center>
                <p id="choose">Выберите куратора:</p>
                <select data-default="Выберите Куратора" name="curatorSelect" id="curatorSelect" class="mx-auto" style="margin-top:10%;">
                    <option value="" disabled selected>Выберите куратора</option>
                </select>
            </center>
        </div>
    </div>

    <center>
        <button id="changeShanyrakCuratorBtn" class="btn btn-lg" style="margin-bottom: 2%; margin-top: 0%">Изменить</button>
    </center>
</div>


<!----- CHANGE NAME ------>

<div class="container mx-auto" id="changeUserName" style="display: none;">
    <div class="row my-auto mx-auto">
        <h1 style="margin: auto; margin-top: 5%">Изменить имя/фамилию</h1>
    </div>

    
    <div class="row mt-3" id="changeNameDiv1">
        <div class="col text-center">
            <button class="btn" id="studentName" style="height: 60px;">Ученик</button>
        </div>
        <div class="col text-center">
            <button class="btn" id="personalName" style="height: 60px;">Персонал</button>
        </div>
    </div>


    <div class="row my-auto mx-auto" id="changeNameDiv2" style="display:none;">
        <div class="col mx-auto">
            <center>
            <p id="choose">Выберите класс ученика:</p>
            <select data-default="Выберите класс" name="changeName" id="changeName" class="mx-auto" style="margin-top:10%;">
                <option value="" disabled selected>Выберите класс</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select data-default="Выберите литер" name="changeNameLiter" id="changeNameLiter">
                <option value="" disabled selected>Выберите литер</option>
            </select>

            <div id="changeNameStudentChoose" style="display: none;">
                <p id="choose">Выберите ученика</p>
                <select name="" id="changeNameStudentSelect">
                    <option value="" disabled selected>Выберите ученика</option>
                </select>
            </div>
            </center>
        </div>
    </div>

    <div class="row my-auto mx-auto" id="changeNameDiv3" style="display:none;">
        <div class="col mx-auto">
            <center>
                <p id="choose">Выберите персонал:</p>
                <select data-default="Выберите персонал" name="personal" id="personal" class="mx-auto" style="margin-top:10%;">
                    <option value="" disabled selected>Выберите персонал</option>
                </select>
            </center>
        </div>
    </div>

    <div class="row my-auto mx-auto" id="changeNameDiv4" style="display:none;">
        <div class="col mx-auto">
            <center>        
                <div class="col-md-6">
                    <label for="firstName">Имя:</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Введите имя">
                </div>
                <div class="col-md-6">
                    <label for="lastName">Фамилия:</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Введите фамилию">
                </div>
            </center>
        </div>
    </div>


    <center>
        <button id="changeNameBtn" class="btn btn-lg" style="margin-bottom: 2%; margin-top: 0%; display:none;">Изменить</button>
    </center>
</div>


<!------ CHANGE SHANYRAK NAME ------->


<div class="container mx-auto" id="changeShanyrak" style="display: none;">
    <div class="row my-auto mx-auto">
        <h1 style="margin: auto; margin-top: 5%">Изменить название шанырака</h1>
    </div>

    <div class="row my-auto mx-auto">
        <div class="col mx-auto">
            <center>
                <p id="choose">Выберите шанырак:</p>
                <select data-default="Выберите Шанырак" name="shanyrakSelect1" id="shanyrakSelect1" class="mx-auto" style="margin-top:10%;">
                    <option value="" disabled selected>Выберите шанырак</option>
                </select>
            </center>
        </div>
    </div>

    <div class="row my-auto mx-auto" id="changeShanyrakDiv" style="display:none;">
        <div class="col mx-auto">
            <center>
                <div class="col-md-6">
                    <label for="shanyrakNameLabel">Название:</label>
                    <input type="text" class="form-control" id="shanyrakNameLabel" placeholder="Введите название">
                </div>
            </center>
        </div>
    </div>

    <center>
        <button id="changeShanyrakBtn" class="btn btn-lg" style="margin-bottom: 2%; margin-top: 0%">Изменить</button>
    </center>
</div>


<!------ MODALS ------->

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ошибка!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">Ошибка! Введите валидные данные!</div>
                                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Успех!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">Операция успешно выполнена!</div>
                                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModalSuccess">Закрыть</button>
                </div>
            </div>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/admin.js"></script>
<script src="js/exit.js"></script>

</body>
</html>