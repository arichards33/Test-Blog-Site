<?php

// Connection parameters 
include 'Database_Connection.php';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

// Getting the input parameter (user):
$user = $_REQUEST['user'];

// Get the attributes of the user with the given username
$query = "SELECT personName, memberStatus, DOB, joinDate FROM SiteUser WHERE userName = '$user'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result, MYSQL_ASSOC)
  or die("User $user not found!");

print "User <b>$user</b> has the following attributes:";

// Printing user attributes in HTML
print '<ul>';  
print '<li> Email: '.$tuple['personName'];
print '<li> Full name: '.$tuple['memberStatus'];
print '<li> Gender: '.$tuple['DOB'];
print '<li> Age: '.$tuple['joinDate'];
print '</ul>';

// Free result
mysqli_free_result($result);

Include 'End_Connection.php';
?> 