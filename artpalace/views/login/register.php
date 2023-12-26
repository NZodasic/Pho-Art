
<div class="main">
<div class="container-register">
      <form action="" method="POST" class="form-login">
        <h2 class="form_title title">Create Account</h2>
        <input id="fullname" name="fullname" class="form__input" type="text" placeholder="Username" required>
        <input id="email" name="email" class="form__input" type="text" placeholder="Your Email Account" required>
        <input id="password" name="password" type="password" placeholder="Password" class="form__input" required>
        <input id="password_confirmation" name="repassword" placeholder="Re-Password" type="password" class="form__input" required>
        <div class="terms-condition">
          <input type="checkbox" id="terms" name="terms" required>
          <label for="terms">I agree to the <a href="./views/terms/term.html">Terms and Conditions</a></label>
        </div>
        <button type="submit" class="form__button button submit" name="register_submit">SIGN UP</button>
        <?php
        global $conn;
        if (isset($_POST['register_submit'])) {
          if ($_POST['fullname'] != '' && $_POST['email'] != '' && $_POST['password'] != ''  && $_POST['repassword'] != '') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $repassword = md5($_POST['repassword']);
            $level = 2;

            $email = mysqli_real_escape_string($conn, $email);
            $sql = "SELECT * FROM dangki WHERE email='$email' ";
            $query = mysqli_query($conn, $sql);
            $password = $password;
            if (mysqli_num_rows($query) > 0) {
              echo "<script>alert('This username account already exists')</script>";
            } else {
              $sql = "INSERT INTO dangki (hoten, email ,matkhau, id_phanquyen) VALUES ('$fullname', '$email', '$password', '$level') ";
              if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registered Successfully')</script>";
                echo "<script>window.location.href = 'index.php?page=login';</script>";
                die();
              } else {
                echo "Error: " . $conn->error;
              }
            }
          } else {
            echo "<script>alert('You shouldn't leave any field blank')</script>";
          }
        } else {

        }
        ?>
      </form>
    </div>

    <div class="des__container-register">
      <h2 class="title">Welcome Back !</h2>
      <p class="description">To keep connected with us please login with your personal info</p>
      <a href="index.php?page=login"><button class="button">Log in</button></a>
    </div>
  </div>
