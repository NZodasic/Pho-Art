<?php
global $conn;
if (isset($_POST['login_submit']) && $_POST['fullname'] != '' && $_POST['password'] != '') {
    $fullname = $_POST['fullname'];
    $password = md5($_POST['password']);

    $fullname = mysqli_real_escape_string($conn, $fullname);
    $password = mysqli_real_escape_string($conn, $password);

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

<div class="login-user">

    <form action="" method="POST" id="form-2">

        <h1>Login</h1>

        <label for="Fullname" class="form-label">Username</label>
    
        <input id="Fullname" name="fullname" type="text" placeholder="Username" class="form-control">

        <label for="password" class="form-label">Password</label>

        <input id="password" name="password" type="password" placeholder="Type your password" class="form-control">


                
        <button type="submit" class="form-submit" name="login_submit">Login</button>
        <label for="Forget" class="forget">Forget Password: <a id="Forget" href="forgetpassword.html">Click Here</a></label>

        <div class="account-direct">

            Don't have any account? <a class="account-register" href="index.php?page=register">Create one</a>

        </div>

    </form>
</div>