<div class="register-user">

    <form action="" method="POST" id="form-1">

      <h1>Create Account</h1>

      <label for="fullname">Username</label>
      <input id="fullname" name="fullname" type="text" placeholder="Username" class="form-control">

      <label for="email" >Email</label>
      <input id="email" name="email" type="email" placeholder="Your Email Account" class="form-control">

      <label for="password" >Password</label>
      <input id="password" name="password" type="password" placeholder="Type Your Password" class="form-control">

      <label for="password_confirmation" >Re-Type Your Password</label>
      <input id="password_confirmation" name="repassword" placeholder="Re-Type Your Password" type="password" class="form-control">

      <div class="terms-condition">
        <input type="checkbox" id="terms" name="terms" required>
        <label for="terms">I agree to the <a href="terms.html">Terms and Conditions</a></label>
      </div>


      <div class="account-direct">

          Already have account?<a class="account-register" href="index.php?page=login"> Login now</a>

      </div>

        <button type="submit" class="form-submit" name="register_submit">Đăng ký</button>

        <?php
        global $conn;
        if (isset($_POST['register_submit'])) {
          if ($_POST['fullname'] != '' && $_POST['email'] != '' && $_POST['password'] != '' && $_POST['repassword'] != '') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $repassword = md5($_POST['repassword']);
            $level = 2;

            $email = mysqli_real_escape_string($conn, $email);
            $sql = "SELECT * FROM dangki WHERE email='$email' ";
            $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {
              echo "<script>alert('Account already exists')</script>";
            } else {
              $sql = "INSERT INTO dangki (hoten, email ,matkhau, id_phanquyen) VALUES ('$fullname', '$email', '$password', '$level') ";

              if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registered Successfully')</script>";
                header('Location: index.php?page=login');
                die();
              } else {
                echo "Error: " . $conn->error;
              }
            }
          } else {
            echo "<script>alert('Information must not be left blank')</script>";
          }
        }
        ?>
    </form>
</div>