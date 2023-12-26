<?php 
    function getProVip(){
        global $conn;
        $sql = "SELECT * FROM sanpham WHERE id_danhmuc = 5";
        $query = mysqli_query($conn, $sql);
        $result = array();

        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }

        return $result;
    }
    function getProMusic(){
        global $conn;
        $sql = "SELECT * FROM sanpham WHERE id_danhmuc = 1";
        $query = mysqli_query($conn, $sql);
        $result = array();

        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }

        return $result;
    }

    function getProCat(){
        global $conn;
        $sql = "SELECT * FROM sanpham WHERE id_danhmuc = 2";
        $query = mysqli_query($conn, $sql);
        $result1 = array();

        while ($row = mysqli_fetch_assoc($query)){
            $result1[] = $row;
        }

        return $result1;
    }

    function getConGiong(){
        global $conn;
        $sql = "SELECT * FROM sanpham WHERE id_danhmuc = 4";
        $query = mysqli_query($conn, $sql);
        $result2 = array();

        while ($row = mysqli_fetch_assoc($query)){
            $result2[] = $row;
        }

        return $result2;
    }

    function getProAll(){
        global $conn;
        $sql = "SELECT * FROM sanpham WHERE id_danhmuc = 1 OR id_danhmuc = 2 OR id_danhmuc = 3 OR id_danhmuc = 5 ORDER BY id_sanpham DESC LIMIT 10";
        $query = mysqli_query($conn, $sql);
        $result2 = array();

        while ($row = mysqli_fetch_assoc($query)){
            $result2[] = $row;
        }

        return $result2;
    }


    function getConGiongRand(){
        global $conn;
        $sql = "SELECT * FROM sanpham WHERE id_danhmuc = 4 ORDER BY RAND() LIMIT 5";
        $query = mysqli_query($conn, $sql);
        $result3 = array();

        while ($row = mysqli_fetch_assoc($query)){
            $result3[] = $row;
        }

        return $result3;
    }

    function getProRand(){
        global $conn;
        $sql = "SELECT * FROM sanpham WHERE id_danhmuc = 1 OR id_danhmuc = 2 OR id_danhmuc = 3 ORDER BY RAND() LIMIT 5";
        $query = mysqli_query($conn, $sql);
        $result3 = array();

        while ($row = mysqli_fetch_assoc($query)){
            $result3[] = $row;
        }

        return $result3;
    }

    function getPro_id($id){
        global $conn;
        $sql = "SELECT * FROM sanpham WHERE id_sanpham = $id";
        $query = mysqli_query($conn, $sql);
        $result3 = mysqli_fetch_assoc($query);

        return $result3;
    }

    function getID(){
        global $conn;
        $products = '';
        if(isset($_GET['id'])){
            $id = mysqli_real_escape_string($conn, $_GET['id']);
    
            $sql = "SELECT * FROM sanpham WHERE id_sanpham = $id";
    
            $products = mysqli_query($conn, $sql);
        }
        return $products;
    }

      function doanhThuNgay($ngay, $para, $nam){
        global $conn;
        $sql = "SELECT SUM(giatien) FROM `chitiet_donhang` WHERE DAY(ngaydat) = $ngay && MONTH(ngaydat) = $para && YEAR(ngaydat) = $nam AND `trangthai` LIKE N'giao thành công'";

        $query = mysqli_query($conn, $sql);

        $result3 = mysqli_fetch_assoc($query);

        return $result3;
        
    }

      function doanhThuNgayList($nam){
        global $conn;

        $sql = "SELECT * FROM `chitiet_donhang` INNER JOIN `sanpham` ON `chitiet_donhang`.`id_sanpham` = `sanpham`.`id_sanpham` WHERE YEAR(ngaydat) = $nam AND `trangthai` LIKE N'giao thành công';";

        $query = mysqli_query($conn, $sql);
        $result3 = array();

        while ($row = mysqli_fetch_assoc($query)){
            $result3[] = $row;
        }

        return $result3;
        
    }

      function doanhThuThang($para, $nam){
        global $conn;
        $sql = "SELECT SUM(giatien) FROM `chitiet_donhang` WHERE MONTH(ngaydat) = $para && YEAR(ngaydat) = $nam AND `trangthai` LIKE N'giao thành công'";

        $query = mysqli_query($conn, $sql);

        $result3 = mysqli_fetch_assoc($query);

        return $result3;
        
    }

    function doanhThuNam($para){
        global $conn;
        $sql = "SELECT SUM(giatien) FROM `chitiet_donhang` WHERE YEAR(ngaydat) = $para AND `trangthai` LIKE N'giao thành công'";

        $query = mysqli_query($conn, $sql);

        $result3 = mysqli_fetch_assoc($query);

        return $result3;
        
    }



?>  