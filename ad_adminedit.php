<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Users</title>
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
                        <a href="logout.php" style="font-weight: bolder" class="btn btn-default btn-sm">Log Out</a>
                    </div>

                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><center><h1>UPDATE USERS</h1></center></div>
                        <div class="col-md-4"></div>
                    </div><hr>
                    <!--...........................................................................-->
                    <?php
                    //fetching data in descending order (lastest entry first)
                    $result = mysql_query("SELECT * FROM users ORDER BY id DESC");
                    ?>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <form method="post" action="ad_search.php">
                                <select name="catsearch" class="form-control">
                                    <option value="">Select Category</option>
                                    <option>User Name</option>
                                    <option>NIC</option>
                                    <option>Email</option>
                                    <option>Admin=1 or user=2</option>
                                    <option>Active=1 or Deactivated=2</option>
                                </select>
                                <input type="text" name="txtsearch" placeholder="Type to Search" class="form-control" />
                                <input type="submit" name="cmdsearch" value="Search" class="btn btn-default" />
                            </form><br/>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <table class="table table-hover">
                        <tr class="table success">
                            <td><b>Name</b></td>
                            <td><b>NIC/Passport</b></td>
                            <td><b>Email</b></td>
                            <td><b>Reg.Date</b></td>
                            <td><b>Action</b></td>
                        </tr>
                        <?php
                        while ($res = mysql_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $res['username'] . "</td>";
                            echo "<td>" . $res['nic'] . "</td>";
                            echo "<td>" . $res['email'] . "</td>";
                            echo "<td>" . $res['date'] . "</td>";
                            echo "<td><a href=\"ad_edituser.php?id=$res[id]\" class='btn btn-default'>Update Info</a></td>";//get
                            // | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
                            //?id=$res[id]
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