<?php
    include 'core/controller.php';
    if(isset($_SESSION['reporter'])) {
      $rep_id = $_SESSION['reporter'];
    } else {
      ?><script>window.location = 'sign';</script><?php
    }

    $row = $ctrl->getReporterById($rep_id, $conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drive Safe | Driver Profile</title>
    <!--================================================= 
    CSS Style 
    =====================================================-->

    <link rel="stylesheet" href="../theme/font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../theme/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../theme/font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../theme/css/reporters/reporters-profile.css">
</head>

<body class="reportersBody" style="overflow-x: hidden">

  <!-- NavBar -->
  <section class="top-nav">
    <nav class="navbar navbar-expand-md navbar-color navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="index">Drive Safe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse">
          <span><i class="fa fa-th"></i></span>
        </button>
        <div class="collapse navbar-collapse text-center clear" id="collapse">
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
              <a href="report" class="nav-link">
                <span class="modtitle">Add Report</span>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="rules" class="nav-link">
                <span class="modtitle">Traffic Rules</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="points" class="nav-link">
                <span class="modtitle">Point of Violence</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout" class="nav-link">
                <span class="modtitle">Logout</span>
              </a>
            </li>
            <div class="row">
              <div class="col-md-10">
                <li class="nav-item">
              <form action="srcResult" method="post" class="nav-link">
                <div class="form-group">
                  <input type="text" class="ml-auto form-control" name="input" placeholder="Search Driver Profile" required>
                </div>
            </li>
              </div>
              <div class="col-md-2">
                <li class="nav-item nav-link">
                  <button class="btn btn-primary" type="submit" name="src">Search</button>
                </li>
                </form>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </section><br>
  <!-- Navbar End -->

  <!-- Edit Driver's Profile -->
  <div class="col-sm-8 col-md-10 editDriverProfile container" style="background: #fff;">
    <div class="container">

      <h4 style="padding-top: 20px;">Edit Your Profile</h4><hr>

      <form action="" method="post">
        <div class="form-group">
          <label for="usr">Name:</label>
          <input type="text" class="col-md-6 form-control" name="name" placeholder="Enter Full Name" value="<?php echo $row['name'];?>" required="1">
        </div>
        <div class="form-group">
          <label for="usr"> User Name:</label>
          <input type="text" class="col-md-6 form-control" name="user" placeholder="Enter Username" value="<?php echo $row['username'];?>" required="1">
        </div>
        <div class="form-group">
          <label for="usr">Location:</label>
          <input type="text" class="col-md-6 form-control" name="place" placeholder="Enter New Location" value="<?php echo $row['place'];?>" required="1">
        </div>
        <div class="baton" style="padding-bottom: 20px;">
          <button class="btn btn-warning" role="button" name="update"> Update </button>
        </div>
      </form>
    </div>
  </div><br>

  <?php
    if(isset($_POST['update'])) {
      if($ctrl->updateProfile($rep_id, $_POST['name'], $_POST['user'], $_POST['place'], $conn)) {
        echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>  
          <strong>Success!</strong>Update Successful!
          </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>  
          <strong>Warning!</strong> Something Wrong To Update!
          </div>';
      }
    }
  ?>

  <!-- reporters's Profile End -->
  <!-- ***************************************************
            Script
  *******************************************************-->
  <script src="../theme/js/jquery-3.3.1.min.js"></script>
  <script src="../theme/css/bootstrap/js/bootstrap.min.js"></script>
  
</body>

</html>