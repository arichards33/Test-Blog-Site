<?php

// Connection parameters 
include 'Database_Connection.php';
try{
// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error($dbcon));
print 'Connected successfully!<br>';


$topic= $_REQUEST['topics'];

$query = "SELECT tipTitle FROM Tip WHERE tipTopic = '$topic'";
$result = mysqli_query($dbcon, $query)
  or die('Time Not Updated ' . mysqli_error($dbcon).'<br> <a href="topic_dropdown.php">Try Again</a>');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
  
while ($tuple = mysqli_fetch_row($result)) {
   print $tuple[0].'<br>';
}

print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 