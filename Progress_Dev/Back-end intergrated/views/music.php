<div class="body">
    
    <div class="body__mainTitle">
        <h2>Music</h2>
    </div>

    <div>
        <div class="row">
            <?php 
            $r2 = getConGiong();
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