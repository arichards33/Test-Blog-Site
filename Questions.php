<?php

// Connection parameters 
include 'Database_Connection.php';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

// Getting the input parameter (Tip):
$user = $_REQUEST['questionTitle'];

// Get the attributes of the tip with the given username
$query = "SELECT questionTitle FROM Question WHERE submitUserName = '$user'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result, MYSQL_ASSOC)
  or die("User $user not found!");

print "User <b>$user</b> has submitted the following questions: ";

// Printing user attributes in HTML
print '<ul>';  
print '<li> Question: '.$tuple['questionTitle'];
print '</ul>';

Include 'End_Connection.php';
?> 