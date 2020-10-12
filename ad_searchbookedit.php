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
            if ($_SESSION['user_level'] == 1) {
                ?>
                <div class="container-fluid" >
                    <?php // echo $hint; ?>
                    <div class="w3-topnav w3-green">
                        <img width="175" height="45" src="images/logo1.png"   alt="logo" style="margin-top:-6px;">
                        <a href="index.php">Home</a>
                        <a href="admin.php">Admin Panel</a>
                        <a href="ad_viewbooking.php">Back</a>
                        <a href="logout.php" style="font-weight: bolder" class="btn btn-default btn-sm">Log Out</a>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><h1>Search bookings</h1><h4></h4></div>
                        <div class="col-md-4"></div>
                    </div><hr>
                    <!--...........................................................................-->
                    <?php
                    if (isset($_POST['update'])) {
                        $id = $_POST['id'];
                        $us = $_POST['us'];
                        
                        if (empty($us)) {
                            echo "<font color='red'>status field is empty.</font><br/>";
                        } else {
                            //updating tables.....
                            $result = mysql_query("DELETE FROM jeepbooking WHERE email='$id' ");
                            
                            $result1 = mysql_query("UPDATE safari_booking SET status='$us' WHERE email='$id' ");
                            $result2 = mysql_query("UPDATE safari_package SET status='$us' WHERE email='$id' ");
                            $result3 = mysql_query("UPDATE safari_pickup SET status='$us' WHERE email='$id' ");    
                            //redirectig back...
                            header("Location: ad_viewbooking.php");
                        }
                    }
                    ?>
                    <?php
//getting id from url
                    $id = $_GET['id'];
//selecting data associated with this particular id
                    $result = mysql_query("SELECT * FROM jeepbooking WHERE email='$id' ");
                    while ($res = mysql_fetch_array($result)) {
                        $jeep = $res['j_no'];
                        $email = $res['email'];
                        $date = $res['date'];
                        $booked = $res['booked'];
                        $us = $res['status'];
                    }
                    ?>
                   
                    <form name="form1" method="post">
                        <table class="table table-hover">
                            <tr> 
                                <td><label>Email</label></td>
                                <td><label><?php echo $email; ?></label></td>
                            </tr>
                            <tr> 
                                <td><label>Jeep</label></td>
                                <td><label><?php echo $jeep; ?></label></td>
                            </tr>
                            <tr> 
                                <td><label>Date</label></td>
                                <td><label><?php echo $date; ?></label></td>
                            </tr>
                            <tr> 
                                <td><label>Date</label></td>
                                <td><label><?php echo $booked; ?></label></td>
                            </tr>
                            <tr> 
                                <td><label>User Status</label></td>
                                <td><input type="text" name="us" value=<?php echo $us; ?> class="form-control"></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                                <td><input type="submit" name="update" value="Update" class="btn btn-default btn-lg btn-block"></td>
                            </tr>
                        </table>
                    </form>

                    <!--...........................................................................-->
                    <?php
                } else if ($_SESSION['user_level'] == 2) {
                    header('location:404.php');
                }
            } else {
                header('location:404.php');
            }
            ?>
        </div>
    </body>
</html>