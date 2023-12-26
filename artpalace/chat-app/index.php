<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Realtime Chat App</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" class="form-control" name="password" id="password-input" autocomplete="off"placeholder="Password" aria-autocomplete="list" aria-label="Password">
          <div class="password-meter">
                    <div class="meter-section rounded me-2"></div>
                    <div class="meter-section rounded me-2"></div>
                    <div class="meter-section rounded me-2"></div>
                    <div class="meter-section rounded">
          </div>
          <i class="fas fa-eye"></i>
        </div>

        
        <div class="addimg">
                <label class="title">Avatar</label>
                <div class="img">   
                    <label class="input" for="inputfile">
                        <div class="addbtn">
                            <img src="" alt="" id="p-pic">
                            <div class="addicon"><span>+</span><br>Add avatar</div>
                        </div>
                    </label>
                    <input type="file" name="image" accept="img/jpeg, img/jpg, img/png" id="inputfile">
                </div>
            </div>


        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>
  <script>
        let addicon = document.querySelector('.addicon');
        let pic = document.getElementById('p-pic');
        let inputfile = document.getElementById('inputfile');
        inputfile.onchange = function(){
            pic.src = URL.createObjectURL(inputfile.files[0]);
            addicon.style.display = 'none'
        }
    </script>
</body>
</html>
