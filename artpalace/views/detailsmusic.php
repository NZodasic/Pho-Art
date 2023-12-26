<?php include "./layout/header.php"; ?>
<!-- Hiển thị chi tiết sản phẩm -->
    <div class="body">
            <a class="buy_continute" href="index.php?page=music"><i class="fa fa-arrow-circle-left"></i> Trở lại mua hàng</a>
            <div class="product__details">
                <?php 
                $r3 = getID();
                    foreach($r3 as $keyID => $valueID){
                ?>
                    <div class="product__details-img">
                        <img src="./<?php echo $valueID['anhsp']; ?>" alt="">
                    </div>

                    <div class="product__details-info">
                        <h3><?php echo $valueID['tensp']; ?></h3>

<!-- Khúc này thêm cái play nhạc -->

                        <div class="product__pride">

                            <div class="product__pride-newPride" style="font-size: 40px;">
                                <span class="Price">
                                    <bdi><?php echo number_format($valueID['giasp']); ?>&nbsp;
                                        <span class="currencySymbol">₫</span>
                                    </bdi>
                                </span>
                            </div>
                        </div>

                        <form action="index.php?page=cart&id=<?php echo $valueID['id_sanpham']; ?>" method="POST">
                            <div class="number">
                                <span>Số lượng</span>
                                <div class="number__count">
                                    <input type="number" value="1" min="1" max="10" name="quantity">
                                    <input type="hidden" name="id" value="<?php echo $valueID['id_sanpham']; ?>">
                                </div>
                            </div>
    
                            <div class="product__cart">
                                <button type="submit" class="product__cart-buy" name="buy-now">Mua ngay</button>
                            </div>
                        </form>
                    </div>
                <?php
                }
                ?>        
            </div>
    </div>
    <!-- End Hiển thị chi tiết sản phẩm -->

    <!-- Mô tả sản phẩm -->
    <div class="body">
        <?php 
        $r3 = getID();
            foreach($r3 as $keyID => $valueID){
            ?>
                <div class="body__mainTitle">
                    <h2>MÔ TẢ SẢN PHẨM</h2>
                </div>

                
                    <?php echo $valueID['mota']; ?>
                
            <?php
            }
        ?>       
    </div>
    <!-- End Mô tả sản phẩm -->

    <!-- Sản phẩm ngẫu nhiên -->
    <div class="body">
        <div class="body__mainTitle">
            <h2>CÁC CON GIỐNG KHÁC</h2>
        </div>
        <div class="row">
            <?php 
            $r = getConGiongRand();
                foreach($r as $keyRand => $valueRand){
            ?>
                <div class="col-lg-2_5 col-md-4 col-6">
                    <a href="index.php?page=detailsmusic&id=<?php echo $valueRand['id_sanpham']; ?>" class="product">
                        <div class="product__img">
                            <img src="./<?php echo $valueRand['anhsp']; ?>" alt="">
                        </div>

                        <div class="product__content">
                            <div class="product__title">
                                <?php echo $valueRand['tensp']; ?>
                            </div>
            
                            <div class="product__pride">

                                <div class="product__pride-newPride">
                                    <span class="Price">
                                        <bdi><?php echo number_format($valueRand['giasp']); ?>&nbsp;
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
<!-- End Sản phẩm ngẫu nhiên -->
<?php

        include "./layout/footer.php";
        ob_end_flush();


        ?>