<?php
    if(isset($_GET['id'])){
        unset($_SESSION['cart'][$_GET['id']]);
        header('Location: index.php?page=cart');
    } 
?>