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
                        <a href="#" class="nav-link">
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

            <!-- Incident -->
            <div class="acc-content pt-10">
                <h4>Incidents</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control col-md-12" name="inc_type">
                              <option disabled selected>Incident Type</option>
                              <?php
                                $res = $ctrl->getPoints($conn);
                                while($row = $res->fetch_assoc()) {
                                  echo '<option value="'.$row['type_id'].'">'.$row['type_name'].'</option>';
                                }
                              ?>
                            </select>
                          </div>
                    </div>
                      <div class="col-md-4">
                        <form action="" method="post">
                          <div class="form-group">
                              <input type="text" class="col-md-12 form-control" placeholder="Enter Place" name="place" required="1">
                          </div>
                      </div>
                      <div class="col-md-2">
                            <button type="submit" class="btn" name="search">Search</button>
                      </div>
                      </form>
                    </div><hr>


                    <div class="col-md-12">
                      <?php
                        $count = 0;
                        $res1 = $ctrl->getIncident($conn);
                        while($row1 = $res1->fetch_assoc()) {
                          $count++;
                      ?>
                        <div class="driverHistory">
                          <h5>Incident <?php echo $count++; ?> :</h5><hr>
                
                          <center>
                            <div class="row" class="historyInfo">
                              <div class="col-md-2">
                                <p><i class="fa fa-calendar-alt"> Date</i></p>
                                <p><?php echo $row1['date'];?></p>
                              </div>
                              <div class="col-md-2">
                                <p><i class="fa fa-clock"> Time</i></p>
                                <p><?php echo $row1['time'];?></p>
                              </div>
                              <div class="col-md-2">
                                <p><i class="fa fa-map"> Location</i></p>
                                <p><?php echo $row1['place'];?></p>
                              </div>
                              <div class="col-md-2">
                                  <p><i class="fa fa-star"> Incident Type</i></p>
                                  <p><?php $ctrl->getIncidentTypeById($row1['incident_type_id'], $conn);?></p>
                                </div>
                                <div class="col-md-2">
                                  <p><i class="fa fa-star"> Reduced Point</i></p>
                                  <p><?php $ctrl->getIncidentPointById($row1['incident_type_id'], $conn);?> points</p>
                                </div>
                              </div>
                            </div>
                          </center><hr>

                          <p><b>Summary: </b> <?php echo $row1['summary'];?></p>
                        </div>
                        <?php
                          }
                        ?>
                    </div>
              
            <!-- Incident End -->

             <!-- =================================================
  Script 
  ======================================================-->
  <script src="../Theme/js/jquery-3.3.1.min.js"></script>
  <script src="../Theme/css/bootstrap/js/bootstrap.min.js"></script>
</body>