<?php
global $conn;
if (isset($_POST['login_submit']) && $_POST['fullname'] != '' && $_POST['password'] != '') {
    $fullname = $_POST['fullname'];
    $password = md5($_POST['password']);

    $fullname = mysqli_real_escape_string($conn, $fullname);
    $password = mysqli_real_escape_string($conn, $password);
// library from frw sanitize func single responsibility
    $sql = "SELECT * FROM dangki WHERE hoten = '$fullname' AND matkhau = '$password' ";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['fullname'] = $fullname;

        $_SESSION['email'] = $row['email'];

        if ($row['id_phanquyen'] == 2) {
            header("Location: index.php?pape=home");
        }
        if ($row['id_phanquyen'] == 1) {
            $_SESSION['admin'] = 1;
            header("Location: index.php?page=admin");
        }
        if ($row['id_phanquyen'] == 3) {
            $_SESSION['staff'] = 3;
            header("Location: index.php?page=admin");
        }
    } else {
        echo "<script>alert('Wrong password or account')</script>";
    }

} else {
}
?>
<div class="main">
      <div class="container-login">
        <form action="" method="POST" class="form-login">
          <h2 class="title">Log in to Website</h2>
          <input id="Fullname" name="fullname" class="form__input" type="text" placeholder="Username">
          <input id="password" name="password" class="form__input" type="password" placeholder="Password">
          <a class="form__link" href="#">Forgot your password?</a>
          <button type="submit" name="login_submit" class="button">LOG IN</button>
        </form>
      </div>
        <div class="des__container">
          <h2 class="title">Hello Friend !</h2>
          <p class="description">Enter your personal details and start journey with us</p>
          <a href="index.php?page=register"><button class="button">SIGN UP</button></a>
        </div>
    </div>
</div>
