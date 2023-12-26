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
        echo "Error Delete Operation";
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
    <a href="index.php?page=manage_order" class="buy_continute">Turn back</a>
    <div class="menu_option-head">More about products</div>
    <button class="print" id="Print" style="background: crimson; padding: 5px; color: white; display: inline-block; margin-right: auto;">Export Bill</button>
    <?php 
        $makh = $_GET['id'];    
        $sql = "SELECT * FROM khachhang WHERE makh = '$makh'";
        $products = mysqli_query($conn, $sql);

        foreach($products as $keyID => $row){
            
            ?>
                <div class="info">
                    <div class="info-fullname">
                        Username: <span><?php echo $row["tenkh"]; ?></span>
                    </div>
                    <div class="info-email">
                        Email: <span><?php echo $row["email"]; ?></span>
                    </div>
                    <div class="info-phone">
                        Phone number: <span><?php echo $row["sdt"]; ?></span>
                    </div>
                    <div class="info-address">
                        Address: <span><?php echo $row["diachi"]; ?></span>
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
                            Total: <span><?php echo number_format($row['tongtien']); ?>đ</span>
                        </div>
                        <div class="total-discount">
                            Price: <span><?php echo number_format($row['tongtien']); ?>đ</span>
                        </div>
            
                        <div class="total-trangthai">
                            Status
                            <?php if($row['trangthai'] == 'Pending'){ ?> Pending <?php } ?>
                            <?php if($row['trangthai'] == 'Accept'){ ?> Accept <?php } ?>
                            <?php if($row['trangthai'] == 'Delivery'){ ?> Delivery <?php } ?>
                            <?php if($row['trangthai'] == 'Deliveried'){ ?> Deliveried <?php } ?>
                            <?php if($row['trangthai'] == 'Deny'){ ?> Deny <?php } ?>

                            
                            <form action="" method="post">
                                Manage Order:
                                <select name="status" id="">
                                    <option value="Pending">Pending</option>
                                    <option value="accept">Accept</option>
                                    <option value="delivery">Delivery</option>
                                    <option value="deliveried">Deliveried</option>
                                    <option value="deny">Deny</option>
                                </select>

                                <input type="submit" class="duyetdon" value="Update">
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

