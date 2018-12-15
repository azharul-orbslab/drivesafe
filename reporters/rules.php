<?php
    include 'core/controller.php';
    if(isset($_SESSION['reporter'])) {
      $rep_id = $_SESSION['reporter'];
    } else {
      ?><script>window.location = 'sign';</script><?php
    }
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
  </section>
  <!-- Navbar End -->

  <!-- Traffic Rules -->
  <div class="container trafficRules">
    <h4>Basic Rules of the Road</h4>
    <ul>
      <li>Keep left and allow the vehicles from the opposite direction to pass.</li>
      <li>Give way to traffic on your right, especially at junctions and round-abouts.</li>
      <li>While turning right, keep vehicles on the right lane.</li>
      <li>While turning left, keep to the left side of the road.</li>
      <li>Slow down at road junctions, intersections and pedestrian crossings. You must also slow down near school zones, temple areas etc., where a lot of pedestrians and vehicle move.Use proper indicators to turn left or right.</li>
      <li>Always use a helmet if you are driving a two-wheeler and see that when you use the helmet, the strap is fixed properly.</li>
      <li>Stick to the speed limit and keep in mind that speed limit is related to the traffic condition.</li>
      <li>Remember that the distance to stop your vehicle depends on the speed at which you are driving.</li>
      <li>Keep adequate distance from the vehicle ahead to avoid collision.</li>
      <li>At road junctions or intersections, do not park the vehicle beyond the stop line.</li>
      <li>Remember that at pedestrian crossings, the pedestrian has the right of way.</li>
      <li>At the signal, do not stop your vehicle on the Pedestrian Crossing but stop it within the stop line.</li>
      <li>Two wheelers are meant only for two.</li>
      <li>Do not start on the yellow light. Wait for the green.</li>
      <li>Overtake only on the right side and do not overtake on bridges, narrow roads, junctions, school zones and pedestrian crossings. Do not overtake when one vehicle is already overtaking the vehicle that you want to overtake.</li>
      <li>Never drive carelessly.</li>

    </ul>
  </div>

  <!-- reporters's Profile End -->
  <!-- ***************************************************
            Script
  *******************************************************-->
  <script src="../theme/js/jquery-3.3.1.min.js"></script>
  <script src="../theme/css/bootstrap/js/bootstrap.min.js"></script>
  
</body>

</html>