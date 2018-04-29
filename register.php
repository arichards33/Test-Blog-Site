<?php

// Connection parameters 
include 'Database_Connection.php';
try{
// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error($dbcon));
print 'Connected successfully!<br>';


$username = $_REQUEST['userName'];
$password = $_REQUEST['personPassword'];
$dateOfBirth = $_REQUEST['DOB'];
$job = $_REQUEST['jobDescription'];
$name = $_REQUEST['personName'];
$date = date('Y-m-d');


$query = "INSERT INTO SiteUser(userName, personName, personPassword, jobDescription, memberStatus, 
joinDate, DOB) VALUES ('$username', '$name', '$password', '$job', 'member', '$date', '$dateOfBirth')";
print $query;
$result = mysqli_query($dbcon, $query)
  or die('Registration Failed: ' . mysqli_error($dbcon).'<br> <a href="register.html">Try Again</a>');

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$query1 = "SELECT * FROM SiteUser WHERE userName = '$username'";
$result = mysqli_query($dbcon, $query1)
  or die('Time Not Updated ' . mysqli_error($dbcon));


while ($tuple = mysqli_fetch_row($result)) {
   print 'New account was created for: '.$tuple[0];
}
print '</select>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';


Include 'End_Connection.php';
?> 