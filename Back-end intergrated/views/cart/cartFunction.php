<?php 

    // session_destroy();
    // die();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    // session_destroy();
    // die();

    //$quantity = (isset($_POST['quantity'])) ? $_POST['quantity'] : 1;

    $quantity = 1;

    if(isset($_POST['quantity'])){
        if($_POST['quantity'] < 1 || $_POST['quantity'] > 9999){
            echo "<script type='text/javascript'>alert('nhập số lượng không đúng');</script>";
            
        }
        else{
            $quantity = $_POST['quantity'];
        }
    }

 
    
    $product = '';
    $query = getID();
    if($query){
        $product = mysqli_fetch_assoc($query);
    }


    if(isset($_POST['buy-now'])){
        if(isset( $_SESSION['cart'][$id])){ //co san pham thi cong don so luong
            $_SESSION['cart'][$id]['quantity'] += $quantity;
            header('Location: index.php?page=cart');
        }
        else{ //chua co thi tao moi san pham
            $_SESSION['cart'][$id] = [
                'id' => $product['id_sanpham'],
                'name' => $product['tensp'],
                'img' => $product['anhsp'],
                'price' => ($product['giasp'] * ((100 - $product['discount']) / 100)),
                'quantity' => $quantity
            ];
            header('Location: index.php?page=cart');
        }

    }   

    if(isset($_POST['add-to-cart'])){

        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantity'] += $quantity;
            header('Location: index.php?page=details&id='.$_GET['id'].'');
        }
        else{
            $_SESSION['cart'][$id] = [
                'id' => $product['id_sanpham'],
                'name' => $product['tensp'],
                'img' => $product['anhsp'],
                'price' => ($product['giasp'] * ((100 - $product['discount']) / 100)),
                'quantity' => $quantity
            ];
            header('Location: index.php?page=details&id='.$_GET['id'].'');
        }
    }
    

    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    
    //tong tien
    function total_price($cart){
        $total_price = 0;
        foreach($cart as $key => $value){
            $total_price += $value['quantity'] * $value['price'];
        }
        return $total_price;
    }

    $rand = rand(10,1000);

    $madh = 'MDH' . $rand;
    $makh = 'MAKH' . $rand;
    $_SESSION['makh'] = $makh;
    $_SESSION['madh'] = $madh;
    

    if(isset($_POST['order'])){
        if(isset($_SESSION['fullname'])){
            $tenkh = $_POST['hoten'];
            $tongtien = total_price($cart);
    
            $diachi = $_POST['sonha'].' '.$_POST['xa'].' '.$_POST['tinh'];
            $sdt = $_POST['sdt'];
            $email = $_SESSION['email'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s');
            
            $sql = "INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `email`, `sdt`) VALUES ('$makh', '$tenkh', '$diachi', '$email', '$sdt')";
            //var_dump($sql);
            $query = mysqli_query($conn, $sql);
    
            $sql2 = "INSERT INTO dathang (madathang, makh, trangthai, tongtien, ngaydathang, giaohang, id_kh) VALUES ('$madh', '$makh', 'đang xử lý', '$tongtien', '$date', 'COD', '0') ";
            $query2 = mysqli_query($conn, $sql2);
    
            //yourorder
            //$madathang = $_SESSION['madathang'];
            $id_sanpham = '';
            $tensp = '';
            $soluong = '';
            $giatien = '';

            foreach($cart as $keyID => $valueID){
                $_SESSION['id_sanpham'] = $valueID['id'];
                $id_sanpham = $_SESSION['id_sanpham'];

                $_SESSION['tensp'] = $valueID['name'];
                $tensp = $_SESSION['tensp'];

                $_SESSION['soluong'] = $valueID['quantity'];
                $soluong = $_SESSION['soluong'];

                $_SESSION['giatien'] = $valueID['price'] * $valueID['quantity'];
                $giatien = $_SESSION['giatien'];

                $sql_chitiet_donhang = "INSERT INTO chitiet_donhang (madathang, makh, id_sanpham, tensp, soluong, giatien, tongtien, trangthai, ngaydat, id_dathang, id_kh) 
                VALUES ('$madh', '$makh', '$id_sanpham', '$tensp', '$soluong', '$giatien', '$tongtien', 'đang xử lý', '$date', '0', '0') ";

                $query_chitiet_donhang = mysqli_query($conn, $sql_chitiet_donhang);

                
                unset($_SESSION['cart']);
            }
    
            header("Location: index.php?page=yourorder-details&id=$makh");
        }
        
        else{
            echo "<script>alert('Bạn cần đăng nhập để sử dụng chức năng này');</script>";
        }
    }


    ///chua xu ly luu dc hang vao db voi thanh toan online
    if(isset($_POST['ordervnpay'])){
        
            $tenkh = $_POST['hoten'];
            $_SESSION['hoten'] = $tenkh;
            $tongtien = total_price($cart);
    
            $diachi = $_POST['sonha'].' '.$_POST['xa'].' '.$_POST['tinh'];
            $sdt = $_POST['sdt'];
            $email = $_SESSION['email'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s');
            
            $sql = "INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `email`, `sdt`) VALUES ('$makh', '$tenkh', '$diachi', '$email', '$sdt')";
            //var_dump($sql);
            $query = mysqli_query($conn, $sql);
    
            $sql2 = "INSERT INTO dathang (madathang, makh, trangthai, tongtien, ngaydathang, id_kh) VALUES ('$madh', '$makh', 'đang xử lý', '$tongtien', '$date', '0') ";
            $query2 = mysqli_query($conn, $sql2);
    
            //yourorder
            //$madathang = $_SESSION['madathang'];
            $id_sanpham = '';
            $tensp = '';
            $soluong = '';
            $giatien = '';

            foreach($cart as $keyID => $valueID){
                $_SESSION['id_sanpham'] = $valueID['id'];
                $id_sanpham = $_SESSION['id_sanpham'];

                $_SESSION['tensp'] = $valueID['name'];
                $tensp = $_SESSION['tensp'];

                $_SESSION['soluong'] = $valueID['quantity'];
                $soluong = $_SESSION['soluong'];

                $_SESSION['giatien'] = $valueID['price'] * $valueID['quantity'];
                $giatien = $_SESSION['giatien'];

                $sql_chitiet_donhang = "INSERT INTO chitiet_donhang (madathang, makh, id_sanpham, tensp, soluong, giatien, tongtien, trangthai, ngaydat, id_dathang, id_kh) 
                VALUES ('$madh', '$makh', '$id_sanpham', '$tensp', '$soluong', '$giatien', '$tongtien', 'đang xử lý', '$date', '0', '0') ";

                $query_chitiet_donhang = mysqli_query($conn, $sql_chitiet_donhang);
            }
    
            //header("Location: index.php?page=vnpay_create_payment");
    
    }

?>