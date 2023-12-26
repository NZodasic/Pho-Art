<?php include "./layout/header.php"; ?>
<?php
include "cartFunction.php";
?>
<div class="cart__body">
<form method="POST" action="" id="getinfo_form" enctype="application/x-www-form-urlencoded">
<section class="h-100 h-custom">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="col">
      <?php 
                        if(!empty($cart)){
                            foreach($cart as $keyID => $valueID){
                                ?>
        <div class="table-responsive card shadow-2-strong mb-5 mb-lg-0">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="h5">Shopping Bag</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            
            <tbody>
              
              <tr>
                <th scope="row" class="border-bottom-0">
                  <div class="d-flex align-items-center">
                    <img src="./<?php echo $valueID['img']; ?>" 
                    class="img-fluid rounded-3"
                      style="width: 120px;" alt="Book">
                    <div class="flex-column ms-4">
                      <p class="mb-2"><?php echo $valueID['name']; ?></p>
                    </div>
                  </div>
                </th>
                <td class="align-middle border-bottom-0">
                  <div class="d-flex" style="margin-left: 25px">
                    <?php echo $valueID['quantity']; ?>
                  </div>
                </td>
                <td class="align-middle border-bottom-0">
                  <p class="mb-0" style="font-weight: 500;">
                  <?php echo number_format($valueID['price'] * $valueID['quantity']); ?>₫
                </p>
                </td>
                <td>
              <a href="index.php?page=cartdelete&id=<?php echo $valueID['id']; ?>" class="delete_cart" onclick="return confirm('Confirm delete operation?')"> 
              <svg style="margin-top: 25px" xmlns="http://www.w3.org/2000/svg" width="23" height="23"  fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>

              </svg>

                </td>
              </tr>


            </tbody>
          </table>


          <?php
                                $_SESSION['giasp'] = total_price($cart);
        
                            }
                        }
                        else{
                            ?>
                            <div class="emptyCart">
                                <p>Emty Cart Bruhhh</p>
                            </div>
                            <?php
                        }

                    ?>  
        </div>









        <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
          <div class="card-body p-4">

            <div class="row">
              <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="op1" id="op1"
                        value="" aria-label="..." checked required />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <img src="https://inkythuatso.com/uploads/thumbnails/800/2021/12/vnpay-logo-inkythuatso-01-13-16-29-51.jpg" style="height: auto; width:40px" alt="">
                        VNPay Wallet
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="op1" id="op3"
                        value="" aria-label="..." required />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                      <img src="https://img.mservice.com.vn/app/img/portal_documents/mini-app_design-guideline_branding-guide-1-2.png" style="height: auto; width:40px" alt="">
                        MoMo Wallet
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="op1" id="op2"
                        value="" aria-label="..." required />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                      <img src="https://static.vecteezy.com/system/resources/previews/003/020/747/large_2x/cash-on-delivery-badge-ilustration-free-vector.jpg" style="height: auto; width:40px" alt="">
                        Cash On Delivery
                      </p>
                    </div>
                  </div>
              </div>




              
              <div class="col-md-6 col-lg-4 col-xl-6">
                <div class="row">
                  <div class="col-12 col-xl-6">
                  <?php
                  if (isset($_SESSION['email'])) {
                    ?>
                      <div class="form-outline mb-4 mb-xl-5">
                          <input type="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>" 
                          class="form-control form-control-lg" siez="17"/>
                          <label class="form-label" for="typeName">Email</label>
                        </div>
                        <div class="form-outline mb-4 mb-xl-5">
                          <input type="text" name="hoten" placeholder="Full Name" 
                          class="form-control form-control-lg" siez="17" required/>
                          <label class="form-label" for="typeName">Name</label>
                        </div>
                        <div class="form-outline mb-4 mb-xl-5">
                          <input type="number" name="sdt" placeholder="Phone Number"
                          class="form-control form-control-lg" siez="17"/>
                          <label class="form-label" for="typeName">Phone Number</label>
                        </div>
                                                <?php
                  } else {
                    ?>
                    <div class="form-outline mb-4 mb-xl-5">
                          <input type="email" placeholder="Email" class="form-control form-control-lg" siez="17"/>
                          <label class="form-label" for="typeName">Email</label>
                        </div>
                        <div class="form-outline mb-4 mb-xl-5">
                          <input type="text" placeholder="Full Name"class="form-control form-control-lg" siez="17"/>
                          <label class="form-label" for="typeName">Name</label>
                        </div>
                        <div class="form-outline mb-4 mb-xl-5">
                          <input type="number" placeholder="Phone Number"  class="form-control form-control-lg" siez="17"/>
                          <label class="form-label" for="typeName">Phone Number</label>
                        </div>
                  <?php
                  }
                  ?>
                  </div>


                  <div class="col-12 col-xl-6">
                    <div class="form-outline mb-4 mb-xl-5">
                    <select style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 2;color: #212529;-webkit-appearance: none;-moz-appearance: none;appearance: none;background-color: #fff;background-clip: padding-box;border:  1px solid #dee2e6;border-radius: 0.5rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
