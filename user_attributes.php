<?php

// Connection parameters 
include 'Database_Connection.php';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error($dbcon));

// Getting the input parameter (Tip):
$user = $_REQUEST['userName'];

// Get the attributes of the tip with the given username
$query = "SELECT personName, joinDate, memberStatus, jobDescription FROM SiteUser WHERE userName = '$user'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

print "User <b>$user</b> has the following atttributes: ";

// Printing user attributes in HTML
print '<ul>';  
while ($tuple = mysqli_fetch_row($result)) {
print '<li> Name: '.$tuple[0].'</li>';
print '<li> Joined On: '.$tuple[1].'</li>';
print '<li> Status: '.$tuple[2].'</li>';
print '<li> Job: '.$tuple[3].'</li>';
print '<hr>';
}
print '</ul>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 