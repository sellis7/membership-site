<?php
/*
*	File:   search.php
*	By:     Shaelyn Ellis
*	Date:   03-01-2014
*
*	This script generates a searchable form and returns the results
*       as a table similar in style to other tables
*
*=====================================
*/

echo '<link rel="stylesheet" href="includes/style.css" type="text/css"  />';
$page_title = 'Search for members';
?>
    <!-- the searchable form -->
<head>
	<title><?php echo $page_title; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
    <div id="wrapper">
	<div id="header">
		<h1>Art + Design</h1>
                <h2><i>membership pages</i></h2>
	</div>
       <div id='srcForm'>
        <h2>Member Search</h2>
         <form name="search" method="post" action="search.php">
         <p><br />
             Search for: <input type="text" name="find" /> by 
            <Select NAME="field">
            <Option VALUE="lname">Last Name</option>
            <Option VALUE="ste">State</option>
            </Select>
            <input type="hidden" name="searching" value="yes" />
            <input type="submit" name="search" value="Search" />
         </p>
         </form>
    </div>
<!-- The above HTML code creates the form your users will use to search. 
It provides a space to enter what they are looking for, and a drop down menu 
where they can choose what field they are searching (first name, last name or profile.) 
The form sends the data back to itself -->

<div id="content">
<?php
//This is only displayed if they have submitted the form 
 //we had a hidden field that sets this variable to "yes" when submitted. This line checks for that. 
 //If the form has been submitted then it runs the PHP code, if not it just ignores the rest of the coding.
 if ($_POST['searching'] =="yes") { 
    echo "<h2>Results</h2><p>"; 
 //If they did not enter a search term we give them an error
    if ($_POST['find'] == "") { 
    echo "<p>You forgot to enter searchable data."; 
    exit; 
    } else { //assign text field entry to a variable to search database
        $find = $_POST['find'];
        //connect to database
        require_once ('includes/mysqli_connect.php');
        //trim any excess spaces in field
        $find = trim ($find); 
        if ($_POST['field'] == 'lname'){
            //search by last name
            $field = 'last name';
            // WHERE the the field they choose is LIKE their search string. 
            //We use upper () here to search the uppercase version of the fields. 
            $sql = "SELECT * FROM customers WHERE UPPER(lastname) LIKE '$find'";
            $result=mysqli_query($dbc, $sql); 
        } else {
            //search by state, same as described above
            $field = 'state';
            $sql = "SELECT * FROM customers WHERE UPPER(state) LIKE '$find'";
            $result=mysqli_query($dbc, $sql);
        }        
    }
 //This counts the number or results
 $anymatches=mysqli_num_rows($result); 
 //If the number is 0, it means that no results were found.
 if ($anymatches == 0) {
    echo "Sorry, but we can not find an entry to match your search<br><br>"; 
 } //otherwise, display the results 
echo "<table align='center' cellspacing='0' cellpadding='5' width='100%'>
    <th>Modify entry?</th>
        <th>Last Name</th>
	    <th>First Name</th>
	    <th align='left'>Address</th>
	    <th>City</th>
	    <th>State</th>
	    <th>Zip</th>
	</tr>";
 while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
     $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee'); //CSS to style every other row
            echo '<tr bgcolor="' . $bg . '">
                <td align="left"><a href="edit_user.php?id=' . $row['custId'].'">Edit</a>
                    or <a href="delete_user.php?id=' . $row['custId'] .'">Delete</a></td>
                <td align="left">' . $row['lastname'] . '</td>
		<td align="left">' . $row['firstname'] . '</td>
		<td align="left">' . $row['address'] . '</td>
		<td align="left">' . $row['city'] . '</td>
		<td align="left">' . $row['state'] . '</td>
		<td align="left">' . $row['zip'] . '</td>
	    </tr>';
        }
        echo "</table>";
        mysqli_close($dbc);
 //Remind user what was searched for 
 echo "<p><b>Searched For:</b> ".$field
         ." - ".$find."</p>"; 
    }
// attach footer to make page look consistent
include ('includes/footer.php');
?>