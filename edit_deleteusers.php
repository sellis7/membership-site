<?php # Script 8.6 - view_users.php #2
/*
*	File:   edit_user.php
*	By:     Shaelyn Ellis
*	Date:   03-01-2014
*
*	This script sets up the means to delete a user
*       through access of table.inc.php;
*       this page is retrieved back from table.inc.php
*       and now my search.php to make it dynamic
*
*=====================================
*/

$myscript='edit_deleteusers.php';  //
$page_title = 'Edit/Delete Current Members';
include ('includes/header.php');

require_once ('includes/mysqli_connect.php'); // Connect to the db.

// run a query to locate the ID of customer table
$q='SELECT COUNT(custId) FROM customers';
// return the results as a row
$r = @mysqli_query ($dbc, $q);
$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
// establish variable of id num based on row index, and pass this
$num = $row[0];
echo '<h1>Registered Members</h1>'.
    "<p class=usercount>There are currently $num registered users.</p>\n";

$order_by='lastname';	// Define this var for table.inc.php.
$sort='ln';		// Define this var for table.inc.php.
include ('includes/table.inc.php');

include ('includes/footer.php');
?>
