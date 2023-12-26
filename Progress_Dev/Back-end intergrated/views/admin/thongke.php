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
                        <div class="list">
                            <center><h3>DOANH THU SẢN PHẨM ĐẠT ĐƯỢC</h3></center>
                            <br>

                            <form method="POST" action="">

                                <label style="font-size: 24px; padding: 0 15px;">doanh thu theo ngày</label>
                                <input type="date" name="datengay" required />

                                <input type="submit" style="background: #007eff; border: none; cursor: pointer; padding: 5px; color: white; border-radius: 5px;" value="Kiểm tra" name="doanhthungay" />

                            </form>
                            <br>
                            <form method="POST" action="">

                                <label style="font-size: 24px; padding: 0 15px;">doanh thu theo tháng</label>
                                <input type="date" name="datethang" required />

                                <input type="submit" style="background: #007eff; border: none; cursor: pointer; padding: 5px; color: white; border-radius: 5px;" value="Kiểm tra" name="doanhthuthang" />

                            </form>
                            <br>
                            <form method="POST" action="">

                                <label style="font-size: 24px; padding: 0 15px;">doanh thu theo năm</label>
                                <input type="date" name="datenam" required />

                                <input type="submit" style="background: #007eff; border: none; cursor: pointer; padding: 5px; color: white; border-radius: 5px;" value="Kiểm tra" name="doanhthunam" />

                            </form>


                            <?php
                                //doanh thu ngay
                                if(isset($_POST['doanhthungay'])){
                                    $doanhthungay = $_POST['datengay'];

                                    $ngay = substr($doanhthungay, 8, 2);
                                    $para1 = substr($doanhthungay, 5, 2);
                                    $nam = substr($doanhthungay, 0, 4);

                                    $s = doanhThuNgay($ngay,$para1,$nam);

                                    ?>
                                        
                                        <div style="padding: 15px;">Tổng doanh thu trong ngày <?php echo $ngay; ?> tháng <?php echo $para1; ?> năm <?php echo $nam; ?> đạt
                                            
                                            <?php 
                                                foreach ($s as $value) {
                                                    ?>
                                                        <span><?php echo number_format($value); ?></span>
                                                    <?php
                                                    
                                                }
                                                
                                                ?>
                                                    <span>vnđ</span>
                                                <?php
                                            ?>
                                        </div>
                                    <?php

                                    
                                }
                                //doanh thu ngay LIST
                                if(isset($_POST['doanhthunam'])){
                                    $doanhthungay = $_POST['datenam'];

                                    $nam = substr($doanhthungay, 0, 4);

                                    $s1 = doanhThuNgayList($nam);

                                    ?>
                                        
                                        <div style="padding: 15px;">
                                        <table>
                                        <thead>
                                            <tr><th>ảnh</th>
                                            <th>tên sản phẩm</th>
                                            <th>giá</th>
                                            <th>số lượng</th>
                                            </tr>
                                        </thead>
                                                    
                                        <tbody>
                                            <?php
                                            foreach($s1 as $keyFind => $value){
                                                ?>
                                                    
                                                    <tr>
                                                    <td>
                                                        <img src="<?php echo $value['anhsp'];?>" width=100 height=100 />
                                                    
                                                    <td>
                                                        <?php echo $value['tensp'];
                                                    ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($value['giasp'] * ((100 - $value['discount']) / 100));
                                                    ?>
                                                    <td>
                                                        <?php echo number_format($value['soluong']);
                                                    ?>
                                                    </tr>                     
                                                <?php
                                                
                                            }
                                            ?>
                                         </tbody>
                                         </table>
                                        </div>
                                    <?php

                                    
                                }
                                //doanh thu thang
                                if(isset($_POST['doanhthuthang'])){
                                    $doanhthuthang = $_POST['datethang'];

                                    $para1 = substr($doanhthuthang, 5, 2);
                                    $nam = substr($doanhthuthang, 0, 4);

                                    $s = doanhThuThang($para1,$nam);

                                    ?>
                                        <div style="padding: 15px;">Tổng doanh thu trong tháng <?php echo $para1; ?> năm <?php echo $nam; ?> đạt
                                    
                                        <?php 
                                            foreach ($s as $value) {
                                                ?>
                                                    <span><?php echo number_format($value); ?></span>
                                                <?php
                                                
                                            }
                                            
                                            ?>
                                                <span>vnđ</span>
                                            <?php
                                        ?>

                                        </div>

                                    <?php

                                }

                                //doanh thu nam
                                if(isset($_POST['doanhthunam'])){
                                    $doanhthunam = $_POST['datenam'];

                                    $para1 = substr($doanhthunam, 0, 4);

                                    $s = doanhThuNam($para1);

                                    ?>
                                        <div style="padding: 15px;">Tổng doanh thu trong năm <?php echo $para1; ?>  đạt
                                    
                                        <?php 
                                            foreach ($s as $value) {
                                                ?>
                                                    <span><?php echo number_format($value); ?></span>
                                                <?php
                                                
                                            }
                                            
                                            ?>
                                                <span>vnđ</span>
                                            <?php
                                        ?>
                                        
                                        </div>
                                       
                                    <?php

                                }
                            ?>
                        <br>
                        <!-- pagination -->
                        
                    </div>
                </div>
            </div>

        </body>
        </html>

    <?php

    unset($_SESSION['staff']);
}

if(isset($_SESSION['staff'])){
    ?>
        <div class="with70">

            <center class="notAllow">
                <img src="img/stop.png" />
                <br>
                <br>
                <h1>Bạn không có quyền truy cập chức năng này!!!</h1>
            </center>

        </div>

    <?php
}

?>

