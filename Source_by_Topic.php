<?php

// Connection parameters 
include 'Database_Connection.php';

// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error($dbcon));
print 'Connected successfully!<br>';

// Getting the input parameter (Tip):
$sTopic= $_REQUEST['topics'];

// Listing registrants for a specific webinar
$query = "SELECT sourceName, sourceTopic FROM NewSource WHERE sourceTopic = '$sTopic'";
$result = mysqli_query($dbcon, $query)
  or die('Show registrants failed: ' . mysqli_error($dbcon));


print "The following are registered for <b>$sTopic</b>: ";

// Printing user attributes in HTML
print '<ul>';
while ($tuple = mysqli_fetch_row($result)) {
   print '<li>'.$tuple[0].'-----> '.$tuple[1].'</li>';
}
print '</ul>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 