<?php

// Connection parameters 
include 'Database_Connection.php';

// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

// Listing tables in your database
$query = "SELECT sourceName, typeOf FROM NewSource";
$result = mysqli_query($dbcon, $query)
  or die ("Query failed: ". mysqli_error());

print "Please see resources below:<br>";

print '<ul>';
while ($tuple = mysqli_fetch_row($result)) {
   print '<li>'.$tuple[0].'-----> '.$tuple[1].'</li>';
}
print '</ul>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';

include 'End_Connection.php';

?> 