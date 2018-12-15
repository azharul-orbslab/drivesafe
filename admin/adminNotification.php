<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Drive Safe</title>
  <!--================================================= 
  CSS Style 
  =====================================================-->
  <link rel="stylesheet" href="../Theme/font/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../Theme/css/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="../Theme/css/responsive.css">
  
</head>

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

  <!-- Admin Notification -->
     <div class="adminNotification acc-content">
            <div class="container">
                    <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4 class="alert-heading">Warning!</h4>
                            <p class="mb-0">Driver's Name <span>Max</span>, license number <span>*2393429</span> had an incident and his number went down to 200 points</p>
                          </div>
            </div>
            <div class="container">
                    <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4 class="alert-heading">Take Action!</h4>
                            <p class="mb-0">Driver's Name <span>Max</span>, license number <span>*2393429</span> had an incident and his number went down to 100 points</p>
                          </div>
            </div>
    </div>
  <!-- Admin Notification End -->

  <!-- =================================================
  Script 
  ======================================================-->
  <script src="../Theme/js/jquery-3.3.1.min.js"></script>
  <script src="../Theme/css/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>