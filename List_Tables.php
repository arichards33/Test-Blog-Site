<?php

// Connection parameters 
include 'Database_Connection.php';

// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

// Listing tables in your database
$query = 'SHOW TABLES';
$result = mysqli_query($dbcon, $query)
  or die('Show tables failed: ' . mysqli_error());

print "The tables in $database database are:<br>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysqli_fetch_row($result)) {
   print '<li>'.$tuple[0].'</li>';
}
print '</ul>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 