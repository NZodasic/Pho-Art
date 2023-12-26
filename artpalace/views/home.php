
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


     <!--Product-slider main-->
     <div class="container-fluid slider main">
        <section class="p-slider">
          <!--Heading-->
          <h2 class="p-slider-heading">What's Hot</h2>
          <div class="glider-contain">
            <div class="glider">
            <?php 
                    $r2 = getProVip();
                    foreach ($r2 as $keyDog => $valueFind) {
                        ?>
              <!--ProductBox1-->
              <div class="p-box">
                <div class="p-img-ctn">
                  <!--image-->
                  <div class="p-img">
                    <a href="index.php?page=details&id=<?php echo $valueFind['id_sanpham']; ?>">
                      <!--Front img-->
                      <img src="img/p1.jpg" class="p-img-front" alt="Front">
                      <!--Backt img-->
                      <img lazy data-src="./<?php echo $valueFind['anhsp']; ?>" class="p-img-back" alt="">
                    </a>
                  </div>
                </div>
                <!--Description-->
                <div class="p-box-text">
                  <!--Category-->
                  <div class="p-category">
                    <span>Feature Product</span>
                  </div>
                  <!--Title-->
                  <a href="#" class="p-title">
                  <?php echo $valueFind['tensp']; ?>
                  </a>
                  <!--Price-->
                  <div class="price">
                    <span class="p-price">
                    <?php echo number_format($valueFind['giasp']); ?>₫
                    </span>
                  </div>
                </div>
              </div>
              <?php
                        }
                    ?>
            </div>
            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
          </div>
        </section>
     </div>

     <!--ARTTHEME-->
     <div class="art-theme">
      <div class="art-img">
        <img src="img/default/image.jpg" alt="">
        <div class="art-content">
          <h1>"Each detail of the painting contains a P.ART of the story."</h1>
          <h3>-P.ART Front End Dev-</h3>
        </div>
      </div>
     </div>
     
     <!--Art slider-->
     <div class="container-fluid slider art">
        <section class="p-slider">
          <!--Heading-->
          <h2 class="p-slider-heading">painting</h2>
          <div class="glider-contain">
            <div class="glider">
            <?php 
                    $r2 = getProMusic();
                    foreach ($r2 as $keyDog => $valueFind) {
                        ?>
              <!--ProductBox1-->
              <div class="p-box">
                <div class="p-img-ctn">
                  <!--image-->
                  <div class="p-img">
                    <a href="index.php?page=details&id=<?php echo $valueFind['id_sanpham']; ?>">
                      <!--Front img-->
                      <img src="img/p1.jpg" class="p-img-front" alt="Front">
                      <!--Backt img-->
                      <img lazy data-src="./<?php echo $valueFind['anhsp']; ?>" class="p-img-back" alt="">
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
                  <a href="index.php?page=details&id=<?php echo $valueFind['id_sanpham']; ?>" class="p-title">
                  <?php echo $valueFind['tensp']; ?>
                  </a>
                  <!--Price-->
                  <div class="price">
                    <span class="p-price">
                    <?php echo number_format($valueFind['giasp']); ?>₫
                    </span>
                  </div>
                </div>
              </div>
              <?php
                        }
                    ?>
            </div>
            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
          </div>
        </section>
      </div>

    <!--PHOTOTHEME-->
    <div class="art-theme">
    <div class="art-img">
      <img src="img/default/photography.webp" alt="">
      <div class="art-content">
        <h1>"Photography is an austere and blazing poetry of the real."</h1>
        <h3>-Ansel Adams-</h3>
      </div>
    </div>
    </div>

    <!--Photo slider-->
    <div class="container-fluid slider photo">
      <section class="p-slider">
        <!--Heading-->
        <h2 class="p-slider-heading">Photography</h2>
        <div class="glider-contain">
          <div class="glider">
          <?php 
                    $r1 = getProCat();
                    foreach ($r2 as $keyDog => $valueFind) {
                        ?>
            <!--ProductBox1-->
            <div class="p-box">
              <div class="p-img-ctn">
                <!--image-->
                <div class="p-img">
                  <a href="index.php?page=details&id=<?php echo $valueFind['id_sanpham']; ?>">
                    <!--Front img-->
                    <img src="img/abstract.jpg" class="p-img-front" alt="Front">
                    <!--Backt img-->
                    <img lazy data-src="./<?php echo $valueFind['anhsp']; ?>" alt="">
                  </a>
                </div>
              </div>
              <!--Description-->
              <div class="p-box-text">
                <!--Category-->
                <div class="p-category">
                  <span>Photography</span>
                </div>
                <!--Title-->
                <a href="index.php?page=details&id=<?php echo $valueFind['id_sanpham']; ?>" class="p-title">
                <?php echo $valueFind['tensp']; ?>
                </a>
                <!--Price-->
                <div class="price">
                  <span class="p-price">
                  <?php echo number_format($valueFind['giasp']); ?>₫
                  </span>
                </div>
              </div>
            </div>
            <?php
                        }
                    ?>
          </div>
          <button aria-label="Previous" class="glider-prev">«</button>
          <button aria-label="Next" class="glider-next">»</button>
          <div role="tablist" class="dots"></div>
        </div>
      </section>
    </div>

    <!--Music theme-->
    <div class="art-theme">
      <div class="art-img">
        <img src="img/default/music.png" alt="">
        <div class="art-content">
          <h1>"One good thing about music, when it hits you, you feel no pain."</h1>
          <h3>-Bob Marley-</h3>
        </div>
      </div>
    </div>
    
    <!--Music slider-->
    <div class="container-fluid slider Music">
      <section class="p-slider">
        <!--Heading-->
        <h2 class="p-slider-heading">Music</h2>
        <div class="glider-contain">
          <div class="glider">
          <?php 
                    $r = getProAll();
                    foreach ($r2 as $keyDog => $valueFind) {
                        ?>
            <!--ProductBox1-->
            <div class="p-box">
              <div class="p-img-ctn">
                <!--image-->
                <div class="p-img">
                  <a href="#">
                    <!--Front img-->
                    <img src="img/music.webp" class="p-img-front" alt="Front">
                    <!--Backt img-->
                    <img src="img/music.webp" class="p-img-back" alt="">
                  </a>
                </div>
              </div>
              <!--Description-->
              <div class="p-box-text">
                <!--Category-->
                <div class="p-category">
                  <span>Music</span>
                </div>
                <!--Title-->
                <a href="#" class="p-title">
                  Frank Ocean X Piano Ballad Type Beat - "flashlight"
                </a>
                <!--Price-->
                <div class="price">
                  <span class="p-price">
                    100$
                  </span>
                </div>
              </div>
            </div>
            <?php
                        }
                    ?>
          </div>
          <button aria-label="Previous" class="glider-prev">«</button>
          <button aria-label="Next" class="glider-next">»</button>
          <div role="tablist" class="dots"></div>
        </div>
        <a href="index.php?page=showAllProducts" class="more">More Product</a>
      </section>
    </div>

        <?php
    }
?>


<?php

        include "./layout/footer.php";
        ob_end_flush();


        ?>  