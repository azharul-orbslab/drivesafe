<?php
  include 'core/controller.php';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Drive Safe</title>
  <!--================================================= 
  CSS Style 
  =====================================================-->
  <link rel="stylesheet" href="../theme/font/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../theme/css/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="../theme/css/responsive.css">

</head>

<body>
  <!-- Side Nav -->

  <body class="points_table_scrollbar" style="overflow-x: hidden;">
      <section class="top-nav">
      <nav class="navbar navbar-expand-md navbar-color navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="index">Drive Safe</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse">
            <span><i class="fa fa-th"></i></span>
          </button>
          <div class="collapse navbar-collapse text-center clear" id="collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <span class="nav-title">Hi, John Deo</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout" class="nav-link">
                  <span class="nav-title">Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>

    <!-- Account Section -->
    <section class="profile-nav">
      <div class="nav-side-menu">
        <div class="brand">Drive Safe</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
          <ul id="menu-content" class="menu-content collapse out">

            <li data-toggle="collapse" data-target="#start" class="collapsed active">
              <a href="#">
                <i class="fa fa-rocket fa-lg"></i>User <span class="arrow"></span>
              </a>
            </li>
            <ul class="sub-menu collapse" id="start">
              <li>
                <a href="logout">
                    Logout
                  </a>
              </li>
              <li>
                <a href="index">
                    User
                  </a>
              </li>
            </ul>
            <li class="collapsed">
              <a href="reporter"><i class="fa fa-user fa-lg"></i> Reporter </a>
            </li>
            <li class="collapsed">
              <a href="incident"><i class="fa fa-window-maximize fa-lg"></i> Incident <span class="badge badge-danger">1</span> </a>
            </li>
            <li class="collapsed">
              <a href="incidentType"><i class="fa fa-window-maximize fa-lg"></i> Types of Incident</a>
            </li>
            <li class="collapsed">
              <a href="driverInfo"><i class="fa fa-exchange fa-lg"></i> Driver Info </a>
            </li>
            <li class="collapsed">
              <a href="adminNotification">
                  <i class="fa fa-flag-checkered"></i> Notification <span class="badge badge-danger">2</span> </a>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- Side Nav End -->

    <!-- Create Reporter -->
    <div class="acc-content">
      <div class="createReporter">
        <div class="col-sm-8 col-md-10">
          <div class="container">
            <form action="" method="post">
              <div class="form-group">
                <label for="usr">Full Name:</label>
                <input type="text" class="col-md-6 form-control" name="name" placeholder="Enter Full Name" required="1">
              </div>
              <div class="form-group">
                <label for="usr">Username:</label>
                <input type="text" class="col-md-6 form-control" name="user" placeholder="Enter username" required="1">
              </div>
              <div class="form-group">
                <label for="usr">Password:</label>
                <input type="password" class="col-md-6 form-control" name="pass" placeholder="Enter Password" required="1">
              </div>
              <div class="form-group">
                <label for="usr">Location:</label>
                <input type="text" class="col-md-6 form-control" name="place" placeholder="Enter Location" required="1">
              </div>

              <div class="baton">
                <button class="btn" type="submit" name="save"> Save </button>
              </div>
            </form>
            <?php
              if(isset($_POST['save'])) {
                if($ctrl->createReporter($_POST['name'], $_POST['user'], $_POST['pass'], $_POST['place'], $conn)) {
                  echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>  
                  <strong>Success!</strong> Create Reporter Successfully!
                  </div>';
                } else {
                  echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>  
                  <strong>Warning!</strong> Something Wrong To Create Reporter!
                  </div>';
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Create Reporter End -->

    <!-- =================================================
  Script 
  ======================================================-->
    <script src="../Theme/js/jquery-3.3.1.min.js"></script>
    <script src="../Theme/css/bootstrap/js/bootstrap.min.js"></script>
  </body>