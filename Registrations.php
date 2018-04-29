<?php

// Connection parameters 
include 'Database_Connection.php';

// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

// Getting the input parameter (Tip):
$webinar= $_REQUEST['webinarTitle'];

// Listing registrants for a specific webinar
$query = "SELECT registered FROM SignsUp WHERE webinarTitle = '$webinar'";
$result = mysqli_query($dbcon, $query)
  or die('Show registrants failed: ' . mysqli_error($dbcon));


print "The following are registered for <b>$webinar</b>: ";

// Printing user attributes in HTML
print '<ul>';
while ($tuple = mysqli_fetch_row($result)) {
   print '<li>'.$tuple[0].'</li>';
}
print '</ul>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 