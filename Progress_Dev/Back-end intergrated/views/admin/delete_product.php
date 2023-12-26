<?php
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $sql = "DELETE FROM `sanpham` WHERE `id_sanpham` = '$id'";

        if(mysqli_query($conn, $sql)){
            header("Location: index.php?page=admin");
        }
        else{
            echo "Xóa thất bại";
        }
    }

?>
