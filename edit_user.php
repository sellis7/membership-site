<?php # Script 9.3 - edit_user.php
/*
*	File:   edit_user.php
*	By:     Shaelyn Ellis
*	Date:   03-01-2014
*
*	This script sets up the means to edit a user
*       through access of edit.inc.php;
*       this page is retrieved back from table.inc.php
*       and now my search.php to make it dynamic
*
*=====================================
*/
$page_title = 'Edit a Member';
include ('includes/header.php');

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.php'); 
	exit();
}

$mytitle= '<h1>Edit a Member</h1>';
$myform="edit_user.php";
require_once ('includes/mysqli_connect.php'); 

include ('includes/edit.inc.php');
include ('includes/footer.php');
?>