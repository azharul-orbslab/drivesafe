<?php
    include 'core/controller.php';
    if(isset($_SESSION['reporter'])) {
      $rep_id = $_SESSION['reporter'];
    } else {
      ?><script>window.location = 'sign';</script><?php
    }

    if(isset($_GET['profile'])) {
      $dri_id = $_GET['profile'];
    }

    if(isset($_GET['veh'])) {
      $veh = $_GET['veh'];
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
  </section>
  <!-- Navbar End -->

  <!-- Driver's Profile -->
  <div class="container-fluid reportersProfile">
    <div class="row">

      <div class="col-md-4">

        <div class="reporters ml-auto">
          <img class="reportersImg ml-auto" src="../theme/images/driver.png" alt="Driver" width="200px">
          <p><span><i class="fa fa-user"> Name:</i></span> <?php echo $row['name'];?></p>
          <p><span><i class="fa fa-car"> Vehicle Number:</i></span> <?php echo $row['vehicles_num'];?></p>
          <p><span><i class="fa fa-id-card"> License Number:</i></span><?php echo $row['licence_num'];?></p>
          <p><span><i class="fa fa-mobile"> Phone Number:</i></span> <?php echo $row['mobile_num'];?></p>
          <p><span><i class="fa fa-phone"> Owner's Phone Number:</i></span> <?php echo $row['owner_mob_num'];?></p>
          <p><span><i class="fa fa-star"> Reporterss Point:</i></span> <?php echo $row['points'];?></p>
          <p><span><i class="fa fa-bars"> Reporters's Current Status:</i></span>
              <?php
                if($row['points'] >= 450) {
                  echo '<span class="badge badge-success">Excellent</span>';
                } else if($row['points'] >= 300 && $row['points'] <= 449) {
                  echo '<span class="badge badge-primary">Safe</span>';
                } else if($row['points'] >= 150 && $row['points'] <= 299) {
                  echo '<span class="badge badge-warning">Guilty</span>';
                } else if($row['points'] >= 1 && $row['points'] <= 149) {
                  echo '<span class="badge badge-danger">Dangerous</span>';
                }
                else if($row['points'] <= 0) {
                  echo '<span class="badge badge-dark">Runaway</span>';
                }
              ?>
          </p>
          <p><a href="report?id=<?php echo $dri_id;?>" class="btn btn-danger btn-block">Report</a></p>
        </div> <!-- /.reporters -->
      </div> <!--/.col-md-4-->
      <div class="col-md-8">
        <div class="reportersHistory">
          <h3>History</h3>
        </div>

        <?php
          $count = 0;
          $res1 = $ctrl->getIncidentByVehicle($veh, $conn);
          while($row1 = $res1->fetch_assoc()) {
            $count++;
        ?>
        <div class="reportersHistory">
          <h5>Incident <?php echo $count;?> :</h5>
          <hr>

          <div class="row" class="historyInfo">
            <div class="col-md-2">
              <p><i class="fa fa-calendar-alt"> Date</i></p>
              <p><?php echo $row1['date'];?></p>
            </div>
            <div class="col-md-2">
              <p><i class="fa fa-clock"> Time</i></p>
              <p><?php echo $row1['date'];?></p>
            </div>
            <div class="col-md-2">
              <p><i class="fa fa-map"> Place</i></p>
              <p><?php echo $row1['place'];?></p>
            </div>
            <div class="col-md-3">
              <p><i class="fa fa-star"> Incident Type</i></p>
              <p><?php $ctrl->getIncidentTypeById($row1['incident_type_id'], $conn);?></p>
            </div>
            <div class="col-md-3">
              <p><i class="fa fa-star"> Reduced Point</i></p>
              <p><?php $ctrl->getIncidentPointById($row1['incident_type_id'], $conn);?> points</p>
            </div>
          </div><!-- /.historyInfo -->
          <hr>
          <p><b>Summary: </b> <?php echo $row1['summary'];?></p>
        </div> <!-- /.reportersHistory -->
        <?php
          }
        ?>
      </div> <!--/.col-md-8-->
    </div> <!--/.row-->
  </div>

  <!-- reporters's Profile End -->
  <!-- ***************************************************
            Script
  *******************************************************-->
  <script src="../theme/js/jquery-3.3.1.min.js"></script>
  <script src="../theme/css/bootstrap/js/bootstrap.min.js"></script>
  
</body>

</html>