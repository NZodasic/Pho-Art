<?php
    if(isset($_SESSION['fullname'])){
        unset($_SESSION['fullname']);

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        
        header('Location: index.php?page=home');
    } 
?>