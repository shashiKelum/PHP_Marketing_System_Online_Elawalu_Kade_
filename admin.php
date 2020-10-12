<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel</title>
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
        $hint = '';
        include './db.php';
        include './function.php';

        if (isset($_SESSION['user_level']) && !empty($_SESSION['user_level'])) {
            if ($_SESSION['user_level'] == 1) {
                ?>
                <div class="container-fluid" >
                    <?php echo $hint; ?>
                    <div class="w3-topnav w3-green">
                        <img width="175" height="45" src="images/logo1.png"   alt="logo" style="margin-top:-6px;">
                        <a href="index.php">Home</a>
                        <a href="admin.php">Admin Panel</a>
<!--                        <a href="yalanationalpark.php">Yala National Park</a>
                        <a href="jeepsafari.php">Jeep Safari</a>
                        <a href="activities.php">Nearby Activities</a>
                        <a href="lodging.php">Lodging </a>-->
                        <a href="logout.php" style="font-weight: bolder" class="btn btn-default btn-sm">Log Out</a>
                    </div>
<!--.......................................Admin panel name..................-->
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><h1>Administrator Panel</h1></div>
                        <div class="col-md-4"></div>
                    </div><br/>
<!--.................................buttons.................................-->
                    <div id="admin_buttons" class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="success">
                                <td>
                                    <form method="post" >
                                        <a href="ad_adminedit.php" class="btn btn-default btn-lg btn-block bg-success">UPDATE ALL REGISTRATIONS</a>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" >
                                        <a href="ad_deleteregister.php" class="btn btn-default btn-lg btn-block bg-danger ">DELETE REGISTRATIONS</a>
                                    </form>
                                </td>
                                
                            </tr>
                            <tr class="success">
                                <td>
                                    <form method="post" >
                                        <a href="ad_viewbooking.php" class="btn btn-default btn-lg btn-block bg-success">BOOKING DETAILS</a>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" >
                                        <a href="ad_viewallsafari.php" class="btn btn-default btn-lg btn-block bg-success">VIEW ALL SAFARI BOOKING</a>
                                    </form>
                                </td>
                            </tr>
                            <tr class="success">
                                <td>
                                    <form method="post" >
                                        <a href="ad_jeepactions.php" class="btn btn-default btn-lg btn-block bg-success">ADD/VIEW JEEPS</a>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" >
                                        <a href="ad_updatejeep.php" class="btn btn-default btn-lg btn-block">UPDATE JEEPS</a>
                                    </form>
                                </td>
                                
                            </tr>
<!--                            <tr class="success">
                                <td>
                                    <form action="" method="post" >
                                        <a href="#" class="btn btn-default btn-lg btn-block">btn3</a>
                                    </form>
                                </td>
                                <td>
                                    <form action="" method="post" >
                                        <input type="button" value="btn4" class="btn btn-default btn-lg btn-block" />
                                    </form>
                                </td>
                            </tr>-->
                        </table>
                    </div>
<!--.........................................................................-->
                    <?php
                } else if ($_SESSION['user_level'] == 2) {
                    header('location:404.php');
                }
            } else {
                header('location:404.php');
            }
            ?>
            <br/>

        </div>
    </body>
</html>