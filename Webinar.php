<?php

// Connection parameters 
include 'Database_Connection.php';

// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

// Listing tables in your database
$query = "SELECT webinarTitle FROM Webinar";
$result = mysqli_query($dbcon, $query)
  or die ("Query failed: ". mysqli_error());

print "The webinars available are:<br>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysqli_fetch_row($result)) {
   print '<li>'.$tuple[0].'</li>';
}
print '</ul>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 