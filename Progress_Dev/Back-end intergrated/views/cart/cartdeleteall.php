<?php
    unset($_SESSION['cart']);
    header('Location: index.php?page=cart');
?>