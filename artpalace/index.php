<?php
session_start();
ob_start();
//khai bao file connect db
include "./function/config.php";

//khai bao file chua cac ham
include "./function/myfunction.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phố Art</title>
    <!-- <link rel="shortcut icon" type="image/png" href="./img/logo.jpg"/> -->
    <link rel="stylesheet" href="./css/bsgrid.min.css" />
    <link rel="stylesheet" href="./css/style.min.css" />
    <link rel="stylesheet" href="./css/glider.min.css">
    <link rel="stylesheet" href="./css/glider.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"

    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Orbitron:400,500,600,700,800,900&display=swap"

    rel="stylesheet">

</head>
<body>




    <!-- product -->
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        include "./views/slider.php";
        $page = 'home';
    }
    
    if (file_exists('views/' . $page . '.php')) {
        include 'views/' . $page . '.php';
    }

    // Admin check and response error
    else if (file_exists('views/admin/' . $page . '.php')) {
        if (isset($_SESSION['admin']) || isset($_SESSION['staff'])) {
            include 'views/admin/' . $page . '.php';
        } else {
            function Redirect($url, $permanent = false)
            {
                header('Location: ' . $url, true, $permanent ? 301 : 302);
                exit();
            }
            Redirect('views/404/404notfound.html', false);
        }
    }

    
    // Cart
    else if (file_exists('views/cart/' . $page . '.php')) {
        include 'views/cart/' . $page . '.php';
    }


    // Login
    else if (file_exists('views/login/' . $page . '.php')) {
        include 'views/login/' . $page . '.php';
    } else {
        function Redirect($url, $permanent = false)
            {
                header('Location: ' . $url, true, $permanent ? 301 : 302);
                exit();
            }
            Redirect('views/404/404notfound.html', false);
    }



    //Go to top 
    ?> 
            <div class="go-to-top"><i class="fas fa-chevron-up"></i></div>
    <!-- end product -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        //Slider using Slick
        $( document).ready(function() {
            $('.post-wrapper').slick({
                slidesToScroll: 1,
                autoplay: true,
                arrow: true,
                dots: true,
                autoplaySpeed: 5000,
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
                appendDots:$(".dot"),
            });
        });
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./script/glider.js"></script>
    <script src="./script/glider.min.js"></script>
    <script src="scripts.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script src="./script/script.js"></script>
</body>
</html>