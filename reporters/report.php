<?php
    include 'core/controller.php';
    if(isset($_SESSION['reporter'])) {
      $rep_id = $_SESSION['reporter'];
    } else {
      ?><script>window.location = 'sign';</script><?php
    }

    $row = $ctrl->getReporterById($rep_id, $conn);

    if(isset($_GET['id'])) {
      $d_id = $_GET['id'];
    }
    $row1 = $ctrl->getDriverById($d_id, $conn);
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

      <h4 style="padding-top: 20px;">Give Report</h4><hr>

      <form action="" method="post">
        <div class="form-group">
          <label>Vehicles Number :</label>
          <input type="text" class="col-md-6 form-control" name="veh" placeholder="Enter Vehicles Number" value="<?php echo $row1['vehicles_num'];?>" required="1">
        </div>
        <div class="form-group">
          <label> Drive License Number :</label>
          <input type="text" class="col-md-6 form-control" name="lic" placeholder="Enter Drive License" value="<?php echo $row1['licence_num'];?>">
        </div>
        <div class="form-group">
          <label> Driver Mobile Number :</label>
          <input type="text" class="col-md-6 form-control" name="mob" id="num" placeholder="Driver Mobile Number" value="<?php echo $row1['mobile_num'];?>">
        </div>
        <div class="form-group">
          <label> Owners Cell Number :</label>
          <input type="text" class="col-md-6 form-control" id="own" name="o_mob" placeholder="Owners Cell Number" value="<?php echo $row1['owner_mob_num'];?>">
        </div>
        <div class="form-group">
          <select class="form-control col-md-6" name="inc_type" id="inci">
            <option disabled selected>Incident Type</option>
            <?php
              $res = $ctrl->getPoints($conn);
              while($row = $res->fetch_assoc()) {
                echo '<option value="'.$row['type_id'].'">'.$row['type_name'].'</option>';
              }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="usr">Location : </label>
          <input type="text" class="col-md-6 form-control" name="loc" placeholder="Enter Location" required="1">
        </div>
        <div class="form-group">
          <label for="usr"> Summary :</label>
          <textarea class="col-md-6 form-control" name="summary" placeholder="Enter Summary"></textarea>
        </div>
        <div class="baton" style="padding-bottom: 20px;">
          <button class="btn btn-success" type="button" name="add" id="sender"> Add </button>
        </div>
      </form>
    </div>
  </div><br>

  <?php
    if(isset($_POST['add'])) {
      if($ctrl->incident($_POST['veh'], $_POST['lic'], $_POST['inc_type'], $_POST['loc'], $_POST['summary'], $rep_id, $conn)) {
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
  <script type="text/javascript">
    document.getElementById('sender').addEventListener("click", check);
    function check() {
        const num = document.querySelector('#num').value;
        const own = document.querySelector('#own').value;
        // const msg = document.querySelector('#msg').value;
        const msg = "Your Driving Points Has Been Deducted From your account. Please login for the details";
        loadData(num, own, msg);
    }

    function loadData(dnum, onum, msg) {
        const number = dnum;
        const ownNum = onum;
        const message = msg;
        (function () {
            var xhr = new XMLHttpRequest();
            var userpass = 'YW1pbnVsLnRlY2huZXh0OlRlc3QxMjM0NQ==';
            var url = "http://api.mimsms.com/sms/1/text/single";
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('Accept', 'application/json');
            xhr.setRequestHeader('Authorization', 'Basic ' + userpass);
            var data = JSON.stringify({
                    "from":"Team Orbs",
                    "to": number,
                    "text": message
                }
            );


            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    console.log(xhr.responseText);
                }
            };

            xhr.send(data);
        })();
        (function () {
            var xhr = new XMLHttpRequest();
            var userpass = 'YW1pbnVsLnRlY2huZXh0OlRlc3QxMjM0NQ==';
            var url = "http://api.mimsms.com/sms/1/text/single";
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('Accept', 'application/json');
            xhr.setRequestHeader('Authorization', 'Basic ' + userpass);
            var data = JSON.stringify({
                    "from":"Team Orbs",
                    "to": ownNum,
                    "text": message
                }
            );


            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    console.log(xhr.responseText);
                }
            };

            xhr.send(data);
        })();

    }
</script>
  
</body>

</html>