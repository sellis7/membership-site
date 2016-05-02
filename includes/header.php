<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="includes/style.css" type="text/css"  />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
    <?php
/*
*	File:   header.php
*	By:     Shaelyn Ellis
*	Date:   03-01-2014
*
*	This script acts as header to entire site, 
*       included on almost every page. I completely modified this. 
*
*=====================================
*/
?>
<body>
    <div id="wrapper">
	<div id="header">
		<h1>Art + Design</h1>
                <h2><i>membership pages</i></h2>
	</div>
	<div id="navigation">
		<ul>
			<li><a href="index.php">Home Page</a></li>
			<li><a href="start.php">Log-in or Register</a></li>
			<li><a href="changepassword.php">Change your password</a></li>
			<li><a href="view_users.php">List all members</a></li>
                        <li><a href="edit_deleteusers.php">Edit or delete members</a></li>
			<li><a href="view_userssort.php">Sort members</a></li>
		</ul>
	</div>
        <div class="search">
            <p>
                <a href="search.php">Search members >></a>
            </p>
        </div>
    <?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
    ?>
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 3.2 - header.html -->
