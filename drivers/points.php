<?php
    include 'core/controller.php';
    if(isset($_SESSION['driver'])) {
      $dri_id = $_SESSION['driver'];
    } else {
      ?><script>window.location = 'sign';</script><?php
    }

    $row = $ctrl->getDriverById($dri_id, $conn);
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
          </ul>
        </div>
      </div>
    </nav>
  </section>
  <!-- Navbar End -->

  <!-- Violence Point -->
  <div class="container violencePoint">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th scope="col">Type of Incident</th>
              <th scope="col">Points</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $res = $ctrl->getPoints($conn);

              while($row = $res->fetch_assoc()) {
            ?>
            <tr>
              <th scope="row"><?php echo $row['type_name'];?></th>
              <td><?php echo $row['point'];?> Points</td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <!-- reporters's Profile End -->
  <!-- ***************************************************
            Script
  *******************************************************-->
  <script src="../theme/js/jquery-3.3.1.min.js"></script>
  <script src="../theme/css/bootstrap/js/bootstrap.min.js"></script>
  
</body>

</html>