<?php

// Connection parameters 
include 'Database_Connection.php';
try{
// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error($dbcon));
print 'Connected successfully!<br>';


$wTitle= $_REQUEST['webinarTitle'];
$time = $_REQUEST['time'];

$query = "UPDATE Webinar SET webinarTime = '$time' WHERE webinarTitle = '$wTitle'";
$result = mysqli_query($dbcon, $query)
  or die('Time Not Updated ' . mysqli_error($dbcon).'<br> <a href="register.html">Try Again</a>');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$query1 = "SELECT * FROM Webinar WHERE webinarTitle = '$wTitle'";
$result = mysqli_query($dbcon, $query1)
  or die('Time Not Updated ' . mysqli_error($dbcon));


while ($tuple = mysqli_fetch_row($result)) {
   print 'Your Webinar Title Was: '.$tuple[0];
   print '<br>Time Changed To: '.$tuple[5];
}
print '</select>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 