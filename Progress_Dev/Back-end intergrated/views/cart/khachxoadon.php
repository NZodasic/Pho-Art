<?php
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $sql = "DELETE FROM `dathang` WHERE `makh` = '$id'";
        $sql2 = "DELETE FROM `chitiet_donhang` WHERE `makh` = '$id'";
        $sql3 = "DELETE FROM `khachhang` WHERE `makh` = '$id'";

        mysqli_query($conn, $sql);
        mysqli_query($conn, $sql2);
        mysqli_query($conn, $sql3);

        header("Location: index.php?page=yourorder");

    }

?>
