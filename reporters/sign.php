<?php
    include 'core/controller.php';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporters</title>

    <!--================================================= 
    CSS Style 
    =====================================================-->
    <link rel="stylesheet" href="../theme/font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../theme/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../theme/font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../theme/css/reporters/reporters-sign.css">

</head>

<body style="overflow-x: hidden;">
    <!-- Sign Up / Sign In -->
    <div class="login-wrap">
      <div class="login-html">
        <label for="" class="tab">Sign In</label>
        <div class="login-form">
          <!-- Log In -->
          <div class="sign-in-htm">
            <form action="" method="post">
              <div class="group">
                <label for="user" class="label">Username</label>
                <input id="user" type="text" class="input" name="r_user" placeholder="Enter Username" required>
              </div>
              <div class="group">
                <label for="pass" class="label">Password</label>
                <input id="pass" type="password" class="input" name="r_pass" placeholder="Enter Password" required>
              </div>
              <div class="group">
                <label for="check" class="checkbox-inline" style="color: #6a6f8c;">
                <input id="check" type="checkbox" checked> Keep me Signed in</label>
              </div>
              <div class="group">
                <button type="submit" class="button" name="r_signin">Sign In</button>
              </div>
            </form>
          </div>
          <?php
            if(isset($_POST['r_signin'])) {
              if($ctrl->r_signIn($_POST['r_user'], $_POST['r_pass'], $conn)) {
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
      </div>
    </div>

    <!-- =================================================
    Script 
    ======================================================-->
    <script src="../theme/js/jquery-3.3.1.min.js"></script>
    <script src="../theme/css/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>