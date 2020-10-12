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
                        <div class="col-md-4"><h1>Search Result</h1><h4></h4></div>
                        <div class="col-md-4"></div>
                    </div><hr>
                    <!--...........................................................................-->
                    <center><h1></h1></center>
                    <table class="table table-hover">
                        <tr class="table success">
                            <td>Email</td>
                            <td>JEEP NO</td>
                            <td>SAFARI DATE</td>
                            <td>SAFARI TYPE</td>
                            <td>BOOKED DATE</td>
                        </tr>

                        <?php
                        $text = $_POST['txtsearch'];
                        if ($text == "") {
                            echo "<div class='bg-danger'>Please Insert Data!!!</div>" . "<br>";
                            echo "<a href='ad_viewbooking.php' class='btn btn-default'><b>Go Back</b></a>";
                        }
                        ?>
                        <?php
                        $cat = $_POST['catsearch'];
                        $search = $_POST['txtsearch'];
                        ?>
                        <?php
                        if ($cat == "Email") {
                            $id = mysql_query("SELECT * FROM jeepbooking WHERE email='$search'");
                            ?>
                            <?php
                            while ($di = mysql_fetch_array($id)) {
                                ?>

                                <tr>
                                    <td><?php echo $di[0]; ?></td>
                                    <td><?php echo $di[1]; ?></td>
                                    <td><?php echo $di[2]; ?></td>
                                    <td><?php echo $di[3]; ?></td>
                                    <td><?php echo $di[4]; ?></td>
                                    <?php echo "<td><a href=\"ad_searchbookedit.php?id=$di[0]\" class='btn btn-default'>Update Info</a></td>"; //get ?>
                                </tr>
                                <?php
                            }
                        } else if ($cat == "JEEP NO") {
                            $na = mysql_query("SELECT * FROM jeepbooking WHERE j_no like '" . $search . "%'");
                            ?>
                            <?php
                            while ($an = mysql_fetch_array($na)) {
                                ?>
                                <tr>
                                    <td><?php echo $an[0]; ?></td>
                                    <td><?php echo $an[1]; ?></td>
                                    <td><?php echo $an[2]; ?></td>
                                    <td><?php echo $an[3]; ?></td>
                                    <td><?php echo $an[4]; ?></td>
                                    <?php echo "<td><a href=\"ad_searchbookedit.php?id=$an[0]\" class='btn btn-default'>Update Info</a></td>"; //get ?>
                                </tr>
                                <?php
                            }
                            ?>
                            <?php
                        } else if ($cat == "DATE") {
                            $add = mysql_query("SELECT * FROM jeepbooking WHERE date like '" . $search . "%'");
                            ?>
                            <?php
                            while ($dda = mysql_fetch_array($add)) {
                                ?>
                                <tr>
                                    <td><?php echo $dda[0]; ?></td>
                                    <td><?php echo $dda[1]; ?></td>
                                    <td><?php echo $dda[2]; ?></td>
                                    <td><?php echo $dda[3]; ?></td>
                                    <td><?php echo $dda[4]; ?></td>

                                    <?php echo "<td><a href=\"ad_searchbookedit.php?id=$dda[0]\" class='btn btn-default'>Update Info</a></td>"; //get ?>
                                </tr>
                                <?php
                            }
                        } else if ($cat == "SAFARI TYPE") {
                            $add = mysql_query("SELECT * FROM jeepbooking WHERE safaritype like '" . $search . "%'");
                            ?>
                            <?php
                            while ($dda = mysql_fetch_array($add)) {
                                ?>
                                <tr>
                                    <td><?php echo $dda[0]; ?></td>
                                    <td><?php echo $dda[1]; ?></td>
                                    <td><?php echo $dda[2]; ?></td>
                                    <td><?php echo $dda[3]; ?></td>
                                    <td><?php echo $dda[4]; ?></td>

                                    <?php echo "<td><a href=\"ad_searchbookedit.php?id=$dda[0]\" class='btn btn-default'>Update Info</a></td>"; //get ?>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>






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