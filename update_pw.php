<?php

// Connection parameters 
include 'Database_Connection.php';
try{
// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error($dbcon));
print 'Connected successfully!<br>';


$username= $_REQUEST['userName'];
$newpassword = $_REQUEST['personPasswordNew'];
$oldpassword = $_REQUEST['personPasswordOld'];


$query = "UPDATE SiteUser SET personPassword = $newpassword WHERE userName = '$username' AND personPassword = '$oldpassword'";
$result = mysqli_query($dbcon, $query)
  or die('Password Not Updated Successfully' . mysqli_error($dbcon).'<br> <a href="update_pw.html">Try Again</a>');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$query1 = "SELECT * FROM SiteUser WHERE userName = '$username'";
$result = mysqli_query($dbcon, $query1)
  or die('User not in database ' . mysqli_error($dbcon));


while ($tuple = mysqli_fetch_row($result)) {
   print 'Password was updated for: '.$tuple[0];
}
print '</select>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 