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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="./css/bsgrid.min.css" />
            <link rel="stylesheet" href="./css/admin.min.css" />
            <link rel="stylesheet" href="./css/style.min.css">
        </head>
        <body>

            <div class="with70">
                <div class="row">
                <div class="col-md-3 menu container-fluid">  
                <div class="menu_option container-fluid">
                    <div class="menu_option-head"><h1>P.ART</h1></div>
                    <ul>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                            </svg>
                            <a href="index.php?page=admin">Mainpage</a>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z"/>
                              </svg>
                            <a href="index.php?page=add_product">Add Product</a>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-list-ul" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                              </svg>
                            <a href="index.php?page=manage_order">Manage Your Order</a>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1z"/>
                              </svg>
                            <a href="index.php?page=thongke">Dashboard</a></li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                              </svg>
                            <a href="./index.php">Exit</a></li>
                    </ul>
                </div>
            </div>
                    <div class="col-md-9">
                        <div class="list">
                            <center><h3>PRODUCT TURNOVER</h3></center>
                            <br>

                            <form method="POST" action="">

                                <label style="font-size: 24px; padding: 0 15px;">Turnover by day</label>
                                <input type="date" name="datengay" required />

                                <input type="submit" style="background: #007eff; border: none; cursor: pointer; padding: 5px; color: white; border-radius: 5px;" value="Check" name="doanhthungay" />

                            </form>
                            <br>
                            <form method="POST" action="">

                                <label style="font-size: 24px; padding: 0 15px;">Turnover by month</label>
                                <input type="date" name="datethang" required />

                                <input type="submit" style="background: #007eff; border: none; cursor: pointer; padding: 5px; color: white; border-radius: 5px;" value="Check" name="doanhthuthang" />

                            </form>
                            <br>
                            <form method="POST" action="">

                                <label style="font-size: 24px; padding: 0 15px;">Turnover by year</label>
                                <input type="date" name="datenam" required />

                                <input type="submit" style="background: #007eff; border: none; cursor: pointer; padding: 5px; color: white; border-radius: 5px;" value="Check" name="doanhthunam" />

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
                                        
                                        <div style="padding: 15px;">Turnover by day <?php echo $ngay; ?> month <?php echo $para1; ?> year <?php echo $nam; ?> achieve
                                            
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
                                            <tr>
                                            <th>Picture</th>
                                            <th>Product name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
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
                                        <div style="padding: 15px;">Turnover by month <?php echo $para1; ?> year <?php echo $nam; ?> achieve
                                    
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
                                        <div style="padding: 15px;">;">Turnover by year <?php echo $para1; ?>  achieve
                                    
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

}


?>

