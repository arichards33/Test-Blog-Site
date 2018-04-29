<?php

// Connection parameters 
include 'Database_Connection.php';
try{
// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error($dbcon).'<br> <a href="delete_webinardropdown.php">Try Again</a>');
print 'Connected successfully!<br>';


$sourcename= $_REQUEST['sources'];


$query = "DELETE FROM NewSource WHERE sourceName = '$sourcename'";
$result = mysqli_query($dbcon, $query)
  or die('Source Not Deleted ' . mysqli_error($dbcon).'<br> <a href="delete_webinardropdown.php">Try Again</a>');

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$query1 = "SELECT sourceName FROM NewSource WHERE sourceName = '$sourcename'";
print $query1;
$result = mysqli_query($dbcon, $query1)
  or die('Source not in database ' . mysqli_error($dbcon));


while ($tuple = mysqli_fetch_row($result)) {
   print 'Source: '.$tuple[0].' was deleted';
}


print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 