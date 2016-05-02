<?php # Script 8.2 - mysqli_connect.php
/*
*	File:   mysqli_connect.php
*	By:     Shaelyn Ellis
*	Date:   03-01-2014
*
*	This script connects to the database and is included 
*       on all pages that need access to the database
*
*=====================================
*/

// Set the database access information as constants:
DEFINE ('DB_USER', 'itp225');
DEFINE ('DB_PASSWORD', 'itp225');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'mod4');

// Make the connection:
$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

?>
