<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Users</title>
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

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><h1>Administrator Panel</h1><h4>(Registration Actions)</h4></div>
                        <div class="col-md-4"></div>
                    </div><hr>
                    <!--.................view All registration...................................-->
                    <div id="viewreg" class="table-responsive" >
                        <?php
                        include './db_variables.php';
                        $query = "SELECT * FROM users WHERE user_level=2 ORDER BY id DESC ";
                        $result = mysql_query($query) or die(mysql_error());
                        ?>

                        <table class="table table-bordered table-hover">
                            <tr><td colspan="5" class="table alert-success"><h3> <b>ALL REGISTERED USERS</b></h3></td></tr>
                            <tr> 
        <!--                                <td width=100><b>ID</b></td> -->
                                <td width=100><b>USER NAME</b></td> 
                                <td width=100><b>E-MAIL</b></td> 
                                <td width=100><b>NIC</b></td> 
                                <td width=100><b>COUNTRY</b></td>
                                <td width=100><b>Reg.DATE</b></td>
                            </tr>
                            <?php
                            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                print "<tr>";
                                //print "<td>" . $row['id'] . "</td>";
                                //print "<td>" . $row['salute'] . "</td>";
                                print "<td>" . $row['username'] . "</td>";
                                //print "<td>" . $row['password'] . "</td>";
                                print "<td>" . $row['email'] . "</td>";
                                print "<td>" . $row['nic'] . "</td>";
                                print "<td>" . $row['country'] . "</td>";
                                print "<td>" . $row['date'] . "</td>";
                                print "</tr>";
                            }
                            ?>
                        </table>
                    </div><hr>
                    <!--...................................delete users..........................-->
                    <?php
                    include './db_variables.php';
                    //view all *users only*..........
                    $queryData = mysql_query("SELECT * FROM users WHERE user_level=2 ORDER BY id DESC") or die(mysql_error());

                    if (isset($_GET['delete'])) {
                        $multiple = $_GET['multiple'];
                        $i = 0;
                        $sql = "DELETE FROM users"; //delete query selection
                        //$sql1 = "DELETE FROM profile_pic"; //delete query selection
                        foreach ($multiple as $item_id) {
                            $i ++;
                            if ($i == 1) {
                                $sql .=" WHERE id= " . mysql_real_escape_string($item_id) . "";
                                //$sql1 .=" WHERE id= " . mysql_real_escape_string($item_id) . "";
                            } else {
                                $sql .= " OR id= " . mysql_real_escape_string($item_id) . "";
                                //$sql1 .= " OR id= " . mysql_real_escape_string($item_id) . "";
                            }
                        }
                        mysql_query($sql) or die(mysql_error());
                        header("location: " . $_SERVER['PHP_SELF']);
                        exit();
                    }
                    ?>
                    <?php if (mysql_num_rows($queryData) > 0): ?>
                        <!-- Display The Data -->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                            <table width="100%" class="table table-bordered table-hover">
                                <thead>
                                    <tr><td colspan="5" class="table alert-success"><h3><b>DELETE USERS</b> Today : <?php echo date('D, d M Y'); ?></h3></td></tr>
                                    <tr>
                                        <td><b>NO</b></td>
                                        <td><b>USER NAME</b></td>
                                        <td><b>E MAIL</b></td>
                                        <td><b>Reg.DATE</b></td>
                                        <td align="center">
                                            <div>
                                                <input type="submit" name="delete" value="Delete"  id="delete" class="btn btn-danger" />
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysql_fetch_assoc($queryData)) { ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['date']      ?></td>

                                            <td align="center">
                                                <input type="checkbox" name="multiple[]" value="<?php echo $row['id']; ?>">
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </form>
                    <?php else: ?>
                        <h2>No data to display</h2>
                    <?php endif; ?>
                    <hr>




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