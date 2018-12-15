<?php
    include 'core/controller.php';
    if(isset($_SESSION['reporter'])) {
      $rep_id = $_SESSION['reporter'];
    } else {
      ?><script>window.location = 'sign';</script><?php
    }

    if(isset($_POST['input'])) {
      $src = $_POST['input'];
    }

    $res = $ctrl->srcDriver($src, $conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drive Safe | Reporter Profile</title>
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
              <form action="" method="post" class="nav-link">
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
  </section>
  <!-- Navbar End -->

  <section class="search-result mt-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>Search Result for "<span class="bold"><?php echo $src;?></span>"</h6>
                </div>
                <div class="col-md-12">
                    <section class="src-product">
                        <div class="row">
                            <div class="col-md-6">
                              <?php
                                while($row = $res->fetch_assoc()) {
                              ?><a href="driver?profile=<?php echo $row['id'].'&veh='.$row['vehicles_num'];?>">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="thumbnail">
                                                    <div class="thambnail-img">
                                                        <img src="../theme/images/driver.png" alt="Driver">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8"> 
                                                <div class="post-content">
                                                    <div class="post-title">
                                                        <span class="bold">Name :</span>
                                                        <span class="bold"><?php echo $row['name'];?></span>
                                                    </div>
                                                    <br>
                                                    <div class="post-title">
                                                        <span class="bold">Vehicle No :</span>
                                                        <span class="normal"><?php echo $row['vehicles_num'];?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                                <?php
                                  }
                                ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>


  <!-- reporters's Profile End -->
  <!-- ***************************************************
            Script
  *******************************************************-->
  <script src="../theme/js/jquery-3.3.1.min.js"></script>
  <script src="../theme/css/bootstrap/js/bootstrap.min.js"></script>
  
</body>

</html>