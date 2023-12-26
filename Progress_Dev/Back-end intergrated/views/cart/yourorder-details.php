<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/bsgrid.min.css" />
    <link rel="stylesheet" href="./css/admin.min.css" />
</head>
<body>
<div class="body">
    <a href="index.php?page=yourorder" class="buy_continute">Back</a>
    <div class="menu_option-head">Chi tiết đơn hàng</div>
    <button class="print" id="Print" style="background: crimson; padding: 5px; color: white; display: inline-block; margin-right: auto;">In hóa đơn</button>
    <?php 

        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }

        $fullname = $_SESSION['fullname'];
        $sql = "SELECT * FROM khachhang as kh, dangki as dk WHERE kh.email = dk.email AND dk.hoten = '$fullname' AND kh.makh = '$id'";
        $products = mysqli_query($conn, $sql);

        foreach($products as $keyID => $row){
            
            ?>
                <div class="info">
                    <div class="info-fullname">
                        Họ tên: <span><?php echo $row["tenkh"]; ?></span>
                    </div>
                    <div class="info-email">
                        Email: <span><?php echo $row["email"]; ?></span>
                    </div>
                    <div class="info-phone">
                        Sđt: <span><?php echo $row["sdt"]; ?></span>
                    </div>
                    <div class="info-address">
                        Địa chỉ: <span><?php echo $row["diachi"]; ?></span>
                    </div>
                </div>
            <?php
        }            

    ?>

    <div class="list">

        <table>
            <thead>
                <th>mã đặt hàng</th>
                <th>tên sản phẩm</th>
                <th>sl</th>
                <th>gia</th>
                <th>ngày đặt</th>
            </thead>
            
            <tbody>
                <?php 
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                    }
            
                    $fullname = $_SESSION['fullname'];
                    $sql = "SELECT * FROM chitiet_donhang as ctdh, khachhang as kh, dangki as dk WHERE ctdh.makh = kh.makh AND kh.email = dk.email AND dk.hoten = '$fullname' AND kh.makh = '$id'";
                    $products = mysqli_query($conn, $sql);
                   
                    foreach($products as $keyID => $row){
                        ?>
                            <tr>
                                <td><?php echo $row['madathang']; ?></td>
                                <td><?php echo $row['tensp']; ?></td>
                                <td><?php echo $row['soluong']; ?></td>
                                <td><?php echo number_format($row['giatien']); ?>đ</td>
                                <td><?php echo $row['ngaydat']; ?></td>
            
                            </tr>
                        <?php
                    }
                    
                ?>

            </tbody>
        </table>

        <div class="bill">

            <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
        
                $fullname = $_SESSION['fullname'];
                $sql = "SELECT * FROM dathang as dh, khachhang as kh, dangki as dk WHERE dh.makh = kh.makh AND kh.email = dk.email AND dk.hoten = '$fullname' AND kh.makh = '$id'";
                $products = mysqli_query($conn, $sql);
        
                while($row = mysqli_fetch_array($products)){
                    
                    ?>
                        <div class="total-sum">
                            Tổng: <span><?php echo number_format($row['tongtien']); ?>đ</span>
                        </div>
                        <div class="total-discount">
                            Giảm giá: <span>0</span>
                        </div>
                        <div class="total-discount">
                            Thành tiền: <span><?php echo number_format($row['tongtien']); ?>đ</span>
                        </div>

                        <div class="total-trangthai">
                            Trạng thái:
                            <?php
                                if($row['trangthai'] == 'đang xử lý' || $row['trangthai'] == 'đã xử lý'){
                                    ?>
                                        <span style="color: orange;"><?php echo $row['trangthai']; ?></span>
                                    <?php
                                }
                                if($row['trangthai'] == 'đang giao' || $row['trangthai'] == 'giao thành công'){
                                    ?>
                                        <span style="color: green;"><?php echo $row['trangthai']; ?></span>
                                    <?php
                                }
                                if($row['trangthai'] == 'hủy đơn'){
                                    ?>
                                        <span style="color: red;"><?php echo $row['trangthai']; ?></span>
                                    <?php
                                }
                            ?>
                        </div>
                    <?php
                }
            ?>

        </div>

    </div>
</div>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="./script/printThis.js"></script>

<script>
jQuery(document).ready(function ($) {
        $('#Print').on("click", function () {
            $('.body').printThis({
                debug: false,               
    importCSS: true,            
    importStyle: false,         
    printContainer: true,       
    loadCSS: "./css/style.min.css",                
    pageTitle: "",              
    removeInline: false,        
    removeInlineSelector: "*",  
    printDelay: 333,            
    header: null,               
    footer: null,               
    base: false,                
    formValues: true,           
    canvas: false,              
    doctypeString: '...',       
    removeScripts: false,       
    copyTagClasses: false,      // copy classes from the html & body tag
    beforePrintEvent: null,     
    beforePrint: null,          
    afterPrint: null   
            });
        });
    });
</script>

</body>
</html>

