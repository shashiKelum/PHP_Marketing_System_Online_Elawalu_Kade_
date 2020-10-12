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
                        <a href="ad_adminedit.php">Back</a>
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
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $ul = $_POST['ul'];
                        $us = $_POST['us'];
                        if (empty($name) || empty($ul) || empty($us)) {

                            if (empty($name)) {
                                echo "<font color='red'>User Name field is empty.</font><br/>";
                            }

                            if (empty($ul)) {
                                echo "<font color='red'>user level field is empty.</font><br/>";
                            }
                            if (empty($us)) {
                                echo "<font color='red'>status field is empty.</font><br/>";
                            }
                        } else {
                            //updating the users table & pro_pic table.....
                            $result = mysql_query("UPDATE users SET username='$name', user_level='$ul', status='$us' WHERE id=$id");
                            $result1 = mysql_query("UPDATE profile_pic SET status='$us' WHERE id=$id");
                            //redirectig back...
                            header("Location: ad_adminedit.php");
                        }
                    }
                    ?>
                    <?php
//getting id from url
                    $id = $_GET['id'];
//selecting data associated with this particular id
                    $result = mysql_query("SELECT * FROM users WHERE id=$id");
                    while ($res = mysql_fetch_array($result)) {
                        $name = $res['username'];
                        $email = $res['email'];
                        $ul = $res['user_level'];
                        $us = $res['status'];
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <table class="table table-striped">
                                <tr class="success"><td colspan="2"><center><b>HINTS</b></center></td></tr>
                                <tr><td>User Level 1</td><td>Admin</td></tr>
                                <tr><td>User Level 2</td><td>Normal User</td></tr>
                                <tr><td>User Status 1</td><td>Activated User</td></tr>
                                <tr><td>User Status 2</td><td>Deactivated User</td></tr>
                            </table>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <form name="form1" method="post">
                        <table class="table table-hover">
                            <tr> 
                                <td><label>User Name</label></td>
                                <td><input type="text" name="name" value=<?php echo $name; ?> class="form-control"></td>
                            </tr>
                            <tr> 
                                <td><label>Email</label></td>
                                <td><label><?php echo $email; ?></label></td>
                            </tr>
                            <tr> 
                                <td><label>User Level</label></td>
                                <td><input type="text" name="ul" value=<?php echo $ul; ?> class="form-control"></td>
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