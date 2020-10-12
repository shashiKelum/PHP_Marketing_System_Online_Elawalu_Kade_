<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Result</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/w3css.css" rel="stylesheet">
    </head>
    <body>
        <?php
        //$hint = '';
        include './db.php';
        include './function.php';
        if (isset($_SESSION['user_level']) && !empty($_SESSION['user_level'])) {
            if ($_SESSION['user_level'] == 2) {
                ?>
                <div class="container-fluid" >
                    <?php // echo $hint; ?>
                    <div class="w3-topnav w3-green">
                        <img width="175" height="45" src="images/logo1.png"   alt="logo" style="margin-top:-6px;">
                        <a href="index.php">Home</a>
                        <a href="yalanationalpark.php">Yala National Park</a>
                        <a href="jeepsafari.php">Jeep Safari</a>
                        <a href="activities.php">Nearby Activities</a>
                        <a href="lodging.php">Lodging </a>
                        <a href="booking.php">Book Now</a>
                        <a href="logout.php" style="font-weight: bolder" class="btn btn-default btn-sm">Log Out</a>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><h1>Search Result</h1><h4></h4></div>
                        <div class="col-md-4"></div>
                    </div><hr>
                    <!--...........................................................................-->
                    <?php
                    if (isset($_POST['update'])) {
                        $eml = $_POST['email'];
                        $us = $_POST['us'];

                        if (empty($us)) {
                            echo "<font color='red'>status field is empty.</font><br/>";
                        } else {
                            //updating the  table.....
                            $result = mysql_query("UPDATE safari_booking SET status='$us' WHERE email='$eml'");
                            $result2 = mysql_query("UPDATE safari_package SET status='$us' WHERE email='$eml'");
                            $result3 = mysql_query("UPDATE safari_pickup SET status='$us' WHERE email='$eml'");
                            //delete raw...
                            $result1 = mysql_query("DELETE FROM jeepbooking WHERE email='$eml'");
                            //redirectig back...
                            header("Location: booking.php");
                        }
                    }
                    ?>
                    <?php
//getting id from url
                    $id = $_GET['id'];
//selecting data associated with this particular id
                    $result = mysql_query("SELECT * FROM jeepbooking WHERE email='$id'");
                    while ($res = mysql_fetch_array($result)) {

                        $email = $res['email'];
                        $date = $res['date'];
                        $us = $res['status'];
                    }
                    ?>
                    <form name="form1" method="post">
                        <table class="table table-hover">
                            <tr> 
                                <td><label>Email</label></td>
                                <td><label><?php echo $id; ?></label></td>
                            </tr>
                            <tr> 
                                <td><label>Safari Date</label></td>
                                <td><label><?php echo $date; ?></label></td>
                            </tr>
                            <tr> 
                                <td></td>
                                <td><input  type="hidden" name="us" value=<?php echo $us = "2"; ?> class="form-control"></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="email" value=<?php echo $_GET['id']; ?>></td>
                                <td><input type="submit" name="update" value="Cancel Booking" class="btn btn-default btn-lg btn-block"></td>
                            </tr>
                        </table>
                    </form>




                    <!--........................................................................... -->
                    <?php
                } else if ($_SESSION['user_level'] == 1) {
                    header('location:404.php');
                }
            } else {
                header('location:404.php');
            }
            ?>
        </div>
    </body>
</html>