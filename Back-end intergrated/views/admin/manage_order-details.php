<?php 

if(isset($_POST['status'])){
    $status = $_POST['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `dathang` SET trangthai = '$status' WHERE makh = '$id'";

    mysqli_query($conn, $sql);

    $sql2 = "UPDATE `chitiet_donhang` SET trangthai = '$status' WHERE makh = '$id'";

    mysqli_query($conn, $sql2);

    if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql)){
        header("Location: index.php?page=manage_order");
    }
    else{
        echo "Xóa thất bại";
    }

}


?>

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


<div class="body" id="ViewPrint">
    <a href="index.php?page=manage_order" class="buy_continute">Quay lại</a>
    <div class="menu_option-head">Chi tiết đơn hàng</div>
    <button class="print" id="Print" style="background: crimson; padding: 5px; color: white; display: inline-block; margin-right: auto;">In hóa đơn</button>
    <?php 
        $makh = $_GET['id'];    
        $sql = "SELECT * FROM khachhang WHERE makh = '$makh'";
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
                <th>giá</th>
                <th>ngày đặt</th>
            </thead>
            
            <tbody>
                <?php 
                    $makh = $_GET['id'];   
                    $sql = "SELECT * FROM chitiet_donhang WHERE makh = '$makh'";  
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
                $makh = $_GET['id'];
                $products = mysqli_query($conn, "SELECT * FROM dathang WHERE makh = '$makh'");
        
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
                            <?php if($row['trangthai'] == 'đang xử lý'){ ?> đang xử lý <?php } ?>
                            <?php if($row['trangthai'] == 'đã xử lý'){ ?> đã xử lý <?php } ?>
                            <?php if($row['trangthai'] == 'đang giao'){ ?> đang giao <?php } ?>
                            <?php if($row['trangthai'] == 'giao thành công'){ ?> giao thành công <?php } ?>
                            <?php if($row['trangthai'] == 'hủy đơn'){ ?> hủy đơn <?php } ?>

                            
                            <form action="" method="post">
                                Duyệt đơn:
                                <select name="status" id="">
                                    <option value="đang xử lý">đang xử lý</option>
                                    <option value="đã xử lý">đã xử lý</option>
                                    <option value="đang giao">đang giao</option>
                                    <option value="giao thành công">giao thành công</option>
                                    <option value="hủy đơn">hủy đơn</option>
                                </select>

                                <input type="submit" class="duyetdon" value="Cập nhập">
                            </form>
 
                        </div>
                    <?php
                }
            ?>

        </div>

    </div>
</div>  

</body>

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

</html>

