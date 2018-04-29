<?php

// Connection parameters 
include 'Database_Connection.php';
try{
// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error($dbcon));
print 'Connected successfully!<br>';


$wTitle= $_REQUEST['webinarTitle'];


$query = "DELETE FROM SignsUp Where webinarTitle = '$wTitle'";
$result = mysqli_query($dbcon, $query)
  or die('Webinar Not Deleted ' . mysqli_error($dbcon).'<br> <a href="delete_webinardropdown.php">Try Again</a>');

$query1 = "DELETE FROM Webinar Where webinarTitle = '$wTitle'";
$result = mysqli_query($dbcon, $query1)
  or die('Webinar Not Deleted' . mysqli_error($dbcon).'<br> <a href="delete_webinardropdown.php">Try Again</a>');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$query2 = "SELECT * FROM Webinar WHERE webinarTitle = '$wtitle'";
$result = mysqli_query($dbcon, $query2)
  or die('User not in database ' . mysqli_error($dbcon));


while ($tuple = mysqli_fetch_row($result)) {
   print 'The following webinar was deleted: '.$tuple[0];
}


print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 