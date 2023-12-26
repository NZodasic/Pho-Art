<?php 
    //All Product
    
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
    $current_page = !empty($_GET['pageitem']) ? $_GET['pageitem'] : 1; //Trang hiện tại
    $offset = ($current_page - 1) * $item_per_page;

    $products = mysqli_query($conn, "SELECT * FROM sanpham ORDER BY id_sanpham DESC  LIMIT ".$item_per_page." OFFSET ".$offset);

    if(isset($_POST['sort'])){
        if($_POST['sort'] === 'tang'){
            $products = mysqli_query($conn, "SELECT * FROM sanpham ORDER BY giasp ASC LIMIT ".$item_per_page." OFFSET ".$offset);

        }
        if($_POST['sort'] === 'giam'){
            $products = mysqli_query($conn, "SELECT * FROM sanpham ORDER BY giasp DESC LIMIT ".$item_per_page." OFFSET ".$offset);

        }
    }

    $totalRecords = mysqli_query($conn, "SELECT * FROM sanpham");
    $totalRecords = $totalRecords -> num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
?>


<!-- Tất cả sản phẩm -->
<div class="body">
    <div class="body__mainTitle" style="display: flex; justify-content: space-between;">
        <h2>All Product</h2>
        <div>
            <form method="POST" class="sortPrice"> 
                <select id="pet-select" name="sort">
                    <option value="">Sort By</option>
                    <option value="tang">Price: High-Low</option>
                    <option value="giam">Price: Low-High</option>
                </select>
  


                <input type="submit" value="Update">

            </form>
        </div>
    </div>

    <div>
        <div class="row">
            <?php 
                while($row = mysqli_fetch_array($products)){
            ?>
                                <div class="col-lg-2_5 col-md-4 col-6">
                                            <a href="index.php?page=details&id=<?php echo $row['id_sanpham']; ?>" class="product">
                                                <div class="product__img">
                                                    <img lazy data-src="./<?php echo $row['anhsp']; ?>" alt="">
                                                </div>
                                                <div class="product__sale">
                                                    <h4><?php 
                                                        if($row['discount'] == 0){
                                                            echo "Mới";
                                                        }else{
                                                            echo number_format($row['discount']) . "%";
                                                        }
                                                    ?></h4>
                                                </div>
                    
                                                <div class="product__content">
                                                    <div class="product__title">
                                                        <?php echo $row['tensp']; ?>
                                                    </div>
                    
                                                    <div class="product__pride">
                                                        <div class="product__pride-oldPride">
                                                            <span class="Price">
                                                                <bdi><?php echo number_format($row['giasp']); ?>&nbsp;
                                                                    <span class="currencySymbol">₫</span>
                                                                </bdi>
                                                            </span>
                                                        </div>
                                                        <div class="product__pride-newPride">
                                                            <span class="Price">
                                                                <bdi><?php echo number_format($row['giasp'] * ((100 - $row['discount']) / 100)); ?>&nbsp;
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
            ?> 
                <ul class="pagination justify-content-center">
                    <?php
                    $param = "page=showAllProducts&";

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