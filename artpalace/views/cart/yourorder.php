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
    <div class="with70">
        <div class="list">
            <div class="menu_option-head">Ordered Products</div>

            <table>

                <thead>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Order Day</th>
                    <th>Delivery</th>
                    <th>Option</th>
                </thead>
                
                <?php
                    $fullname = $_SESSION['fullname'];
                    $sql = "SELECT * FROM dathang as dh, khachhang as kh, dangki as dk WHERE kh.makh = dh.makh AND kh.email = dk.email AND dk.hoten = '$fullname'";
                    $products = mysqli_query($conn, $sql);
                    foreach($products as $keyID => $valueID){
                        ?>

                            <tr class="info-kh">
                                <td><?php echo $valueID['makh']; ?></td>
                                <td><?php echo $valueID['tenkh']; ?></td>
                                <td><?php echo number_format($valueID['tongtien']); ?>đ</td>
                                <td>
                                    <?php
                                        if($valueID['trangthai'] == 'đang xử lý' || $valueID['trangthai'] == 'Completed'){
                                            ?>
                                                <div style="color: orange;"><?php echo $valueID['trangthai']; ?></div>
                                            <?php
                                        }
                                        if($valueID['trangthai'] == 'đang giao' || $valueID['trangthai'] == 'Delivery Completed'){
                                            ?>
                                                <div style="color: green;"><?php echo $valueID['trangthai']; ?></div>
                                            <?php
                                        }
                                        if($valueID['trangthai'] == 'Delete order'){
                                            ?>
                                                <div style="color: red;"><?php echo $valueID['trangthai']; ?></div>
                                            <?php
                                        }
                                        ?>
                                </td>

                                <td><?php echo $valueID['ngaydathang']; ?></td>

                                <td><?php 
                                 if($valueID['giaohang'] == 'MOMO'){
                                    ?>
                                        <div style="color: crimson;"><?php echo $valueID['giaohang']; ?></div>
                                    <?php
                                }if($valueID['giaohang'] == 'COD'){
                                    ?>
                                    <div><?php echo $valueID['giaohang']; ?></div>
                                <?php
                                }
                                ?></td>
                               
                                <td>                                            
                                    <div class="d-flex" style="justify-content: center;">
                                        <a href="index.php?page=yourorder-details&id=<?php echo $valueID['makh']; ?>" class="duyet">Description</a>
                                        <a href="index.php?page=khachxoadon&id=<?php echo $valueID['makh']; ?>" class="cancel" style="margin-right: 0;" onclick="return confirm('Confirm delete operation')">Delete</a>
                                    </div>
                                </td>
                            </tr>
                    
                        <?php
                    }
                ?>

            </table>
            
        </div>

    </div>
    </body>
</html>

