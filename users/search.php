<?php
    include 'core/controller.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Drive Safe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--================================================= 
    CSS Style 
    =====================================================-->
    <link rel="stylesheet" href="../theme/font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../theme/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../theme/font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../theme/css/general-user/search-result.css">

</head>

<body>

    <?php
        $src = $_POST['src'];
        $res = $ctrl->srcDriver($src, $conn);
    ?>

    <div class="header">
        <section class="index-header">
            <div class="container clearfix index-header-after">
                <div class="row">
                    <div class="col-sm-12">
                        <section class='index-counter clearfix m-t-50'>
                            <form action="search" method="post">
                                <div class="search">
                                    <input type="text" class="form-control input-sm" maxlength="64" name="src" placeholder="Search" required />
                                    <button type="submit" class="btn">Search</button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="search-result">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>Search Result for "<span class="bold"><?php echo $src;?></span>"</h6>
                </div>
                <div class="col-md-12">
                    <section class="src-product">
                        <div class="row">
                            <?php
                                while($row = $res->fetch_assoc()) {
                            ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="thumbnail">
                                                    <div class="thambnail-img">
                                                        <img alt="Driver Pic" src="../theme/images/driver.png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8"> 
                                                <div class="post-content">
                                                    <div class="post-title">
                                                        <span class="bold">Name :</span>
                                                        <span class="bold"><?php echo $row['name'];?></span>
                                                    </div>
                                                    <div class="post-title">
                                                        <span class="bold">Vehicle No :</span>
                                                        <span class="normal"><?php echo $row['vehicles_num'];?></span>
                                                    </div>
                                                    <div class="post-title">
                                                        <span class="bold">Driver Status :</span>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    

    <!-- =================================================
    Script 
    ======================================================-->
    <script src="../theme/js/jquery-3.3.1.min.js"></script>
    <script src="../theme/css/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>