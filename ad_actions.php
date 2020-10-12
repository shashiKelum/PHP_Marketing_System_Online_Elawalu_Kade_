<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Jeep Actions</title>
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


                    <div class="w3-topnav w3-green">
                        <img width="175" height="45" src="images/logo1.png"   alt="logo" style="margin-top:-6px;">
                        <a href="index.php">Home</a>
                        <a href="admin.php">Admin Panel</a>
                        <a href="logout.php" style="font-weight: bolder" class="btn btn-default btn-sm">Log Out</a>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><h1>Administrator Panel</h1></div>
                        <div class="col-md-4"></div>
                    </div><hr>

                    <!--.....................................add jeep............................-->
                    <div class="row" id="addjeep" style="margin-top: 20px">
                        <h3 class="text-center text-uppercase">Enter Jeeps Here</h3>
                        <div class="col-md-1"></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-8">

                            <form method="post" >
                                <table>
                                    <tr>
                                        <td>Jeep No :</td>
                                        <td><input name="j_no" class="form-control" type="text" id="formGroupInputSmall" placeholder="Vehicle Number of Jeep" >
                                    </tr>
                                    <tr>
                                        <td>Jeep Type :</td>
                                        <td><select name="j_type" class="form-control input-sm" >
                                                <option value="">Select Jeep type</option>
                                                <option value="normal jeep">Normal jeep</option>
                                                <option value="luxury jeep">Luxury jeep</option>
                                            </select></td>
                                    </tr>

                                    <tr><td></td><td>
                                            <input type="submit" name="submit" value="submit" class="btn btn-default btn-lg btn-block"/></td></tr>
                                    <tr><td></td><td>
                                            <input value="Clear" type="reset" class="btn btn-default btn-lg btn-block"/></td></tr>
                                    <?php echo $hint; ?>
                                </table>
                            </form>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-1"></div>
                    </div><hr>

                    <?php
                    if (isset($_POST['submit'])) {
                        $jno = $_POST['j_no'];
                        $jtype = $_POST['j_type'];

                        if (empty($jno) or empty($jtype)) {
                            $hint = "Fields Can't be Empty";
                        } else {
                            $sqlquery1 = "INSERT INTO jeep_info (j_no,j_type,j_status) VALUES('$jno','$jtype','1')";
                            $db = new db();
                            $db->insertData($sqlquery1);
                            $hint = "Successfuly Added!";
                        }
                    }
                    ?>
                    <!--.................................view jeeps..............................-->
                    <div class="row table-responsive " id="viewjeeps">

                        <div class="col-md-2">                        </div>
                        <div class="col-md-8">
                            <h3 class="text-center text-uppercase">Jeeps</h3>
        <?php
        include './db_variables.php';
        $query = "SELECT * FROM jeep_info ";
        $result = mysql_query($query) or die(mysql_error());
        ?>
                            <table class="table table-hover table-bordered">
                                <tr class="success">
                                    <td width=100><b>JEEP NO</b></td>
                                    <td width=100><b>JEEP TYPE</b></td>
                                    <td width=100><b>STATUS</b></td>
                                </tr>
        <?php
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            print "<tr>";
            print "<td>" . $row['j_no'] . "</td>";
            print "<td>" . $row['j_type'] . "</td>";
            print "<td>" . $row['j_status'] . "</td>";
            print "</tr>";
        }
        ?>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <br/><br/>
                            <div class="alert alert-warning" role="alert"> 1 = Active Jeep</div>
                            <div class="alert alert-warning" role="alert"> 2 = Deactivated Jeep</div>
                        </div>

                    </div><hr>


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