<?php
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
    $current_page = !empty($_GET['pageitem']) ? $_GET['pageitem'] : 1; //Trang hiện tại
    $offset = ($current_page - 1) * $item_per_page;
    $products = mysqli_query($conn, "SELECT * FROM `dathang` as dh, `khachhang` as kh WHERE kh.makh = dh.makh ORDER BY id_dathang DESC  LIMIT ".$item_per_page." OFFSET ".$offset);
    $totalRecords = mysqli_query($conn, "SELECT * FROM dathang");
    $totalRecords = $totalRecords -> num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
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

    <div class="with70">
        <div class="row">
            <div class="col-md-3">
                <div class="menu_option">
                    <div class="menu_option-head">Menu</div>
                    <ul>
                        <li><a href="index.php?page=admin">Trang chủ</a></li>
                        <li><a href="index.php?page=add_product">Thêm sản phẩm</a></li>
                        <li class="active-bg"><a href="index.php?page=manage_order">Quản lý đơn hàng</a></li>
                        <li><a href="./index.php">Thoát</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="list">
                    <div class="menu_option-head">Danh sách đơn hàng</div>

                    <table>
          
                        <thead>
                          <th>User ID</th>
                          <th>Username</th>
                          <th>tổng tiền</th>
                          <th>ngày đặt</th>
                          <th>giao hàng</th>
                          <th>tùy chọn</th>
                        </thead>
                        
                        <?php

                            foreach($products as $keyID => $valueID){
                                ?>

                                    <tr class="info-kh">
                                        <td><?php echo $valueID['makh']; ?></td>
                                        <td><?php echo $valueID['tenkh']; ?></td>
                                        <td><?php echo number_format($valueID['tongtien']); ?>đ</td>
                                        

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
                                            ?>
                                        </td> 

                                        <td>  

                                                                     
                                            <div class="d-flex" style="justify-content: center;">
                                                <a href="index.php?page=manage_order-details&id=<?php echo $valueID['makh']; ?>" class="duyet">Chi tiết</a>
                                                <a href="index.php?page=xoadon&id=<?php echo $valueID['makh']; ?>" class="cancel" style="margin-right: 0;" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                            </div>
                                        </td>
                                    </tr>
                            
                                <?php
                            }
                        ?>
             
                    </table>
                    
                </div>

                <?php 
                    ?> 
                        <ul class="pagination justify-content-center">
                            <?php
                                $param = "page=manage_order&";

                                    if ($current_page > 3) {
                                        $first_page = 1;
                                        ?>
                                        <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $first_page ?>">First</a></li>
                                        <?php
                                    }
                                    if ($current_page > 1) {
                                        $prev_page = $current_page - 1;
                                        ?>
                                        <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $prev_page ?>">Previous</a></li>
                                    <?php 
                                    }
                                    ?>

                                    <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
                                        <?php if ($num != $current_page) { ?>
                                            <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                                                <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $num ?>"><?= $num ?></a></li>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <li class="page-item active"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $num ?>"><?= $num ?></a></li>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php
                                    if ($current_page < $totalPages - 1) {
                                        $next_page = $current_page + 1;
                                        ?>
                                        <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $next_page ?>">Next</a></li>
                                    <?php
                                    }
                                    if ($current_page < $totalPages - 3) {
                                        $end_page = $totalPages;
                                        ?>
                                        <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $end_page ?>">Last</a></li>
                                        <?php
                                    }
                                ?> 
                            </ul>
                    <?php
                ?>

            </div>
        </div>
    </div>

</body>
</html>