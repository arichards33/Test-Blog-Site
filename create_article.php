<?php

// Connection parameters 
include 'Database_Connection.php';
try{
// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';


$username = $_REQUEST['userName'];
$tiptitle = $_REQUEST['tipTitle'];
$tiptopic = $_REQUEST['tipTopic'];
$resource = $_REQUEST['resource'];
$articletitle = $_REQUEST['articleTitle'];
$typeof = $_REQUEST['typeOf'];
$datepublished = date(Y-m-d);


$query = "INSERT INTO Article (articleTitle, typeOf, views) VALUES ('$articletitle', '$typeof', 0);";
$result = mysqli_query($dbcon, $query)
  or die('Article Not Added<br>' .mysqli_error($dbcon).'<br> <a href="create_article.html">Try Again</a>');


$query1 = "INSERT INTO Tip (tipTitle, postUserName, tipTopic, subTopic, datePublished, resource, approvedBy, hasArticle,
hasVideo, modifiedBy, modifiedDate) VALUES ('$tiptitle', '$username', '$tiptopic', NULL, '$datepublished', '$resource', 'arichards', 
'$articletitle', NULL, NULL, NULL)"; 
$result = mysqli_query($dbcon, $query1)
  or die('Tip Not Added' . mysqli_error($dbcon).'<br> <a href="create_article.html">Try Again</a>');

}
 catch(PDOException $e)
     {
     echo $sql . "<br>" . $e->getMessage();
    }

$query1 = "SELECT * FROM Article WHERE articleTitle = '$articletitle'";
$result = mysqli_query($dbcon, $query1)
  or die('Article not in database ' . mysqli_error($dbcon));


while ($tuple = mysqli_fetch_row($result)) {
   print 'New Article was Added: '.$tuple[0];
}
print '</select>';

print '<br><a href="FinalSite.html">Return to Main Page </a>';

Include 'End_Connection.php';
?> 