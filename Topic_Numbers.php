<?php

// Connection parameters 
include 'Database_Connection.php';

// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

// Listing tables in your database
$query = "SELECT questionTopic, tipTitle, questionTitle FROM Tip RIGHT OUTER JOIN Question ON tipTopic = questionTopic GROUP BY questionTopic;";
$result = mysqli_query($dbcon, $query)
  or die ("Query failed: ". mysqli_error());

print "number of questions and tips per topic:<br>";

// Printing table names in HTML
print '<ul>';

while ($tuple = mysqli_fetch_row($result)) {
   $topic= '<li> Topic: '.$tuple[0].'</li>';
   $question= 'Questions: '.$tuple[2];
   $tip= 'Tips: '.$tuple[1];
   print $topic.$question.' || '.$tip;
}
print '</ul>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 