<?php # Script 8.6 - view_users.php #2
/*
*	File:   view_user.php
*	By:     Shaelyn Ellis
*	Date:   02-28-2014
*
*	This script retrieves a count from the table
*
*=====================================
*/

$myscript='view_users.php';
$page_title = 'View the Current Members';
include ('includes/header.php');

require_once ('includes/mysqli_connect.php'); // Connect to the db.
		
// Page header:
$q='SELECT COUNT(custId) FROM customers';
$r = mysqli_query ($dbc, $q);
$row = mysqli_fetch_array ($r, MYSQLI_NUM);
$num = $row[0];
//echo "<!-- row=$row -->";
echo '<h1>Registered Members</h1>'.
    "<p class=usercount>There are currently $num registered members.</p>";


$order_by='lastname';	// Define this var for table.inc.php.
$sort='ln';		// Define this var for table.inc.php.
include ('includes/table.inc.php');

include ('includes/footer.php');
?>
