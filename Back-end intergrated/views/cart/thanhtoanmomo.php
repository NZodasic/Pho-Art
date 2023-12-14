<?php
header('Content-type: text/html; charset=utf-8');

include "cartFunction.php";

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';


$orderInfo = "Thanh toán qua MoMo ATM";

$tongtien = total_price($cart);

$amount = $tongtien;
$orderId = time() ."";

$redirectUrl = "http://localhost/artpalace/index.php?page=yourorder";
$ipnUrl = "http://localhost/artpalace/index.php?page=yourorder";
$extraData = "";

if(isset($_POST['ordermomo'])){

    $requestId = time() . "";
    $requestType = "payWithATM";
    //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array('partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there

    //luu vao db
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

    $sql2 = "INSERT INTO dathang (madathang, makh, trangthai, tongtien, ngaydathang, giaohang, id_kh) VALUES ('$madh', '$makh', 'đang xử lý', '$tongtien', '$date', 'MOMO', '0') ";
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

    header('Location: ' . $jsonResult['payUrl']);
}
?>