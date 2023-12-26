<?php include "./layout/header.php"; ?>    
    <!--Product-->
    <div class="container single-product">
        <?php
        $r3 = getID();
        foreach ($r3 as $keyID => $valueID) {
            ?>
                    <div class="row">
                        <div class="col-6">
                            <!--Main img-->
                            <div class="container mainimg">
                            <img src="./<?php echo $valueID['anhsp']; ?>" max-width="50%" alt="" id="img-main">
                            </div>
                        </div>
                        <!--Product detail-->
                        <div class="col-6" style="padding: 100px">     
                            <p>PAINTING</p>
                            <h2><?php echo $valueID['tensp']; ?></h2>
                            <h4>
                                <?php echo number_format($valueID['giasp']); ?>
                                <span class="currencySymbol">₫</span>
                            </h4>
                            <form action="index.php?page=cart&id=<?php echo $valueID['id_sanpham']; ?>" method="POST">
                                <div class="d-flex">
                                    <button type="submit" class="bn" name="add-to-cart" onclick="alert('Add product completed')">Add to cart</button>
                                    <button type="submit" class="atc" name="buy-now">Buy now</button>
                                </div>
                            </form>
                            <p>
                                <?php
                                $r3 = getID();
                                foreach ($r3 as $keyID => $valueID) {
                                    ?>
                                            <h3>Product Details</h3>
                                            <?php echo $valueID['mota']; ?>
                                            <?php
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <?php
        }
        ?>
    </div>

    <!--Art slider-->
    <div class="container-fluid">
    <?php
    $r = getProRand();
    foreach ($r as $keyRand => $valueRand) {
        ?>
            <section class="p-slider">
              <!--Heading-->
              <div class="glider-contain">
                <div class="glider">
              
                  <!--ProductBox1-->
                  <div class="p-box">
                    <div class="p-img-ctn">
                      <!--image-->
                      <div class="p-img">
                        <a href="index.php?page=details&id=<?php echo $valueRand['id_sanpham']; ?>">
                          <!--Front img-->
                          <img src="img/p1.jpg" class="p-img-front" alt="Front">
                          <!--Backt img-->
                          <img src="./<?php echo $valueRand['anhsp']; ?>" class="p-img-back" alt="">
                        </a>
                      </div>
                    </div>
                    <!--Description-->
                    <div class="p-box-text">
                      <!--Category-->
                      <div class="p-category">
                        <span>Art</span>
                      </div>
                      <!--Title-->
                      <a href="index.php?page=details&id=<?php echo $valueRand['id_sanpham']; ?>" class="p-title">
                      <?php echo $valueRand['tensp']; ?>
                      </a>
                      <!--Price-->
                      <div class="price">
                        <span class="p-price">
                        <?php echo number_format($valueRand['giasp']); ?>₫
                        </span>
                      </div>
                    </div>
                    </div>
                </div>
                <button aria-label="Previous" class="glider-prev">«</button>
                <button aria-label="Next" class="glider-next">»</button>
                <div role="tablist" class="dots"></div>
              </div>
            </section>
            <?php
    }
    ?>        

      </div>