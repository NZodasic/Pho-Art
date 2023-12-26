<?php 
    global $s;
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
    $current_page = !empty($_GET['pageitem']) ? $_GET['pageitem'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($conn, "SELECT * FROM sanpham");
    $totalRecords = $totalRecords -> num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);

    global $conn;
    $products = '';

    //Search product
    if(isset($_GET['txtsearch'])){
        $s = $_GET['txtsearch'];

        if($s != ""){
            $sql = "SELECT * FROM `sanpham` WHERE tensp like '%$s%' LIMIT ".$item_per_page." OFFSET ".$offset;
            $products = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($products);

            if($count >0){
                ?>
                <div class="body">
    
                    <div class="body__mainTitle">
                        <h2>Product List</h2>
                    </div>

                    <div>
                        <div class="row">
                            <?php 
                                foreach ($products as $keyDog => $valueFind) {
                                    ?>
                                        <div class="col-lg-2_5 col-md-4 col-6">
                                            <a href="index.php?page=details&id=<?php echo $valueFind['id_sanpham']; ?>" class="product">
                                                <div class="product__img">
                                                    <img lazy data-src="./<?php echo $valueFind['anhsp']; ?>" alt="">
                                                </div>
                                                <div class="product__sale">
                                                    <h4><?php 
                                                        if($valueFind['discount'] == 0){
                                                            echo "Mới";
                                                        }else{
                                                            echo number_format($valueFind['discount']) . "%";
                                                        }
                                                    ?></h4>
                                                </div>
                    
                                                <div class="product__content">
                                                    <div class="product__title">
                                                        <?php echo $valueFind['tensp']; ?>
                                                    </div>
                    
                                                    <div class="product__pride">
                                                        <div class="product__pride-oldPride">
                                                            <span class="Price">
                                                                <bdi><?php echo number_format($valueFind['giasp']); ?>&nbsp;
                                                                    <span class="currencySymbol">₫</span>
                                                                </bdi>
                                                            </span>
                                                        </div>
                                                        <div class="product__pride-newPride">
                                                            <span class="Price">
                                                                <bdi><?php echo number_format($valueFind['giasp'] * ((100 - $valueFind['discount']) / 100)); ?>&nbsp;
                                                                    <span class="currencySymbol">₫</span> 
                                                                </bdi>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php
                                    }
                            ?>

                        </div>

                        <?php 
                            include "pagination.php";
                        ?>        
                    </div>
                        
                </div>
                <?php
            }

            else{
                ?>
                <body>
                    <center>
                    <img lazy data-src="./img/search_notfound.jpg" style="height: 300px;" />
                    <div style="font-size: 25px; padding: 10px;">Can't find that product <b><?php echo $s ?></b></div>
                    </center>
                </body>
                <?php
            }
        }

        else{
            ?>
                <h1>You haven't input keyword to search</h1>
            <?php
            echo "You haven't input keyword to search<br>";
            echo '<a href="index.php">Return</a>';
            header("location: index.php");
        }
        
    }else{
        ?>
        <!-- Feature Product -->
        <div class="body">
            
            <div class="body__mainTitle">
                <h2>Feature Product</h2>
            </div>

            <div>
                <div class="row">
                    <?php 
                    $r2 = getProVip();
                    foreach ($r2 as $keyDog => $valueFind) {
                        ?>
                            <div class="col-lg-2_5 col-md-4 col-6">
                                <a href="index.php?page=details&id=<?php echo $valueFind['id_sanpham']; ?>" class="product">
                                    <div class="product__img">
                                        <img lazy data-src="./<?php echo $valueFind['anhsp']; ?>" alt="">
                                    </div>
                                    <div class="product__sale">
                                        <h4><?php 
                                            if($valueFind['discount'] == 0){
                                                echo "Mới";
                                            }else{
                                                echo number_format($valueFind['discount']) . "%";
                                            }
                                        ?></h4>
                                    </div>
        
                                    <div class="product__content">
                                        <div class="product__title">
                                            <?php echo $valueFind['tensp']; ?>
                                        </div>
        
                                        <div class="product__pride">
                                            <div class="product__pride-oldPride">
                                                <span class="Price">
                                                    <bdi><?php echo number_format($valueFind['giasp']); ?>&nbsp;
                                                        <span class="currencySymbol">₫</span>
                                                    </bdi>
                                                </span>
                                            </div>
                                            <div class="product__pride-newPride">
                                                <span class="Price">
                                                    <bdi><?php echo number_format($valueFind['giasp'] * ((100 - $valueFind['discount']) / 100)); ?>&nbsp;
                                                        <span class="currencySymbol">₫</span> 
                                                    </bdi>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
                
            

        </div>

        <!-- Music -->
        <div class="body">
            
            <div class="body__mainTitle">
                <h2>Music</h2>
            </div>

            <div>
                <div class="row">
                    <?php 
                    $r2 = getProDog();
                    foreach ($r2 as $keyDog => $valueFind) {
                        ?>
                            <div class="col-lg-2_5 col-md-4 col-6">
                                <a href="index.php?page=details&id=<?php echo $valueFind['id_sanpham']; ?>" class="product">
                                    <div class="product__img">
                                        <img lazy data-src="./<?php echo $valueFind['anhsp']; ?>" alt="">
                                    </div>
                                    <div class="product__sale">
                                        <h4><?php 
                                            if($valueFind['discount'] == 0){
                                                echo "Mới";
                                            }else{
                                                echo number_format($valueFind['discount']) . "%";
                                            }
                                        ?></h4>
                                    </div>
        
                                    <div class="product__content">
                                        <div class="product__title">
                                            <?php echo $valueFind['tensp']; ?>
                                        </div>
        
                                        <div class="product__pride">
                                            <div class="product__pride-oldPride">
                                                <span class="Price">
                                                    <bdi><?php echo number_format($valueFind['giasp']); ?>&nbsp;
                                                        <span class="currencySymbol">₫</span>
                                                    </bdi>
                                                </span>
                                            </div>
                                            <div class="product__pride-newPride">
                                                <span class="Price">
                                                    <bdi><?php echo number_format($valueFind['giasp'] * ((100 - $valueFind['discount']) / 100)); ?>&nbsp;
                                                        <span class="currencySymbol">₫</span> 
                                                    </bdi>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
                
            

        </div>

        <!-- Art -->
        <div class="body">
            
            <div class="body__mainTitle">
                <h2>Art</h2>
            </div>

            <div>
                <div class="row">
                    <?php 
                    $r1 = getProCat();
                    foreach ($r2 as $keyDog => $valueFind) {
                        ?>
                            <div class="col-lg-2_5 col-md-4 col-6">
                                <a href="index.php?page=details&id=<?php echo $valueFind['id_sanpham']; ?>" class="product">
                                    <div class="product__img">
                                        <img lazy data-src="./<?php echo $valueFind['anhsp']; ?>" alt="">
                                    </div>
                                    <div class="product__sale">
                                        <h4><?php 
                                            if($valueFind['discount'] == 0){
                                                echo "Mới";
                                            }else{
                                                echo number_format($valueFind['discount']) . "%";
                                            }
                                        ?></h4>
                                    </div>
        
                                    <div class="product__content">
                                        <div class="product__title">
                                            <?php echo $valueFind['tensp']; ?>
                                        </div>
        
                                        <div class="product__pride">
                                            <div class="product__pride-oldPride">
                                                <span class="Price">
                                                    <bdi><?php echo number_format($valueFind['giasp']); ?>&nbsp;
                                                        <span class="currencySymbol">₫</span>
                                                    </bdi>
                                                </span>
                                            </div>
                                            <div class="product__pride-newPride">
                                                <span class="Price">
                                                    <bdi><?php echo number_format($valueFind['giasp'] * ((100 - $valueFind['discount']) / 100)); ?>&nbsp;
                                                        <span class="currencySymbol">₫</span> 
                                                    </bdi>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
                
            

        </div>

        <!-- All Product -->
        <div class="body">
            
            <div class="body__mainTitle">
                <h2>All Product</h2>
            </div>

            <div>
                <div class="row">
                    <?php 
                    $r = getProAll();
                    foreach ($r2 as $keyDog => $valueFind) {
                        ?>
                            <div class="col-lg-2_5 col-md-4 col-6">
                                <a href="index.php?page=details&id=<?php echo $valueFind['id_sanpham']; ?>" class="product">
                                    <div class="product__img">
                                        <img lazy data-src="./<?php echo $valueFind['anhsp']; ?>" alt="">
                                    </div>
                                    <div class="product__sale">
                                        <h4><?php 
                                            if($valueFind['discount'] == 0){
                                                echo "Mới";
                                            }else{
                                                echo number_format($valueFind['discount']) . "%";
                                            }
                                        ?></h4>
                                    </div>
        
                                    <div class="product__content">
                                        <div class="product__title">
                                            <?php echo $valueFind['tensp']; ?>
                                        </div>
        
                                        <div class="product__pride">
                                            <div class="product__pride-oldPride">
                                                <span class="Price">
                                                    <bdi><?php echo number_format($valueFind['giasp']); ?>&nbsp;
                                                        <span class="currencySymbol">₫</span>
                                                    </bdi>
                                                </span>
                                            </div>
                                            <div class="product__pride-newPride">
                                                <span class="Price">
                                                    <bdi><?php echo number_format($valueFind['giasp'] * ((100 - $valueFind['discount']) / 100)); ?>&nbsp;
                                                        <span class="currencySymbol">₫</span> 
                                                    </bdi>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                    ?>
                </div>
                <center>
                    <a href="index.php?page=showAllProducts" class="more">More Product</a>
                </center>
            </div>
                
            

        </div>

        <?php
    }
?>