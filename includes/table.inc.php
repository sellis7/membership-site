<?php
/*
*	File:   table.inc.php
*	By:     Shaelyn Ellis
*	Date:   02-28-2014
*
*	This script sets up the tabular data display from the database
*       as determined by each php page that calls it (commented out)
*       and paginates based on returned row limits
*
*=====================================
*/

// Number of records to show per page:
$display = 10;

// Determine how many pages there are based on entries (rows)
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
	$pages = $_GET['p'];
} else { // Need to determine.
 	// Count the number of records from table
	$q = "SELECT COUNT(custid) FROM customers";
	$r = mysqli_query ($dbc, $q);
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	$records = $row[0];
	// Calculate the number of pages
	if ($records > $display) { // more rows than variable allowed to display on 1 page
		$pages = ceil ($records/$display);
	} else {    //rows per page is simply 1 page
		$pages = 1;
	}
} // End of p IF.

// Determine where in the database to start returning results
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}

// Make the query:
$q = "SELECT lastname, firstname, address, city, state, zip, custId FROM customers ORDER BY $order_by LIMIT $start, $display";		
$r = mysqli_query ($dbc, $q); // Run the query.

if(mysqli_affected_rows($dbc) == 0) {
    echo '<p class="error">Sorry, having problems accesing database at this time.</p>';
} else if(mysqli_num_rows($r)>0) {

    // if the page being accessed is "sort members"
    if ($page_title == 'Sort Current Members') {
	echo '<table align="center" cellspacing="0" cellpadding="5" width="100%">
	<tr>
	    <th><a href="view_userssort.php?sort=ln">Last Name</a></th>
	    <th><a href="view_userssort.php?sort=fn">First Name</a></th>
	    <th align="left">Address</th>
	    <th><a href="view_userssort.php?sort=ct">City</a></th>
	    <th><a href="view_userssort.php?sort=st">State</a></th>
	    <th><a href="view_userssort.php?sort=zp">Zip</a></th>
	</tr>';
    } else {  // if page being accessed is any page other than to sort
	echo '<table align="center" cellspacing="0" cellpadding="5" width="100%"><tr>';
        // - But if the page being accessed is "edit/delete members"
	if($page_title == 'Edit/Delete Current Members') {
	    echo '<th>Edit</th>
		<th>Delete</th>';
	}
	echo '<th>Last Name</th>
	    <th>First Name</th>
	    <th align="left">Address</th>
	    <th>City</th>
	    <th>State</th>
	    <th>Zip</th>
	</tr>';
    }

    // Fetch and display all the records....
    $bg = '#eeeeee'; 
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { 
	    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee'); //CSS to style every other row
	    echo '<tr bgcolor="' . $bg . '">';
            // If "edit/delete", create links for either action with the ID from the table
	    if($page_title == 'Edit/Delete Current Members') {
		echo '<td align="left"><a href="edit_user.php?id=' . $row['custId'] .'">Edit</a></td>
		    <td align="left"><a href="delete_user.php?id=' . $row['custId'] .'">Delete</a></td>';
	    }  //otherwise, show data passed from each row
	    echo '<td align="left">' . $row['lastname'] . '</td>
		<td align="left">' . $row['firstname'] . '</td>
		<td align="left">' . $row['address'] . '</td>
		<td align="left">' . $row['city'] . '</td>
		<td align="left">' . $row['state'] . '</td>
		<td align="left">' . $row['zip'] . '</td>
	    </tr>';
    } // End of WHILE loop.

    echo '</table>';
    mysqli_free_result ($r);
    mysqli_close($dbc);

    // Make the links to other pages, if necessary.
    if ($pages > 1) {
	    
	    echo '<br /><p>';
	    $current_page = ($start/$display) + 1;
	    
	    // If it's not the first page, make a Previous button:
	    if ($current_page != 1) {
		    echo '<a href="'.$myscript.'?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
	    }
	    
	    // Make all the numbered pages:
	    for ($i = 1; $i <= $pages; $i++) {
		    if ($i != $current_page) {
			    echo '<a href="'.$myscript.'?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
		    } else {
			    echo $i . ' ';
		    }
	    } // End of FOR loop.
	    
	    // If it's not the last page, make a Next button:
	    if ($current_page != $pages) {
		    echo '<a href="'.$myscript.'?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
	    }
	    
	    echo '</p>'; // Close the paragraph.
	    
    } // End of links section.
} else {  // End if r>0, no records returned.
	echo '<p class="error">There are currently no registered members.</p>';
}
?>