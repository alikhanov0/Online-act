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
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="#">Online act</a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="">Рейтинг<span class="sr-only"></span></a>
                </li>
                <?php
                
                if($_SESSION['role'] > 0 && $_SESSION['role']!=4){
                    echo '<li class="nav-item active"> <a class="nav-link" href="act.php">Написать акт<span class="sr-only"></span></a></li>';
                }
                if($_SESSION['role'] > 1 && $_SESSION['role']!=4){
                    echo '<li class="nav-item active"> <a class="nav-link" href="addPoints.php">Добавить баллы<span class="sr-only"></span></a></li>';    
                }
                if($_SESSION['role']==4){
                    echo '<li class="nav-item active"> <a class="nav-link" href="adminPage/main.php">Панель админа<span class="sr-only"></span></a></li>';        
                }
                ?>

            </ul>
        </div>

        <button class="btn navbar-btn ml-auto" id="exit" style="height:50px; width: 50px; margin-top: auto; padding:0; border:0; margin-right:15%">
            <img src="exit.png" style="width:50px; height: 50px;"alt="Button Image">
        </button>
    </nav>

<!-------- RATING -------->
<div class="container">
    <canvas id="myChart" width="960" height="500">

    </canvas>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/rating.js"></script>
    <script src="js/exit.js"></script>
</body>
</html>