<?php

// Connection parameters 
include 'Database_Connection.php';
try{
// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error($dbcon));
print 'Connected successfully!<br>';


$wTitle= $_REQUEST['webinarTitle'];
$userName = $_REQUEST['userName'];


$query = "INSERT INTO SignsUp(webinarTitle, registered)
VALUES ('$wTitle', '$userName')";

$result = mysqli_query($dbcon, $query)
  or die('User not registered ' . mysqli_error($dbcon));

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$query1 = "SELECT * FROM SignsUp WHERE webinarTitle = '$wTitle'";
$result = mysqli_query($dbcon, $query1)
  or die('User Not Registered ' . mysqli_error($dbcon));


while ($tuple = mysqli_fetch_row($result)) {
   print 'Your Webinar Was: '.$tuple[0];
   print '<br>'.$tuple[1].' is now registered';
}
print '</select>';
print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 