" name="calc_shipping_provinces" required>
                    <option value="">Tỉnh/Tp</option>
                    </select>
                      <label class="form-label" for="typeText">Province / City</label>
                    </div>

                    <div class="form-outline mb-4 mb-xl-5">
                    <select style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 2;color: #212529;-webkit-appearance: none;-moz-appearance: none;appearance: none;background-color: #fff;background-clip: padding-box;border:  1px solid #dee2e6;border-radius: 0.5rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
" name="calc_shipping_district" required>
                    <option value="">Tỉnh/Tp</option>
                    </select>
                      <label class="form-label" for="typeText">Province / City</label>
                    </div>

                    <input class="billing_address_1" name="tinh" type="hidden" value="">
                    <input class="billing_address_2" name="xa" type="hidden" value="">
                    
                    
                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeText" name="sonha" class="form-control form-control-lg" siez="17"
                        placeholder="Address" minlength="30" maxlength="30" />
                      <label class="form-label" for="typeText">Address</label>
                    </div>

                    <input type="hidden" Checked="True" id="bankCode" name="bankCode" value="">

                    <input type="hidden" id="language" Checked="True" name="language" value="vn">
                    <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="amount" type="hidden" value="<?php echo total_price($cart); ?>" />



                  </div>

                </div>

              </div>
          
              <div class="col-lg-4 col-xl-3">
                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-2">Subtotal</p>
                  <p class="mb-2">
                    <?php echo number_format(total_price($cart)); ?>₫
                  </p>
                </div>

                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-0">Shipping</p>
                  <p class="mb-0">48,440 vn₫ </p>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                  <p class="mb-2">Total (tax included)</p>
                  <p class="mb-2">
                  <?php echo number_format((total_price($cart) +48440)); ?>₫
                  </p>
                </div>

                
                <button onclick="window.location.href='./index.php';"  type="button" class="btn btn-outline-info">
                  Back To Shopping
                </button>
                <button type="submit" class="buy btn btn-outline-info" name="order" id="order" type="submit">
                  Checkout
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
</div>
<!-- Giohang -->


<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<script>
    //chuyen khoan vnpay
    $('#op1').click(function() {
        $('#order').attr('name', 'ordervnpay');
        $('#getinfo_form').attr('action', '/artpalace/index.php?page=vnpay_create_payment');
        
    });
    //chuyen khoan momo
    $('#op3').click(function() {
        $('#order').attr('name', 'ordermomo');
        $('#getinfo_form').attr('action', '/artpalace/index.php?page=thanhtoanmomo');
        
    });

    //cod
    $('#op2').click(function() {
        $('#order').attr('name', 'order');
    });
</script>
<?php

        include "./layout/footer.php";
        ob_end_flush();


        ?>