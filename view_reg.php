<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>yala safari</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/w3css.css" rel="stylesheet">
    </head>
    <body>

        <div class="container-fluid" >
            <div class="w3-topnav w3-green">
                <img width="175" height="45" src="images/logo1.png"   alt="logo" style="margin-top:-6px;">
                <i class="fa fa-home w3-large"></i>
                <a href="index.php">Home</a>
                <a href="yalanationalpark.php">Yala National Park</a>
<!--                <a href="camp.php">Camping</a>-->
                <a href="jeepsafari.php">Jeep Safari</a>
                <a href="activities.php">Nearby Activities</a>
                <a href="lodging.php">Lodging </a>
<!--                <a href="drivers.php">Driver/Guides</a>-->
<!--                <a href="booking.php">Book Now</a>     -->
            </div>

            <?php include './db.php'; ?>
            <?php include './db_variables.php'; ?>
            <?php
            /* ----------------------------search All reservations------------------------------------- */

            $query = "SELECT * FROM users ";
            $result = mysql_query($query) or die(mysql_error());

            print " 
<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
<tr> 
<td width=100><b>ID</b></td> 
<td width=100><b>USER NAME</b></td> 
<td width=100><b>E-MAIL</b></td> 
<td width=100><b>NIC</b></td> 
<td width=100><b>COUNTRY</b></td>
</tr>";

            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                print "<tr>";
                print "<td>" . $row['id'] . "</td>";
                //print "<td>" . $row['salute'] . "</td>";
                print "<td>" . $row['username'] . "</td>";
                //print "<td>" . $row['password'] . "</td>";
                print "<td>" . $row['email'] . "</td>";
                print "<td>" . $row['nic'] . "</td>";
                print "<td>" . $row['country'] . "</td>";
                print "</tr>";
            }
            print "</table>";
            ?><br/>
            <a href="admin.php" class="btn btn-default btn-sm">Back to Admin Panel</a>
        </div>
    </body>
</html>
