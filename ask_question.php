<?php

// Connection parameters 
include 'Database_Connection.php';
try{
// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error($dbcon));
print 'Connected successfully!<br>';


$qTitle= $_REQUEST['questionTitle'];
$qTopic = $_REQUEST['questionTopic'];
$userName = $_REQUEST['userName'];
$date = date('Y-m-d');


$query = "INSERT INTO Question(questionTitle, submitUserName, questionTopic, dateSubmitted)
VALUES ('$qTitle', '$userName', '$qTopic', $date)";

$result = mysqli_query($dbcon, $query)
  or die('Question not submitted ' . mysqli_error($dbcon).'<br> <a href="ask_question.html">Try Again</a>');

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$query1 = "SELECT * FROM Question WHERE questionTitle = '$qTitle'";
$result = mysqli_query($dbcon, $query1)
  or die('Question not in database ' . mysqli_error($dbcon));


while ($tuple = mysqli_fetch_row($result)) {
   print 'New Question was Posted: '.$tuple[0];
}
print '</select>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';


Include 'End_Connection.php';
?> 