<?php
    include 'core/controller.php';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Driver Safe | Driver Sign</title>

    <!--================================================= 
    CSS Style 
    =====================================================-->
    <link rel="stylesheet" href="../theme/font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../theme/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../theme/font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../theme/css/driver/sign.css">

</head>

<body style="overflow-x: hidden;">
    <!-- Sign Up / Sign In -->
    <div class="login-wrap">
      <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
        <label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">

          <!-- Log In -->
          <div class="sign-in-htm">
            <form action="" method="post">
              <div class="group">
                <label for="user" class="label">Vehicle Number</label>
                <input id="user" type="text" class="input" name="v_name" placeholder="Enter Vehicle Number" required>
              </div>
              <div class="group">
                <label for="pass" class="label">Password</label>
                <input id="pass" type="password" class="input" name="l_pass" placeholder="Enter Password" required>
              </div>
              <div class="group">
                <label for="check" class="checkbox-inline" style="color: #6a6f8c;"><input id="check" type="checkbox" checked> Keep me Signed in</label>
              </div>
              <div class="group">
                <button type="submit" class="button" name="signin">Sign In</button>
              </div>
            </form>
            <?php
                if(isset($_POST['signin'])) {
                  if($ctrl->signIn($_POST['v_name'], $_POST['l_pass'], $conn)) {
                    ?><script>window.location = 'index';</script><?php
                  } else {
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>  
                    <strong>Warning!</strong> Something Wrong To Login!
                    </div>';
                  }
                }
            ?>
          </div>

          <!-- Sign Up -->
          <div class="sign-up-htm">
            <?php
                if(isset($_POST['signup'])) {
                  if($ctrl->signUp($_POST['fullname'], $_POST['s_pass'], $_POST['s_mob'], $_POST['o_mob'], $_POST['s_v_num'], $_POST['d_l_num'], $conn)) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>  
                    <strong>Success!</strong> Signup Successfully, Please LogIn
                    </div>';
                  } else {
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>  
                    <strong>Warning!</strong> Something Wrong To Signup!
                    </div>';
                  }
                }
            ?>
            <form action="" method="post">
              <div class="group">
                <label for="user" class="label">Full Name</label>
                <input id="user" type="text" class="input" name="fullname" placeholder="Enter Full Name" required>
              </div>
              <div class="group">
                <label for="pass" class="label">Password</label>
                <input id="pass" type="password" class="input" name="s_pass" placeholder="Enter Password" required>
              </div>
              <div class="group">
                <label for="user" class="label">Mobile Number</label>
                <input id="user" type="text" class="input" name="s_mob" placeholder="Enter Mobile Number" required>
              </div>
              <div class="group">
                <label for="user" class="label">Owner Mobile Number</label>
                <input id="user" type="number" class="input" name="o_mob" placeholder="Enter Owner Mobile Number" required>
              </div>
              <div class="group">
                <label for="user" class="label">Vehicle Number</label>
                <input id="user" type="text" class="input" name="s_v_num" placeholder="Enter Vehicle Number" required>
              </div>
              <div class="group">
                <label for="user" class="label">Driver License Number</label>
                <input id="user" type="text" class="input" name="d_l_num" placeholder="Enter Driver License Number" required>
              </div>
              <div class="group">
                <label for="check" class="checkbox-inline" style="color: #6a6f8c;"><input id="check" type="checkbox" checked> I agree to the <a href="#">Terms of Services</a></label>
              </div>
              <div class="group">
                <button type="submit" class="button" name="signup">Sign Up</button>
              </div>
            </form>
            <div class="foot-lnk">
              <label for="tab-1"><a>Already Have Account?</a>
            </div>
          </div>
        </div>
      </div>
    </div><br>

    <!-- =================================================
    Script 
    ======================================================-->
    <script src="../theme/js/jquery-3.3.1.min.js"></script>
    <script src="../theme/css/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>