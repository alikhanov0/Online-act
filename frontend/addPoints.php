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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Online act</title>
</head>
<body>
    <p id="role" style="display:none;"><?php
    echo $_SESSION['role'];
    ?></p>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

     <a class="navbar-brand" href="#">Online act</a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="rating.php">Рейтинг<span class="sr-only"></span></a>
            </li>
            <?php
            
            if($_SESSION['role'] > 0){
                echo '<li class="nav-item active"> <a class="nav-link" href="act.php">Написать акт<span class="sr-only"></span></a></li>';
            }
            if($_SESSION['role'] > 1){
                echo '<li class="nav-item active"> <a class="nav-link" href="addPoints.php">Добавить баллы<span class="sr-only"></span></a></li>';    
            }

            ?>

        </ul>
    </div>

    <button class="btn navbar-btn ml-auto" id="exit" style="height:50px; width: 50px; margin-top: auto; padding:0; border:0; margin-right:15%">
            <img src="exit.png" style="width:50px; height: 50px;"alt="Button Image">
        </button>
</nav>

<p style="display:none;" id="user"><?php if (isset($_SESSION['user_id'])) {
        echo $_SESSION['user_id'];
    } else {
        echo 'Сессия user_id не установлена.';
    }
    ?></p>

<!-------- ADD POINTS -------->
<div class="container" id="first">
    <div>
        <center>
        <h1 style="padding-top:10%">Добавить баллы</h1>
        <div class="container">
            <h3>Введите количество баллов:</h3>
            <h5 style="color: rgba(0,0,0,0.5);">Вы можете добавить от 5 до <?php
            if($_SESSION['role'] == 2) echo "15";
            else if($_SESSION['role'] == 3) echo "100";
            ?> баллов</h5>

            <input type="text" id="input">
        </div>
        </center>
    </div>


    <center>
    <div id="btn">
        <button id="button1" class="btn btn-lg" type="button" style="margin-top: 5%; margin-bottom: 10%;" aria-expanded="false" data-toggle="modal" data-target="#ModalCenter">
            Далее
        </button>

        <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ошибка!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Ошибка введенных данных! Вы можете добавить от 5 до <?php
                            if($_SESSION['role'] == 2) echo "15";
                            else if($_SESSION['role'] == 3) echo "100";
                            ?> баллов
                    </div>
                                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </center>
</div>



<div class="container mx-auto" id="second" style="display:none;">
    <div class="row my-auto mx-auto">
        <div class="col mx-auto">
            <center>
            <p id="choose">Выберите класс ученика:</p>
            <select name="grade" id="grade" class="mx-auto" style="margin-top:10%;">
                <option value="" disabled selected>Выберите класс</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select name="liter" id="liter">
                <option value="" disabled selected>Выберите литер</option>
            </select>

            <div id="block" style="display:none;">
                <div>
                    <p id="choose">Выберите ученика</p>
                    <select name="" id="student">
                        <option value="" disabled selected>Выберите ученика</option>
                    </select>
                </div>

                <div id="btn">
                    <button id="addPoints" class="btn btn-info btn-lg" type="button" style="margin-top: 50px" aria-expanded="false" data-toggle="modal" data-target="#ModalCenter">
                        Добавить баллы
                    </button>

                    <div class="modal fade" id="ModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Добавление баллов</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    Баллы успешно начислены!
                                </div>
                                
                                <div class="modal-footer">
                                    <button id="closeModal" type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </center>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/addPoints.js"></script>
<script src="js/exit.js"></script>

</body>
</html>