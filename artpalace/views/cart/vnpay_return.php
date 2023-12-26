<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <?php
        require_once("./function/config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];


        ?>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
               
                <?php
                    if ($secureHash == $vnp_SecureHash) {
                        if ($_GET['vnp_ResponseCode'] == '00') {
                            echo "<h3 style='color:green'>GD Thanh cong</h3>";
                        } else {
                            echo "<h3 style='color:red'>GD Khong thanh cong</h3>";
                        }
                    } else {
                        echo "<h3 style='color:red'>Chu ky khong hop le</h3>";
                    }
                ?>

            </div>

            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>
                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>  

                <div class="form-group">
                    <label >Tổng số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount'] ?></label>
                </div>  
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 

               <?php 
                foreach($cart as $keyID => $valueID){
                    ?>
                        <div class="cart__items">
                            <div class="row">
                                <div class="col-sm-3 col-5">
                                    <img src="./<?php echo $valueID['img']; ?>" alt="" class="cart__items-img">
                                </div>
                                <div class="col-sm-9 col-7">
                                    <h3>
                                    <?php echo $valueID['name']; ?>
                                    </h3>

                                    <br>
                                    <div class="cart__items-pride">
                                        <div class="product__pride-newPride">
                                            <span class="Price">
                                                <bdi>
                                                    <?php echo number_format($valueID['price'] * $valueID['quantity']); ?>
                                                    &nbsp;
                                                    <span class="currencySymbol">₫</span>
                                                </bdi>
                                            </span>
                                        </div>

                                        <div class="cart__items-count">
                                            Số lượng
                                            <?php echo $valueID['quantity']; ?>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>

                        </div>

                    <?php

                }
               ?> 

                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 


            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                    <a href="index.php">Quay lại mua hàng</a>
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
    </body>
</html>
