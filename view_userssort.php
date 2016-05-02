<?php # Script 9.5 - #5

/*
*	File:   view_usersort.php
*	By:     Shaelyn Ellis
*	Date:   02-28-2014
*
*	This script retrieves all the records from the users table
*       but this version allows the results to be sorted in different ways.
*
*=====================================
*/

$myscript='view_userssort.php';
$page_title = 'Sort Current Members';
include ('includes/header.php');
echo '<h1>Registered Members</h1>'.
	'<h2>Click on headings to sort by all except "Address"</h2><br />';

require_once ('includes/mysqli_connect.php');

// Determine the sort...
// Default is by registration date.
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'rd';

// Determine the sorting order:
switch ($sort) {
	case 'ln':
		$order_by = 'lastname ASC';
		break;
	case 'fn':
		$order_by = 'firstname ASC';
		break;
	case 'ct':
		$order_by = 'city ASC';
		break;
	case 'st':
		$order_by = 'state ASC';
		break;
	case 'zp':
		$order_by = 'zip ASC';
		break;

	default:
		$order_by = 'lastname ASC';
		$sort = 'ln';
		break;
}

include ('includes/table.inc.php');

include ('includes/footer.php');
?>
