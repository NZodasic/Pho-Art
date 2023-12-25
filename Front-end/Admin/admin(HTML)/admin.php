<?php
    if(isset($_SESSION['admin'])){
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
                                    <li class="active-bg"><a href="">Trang chủ</a></li>
                                    <li><a href="index.php?page=add_product">Thêm sản phẩm</a></li>
                                    <li><a href="index.php?page=manage_order">Quản lý đơn hàng</a></li>
                                    <li><a href="index.php?page=thongke">Thống kê</a></li>
                                    <li><a href="./index.php">Thoát</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">

                        <div class="row dashboard">
                            <div class="col-md-3 col-6">
                                <div class="dashboard-box1">
                                <i class="fa fa-users  mb-2" style="font-size: 50px;"></i>
                                <h4 style="color:white;">Số người dùng</h4>
                                <h5 style="color:white;">
                                <?php
                                    $sql="SELECT * from dangki";
                                    $result=$conn-> query($sql);
                                    $count=0;
                                    if ($result-> num_rows > 0){
                                        while ($row=$result-> fetch_assoc()) {
                                
                                            $count=$count+1;
                                        }
                                    }
                                    echo $count;
                                ?></h5>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="dashboard-box2">
                                <i class="fa fa-th-large mb-2" style="font-size: 50px;"></i>
                                <h4 style="color:white;">Danh mục</h4>
                                <h5 style="color:white;">
                                <?php
                                
                                $sql="SELECT * from danhmuc";
                                $result=$conn-> query($sql);
                                $count=0;
                                if ($result-> num_rows > 0){
                                    while ($row=$result-> fetch_assoc()) {
                            
                                        $count=$count+1;
                                    }
                                }
                                echo $count;
                            ?>
                            </h5>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="dashboard-box3">
                                <i class="fa fa-th mb-2" style="font-size: 50px;"></i>
                                <h4 style="color:white;">Sản phẩm</h4>
                                <h5 style="color:white;">
                                <?php
                                
                                $sql="SELECT * from sanpham";
                                $result=$conn-> query($sql);
                                $count=0;
                                if ($result-> num_rows > 0){
                                    while ($row=$result-> fetch_assoc()) {
                            
                                        $count=$count+1;
                                    }
                                }
                                echo $count;
                            ?>
                            </h5>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="dashboard-box4">
                                <i class="fa fa-list mb-2" style="font-size: 50px;"></i>
                            <h4 style="color:white;">Số đơn hàng</h4>
                            <h5 style="color:white;">
                            <?php
                            
                            $sql="SELECT * from dathang";
                            $result=$conn-> query($sql);
                            $count=0;
                            if ($result-> num_rows > 0){
                                while ($row=$result-> fetch_assoc()) {
                        
                                    $count=$count+1;
                                }
                            }
                            echo $count;
                        ?>
                        </h5>
                                </div>
                            </div>
                        </div>

                            <div class="list">
                                <div class="menu_option-head">Danh sách sản phẩm</div>
                                <div class="add-product">
                                    <a href="index.php?page=add_product">Thêm sản phẩm</a>
                                </div>
                                <table>
                    
                                    <thead>
                                    <th>ảnh</th>
                                    <th>tên sản phẩm</th>
                                    <th>giá</th>
                                    <th>sửa</th>
                                    <th>xóa</th>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                        global $s;
                                        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
                                        $current_page = !empty($_GET['pageitem']) ? $_GET['pageitem'] : 1; //Trang hiện tại
                                    
                                        $offset = ($current_page - 1) * $item_per_page;
                                        $products = mysqli_query($conn, "SELECT * FROM sanpham ORDER BY id_sanpham DESC  LIMIT ".$item_per_page." OFFSET ".$offset);
                                        $totalRecords = mysqli_query($conn, "SELECT * FROM sanpham");
                                        $totalRecords = $totalRecords -> num_rows;
                                        $totalPages = ceil($totalRecords / $item_per_page);

                                        while($valueAll = mysqli_fetch_array($products)){
                                        ?>
                                            <tr>
                                            <td><img src="<?php echo $valueAll['anhsp'] ?>"; height="100px;" alt=""></td>
                                            <td><?php echo $valueAll['tensp'] ?></td>
                                            <td><?php echo number_format($valueAll['giasp']); ?></td>
                                            <td><a href="index.php?page=edit_product&id=<?php echo $valueAll['id_sanpham']; ?>" class="td_edit">sửa</a></td>
                                            <td><a href="index.php?page=delete_product&id=<?php echo $valueAll['id_sanpham']; ?>" class="td_delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">xóa</a></td>
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                            <?php 
                                ?> 
                                    <ul class="pagination justify-content-center">
                                        <?php
                                        $param = "page=admin&";

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
                
                            <!-- pagination -->
                            
                        </div>
                    </div>
                </div>

            </body>
            </html>

        <?php
    }

    if(isset($_SESSION['staff'])){
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
                                    <li class="active-bg"><a href="">Trang chủ</a></li>
                                    <li><a href="index.php?page=add_product">Thêm sản phẩm</a></li>
                                    <li><a href="index.php?page=manage_order">Quản lý đơn hàng</a></li>
                                    <li><a href="./index.php">Thoát</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="list">
                                <div class="menu_option-head">Danh sách sản phẩm</div>
                                <div class="add-product">
                                    <a href="index.php?page=add_product">Thêm sản phẩm</a>
                                </div>
                                <table>
                    
                                    <thead>
                                    <th>ảnh</th>
                                    <th>tên sản phẩm</th>
                                    <th>giá</th>
                                    <th>sửa</th>
                                    <th>xóa</th>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                        global $s;
                                        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
                                        $current_page = !empty($_GET['pageitem']) ? $_GET['pageitem'] : 1; //Trang hiện tại
                                    
                                        $offset = ($current_page - 1) * $item_per_page;
                                        $products = mysqli_query($conn, "SELECT * FROM sanpham ORDER BY id_sanpham DESC  LIMIT ".$item_per_page." OFFSET ".$offset);
                                        $totalRecords = mysqli_query($conn, "SELECT * FROM sanpham");
                                        $totalRecords = $totalRecords -> num_rows;
                                        $totalPages = ceil($totalRecords / $item_per_page);

                                        while($valueAll = mysqli_fetch_array($products)){
                                        ?>
                                            <tr>
                                            <td><img src="<?php echo $valueAll['anhsp'] ?>"; height="100px;" alt=""></td>
                                            <td><?php echo $valueAll['tensp'] ?></td>
                                            <td><?php echo number_format($valueAll['giasp']); ?></td>
                                            <td><a href="index.php?page=edit_product&id=<?php echo $valueAll['id_sanpham']; ?>" class="td_edit">sửa</a></td>
                                            <td><a href="index.php?page=delete_product&id=<?php echo $valueAll['id_sanpham']; ?>" class="td_delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">xóa</a></td>
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                            <?php 
                                ?> 
                                    <ul class="pagination justify-content-center">
                                        <?php
                                        $param = "page=admin&";

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
                
                            <!-- pagination -->
                            
                        </div>
                    </div>
                </div>

            </body>
            </html>

        <?php
    }

?>

