<?php

// Connection parameters 
include 'Database_Connection.php';

// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error($dbcon));
print '
<html>
<style>
h1 {
    color: grey;
    font-family: cursive;
    font-size: 500%;
}
p  {
    color:turquoise;
    font-family: calibri;
    font-size: 160%;
    margin: 100px 150px 100px 80px;
}
div {
    background-color: lightgrey;
    width: 800px;
    border: 25px solid lightsalmon;
    padding: 25px;
    margin: 25px;
    display: inline-block;
    text-align: center;
}
button {
    background-color: lightsalmon;
    border: white;
    color: white;
    font-family: calibri;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
}
body {
    background-color: lightgrey;
    margin: 100px 150px 100px 80px;
}

input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: lemonchiffon;
    color: darkslategrey;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 200%;
    font-family: calibri;
}
</style>
<h1 style = "text-align: center;"> Delete Source</h1>
<hr>

<div sytle="align: center;">
<form action="delete_source.php" method="post">';

// Listing tables in your database
$query = "SELECT sourceName FROM NewSource";
$result = mysqli_query($dbcon, $query)
  or die ("Query failed: ". mysqli_error($dbcon));

print "<b>Choose Source to Delete:<br></b>";

// Printing table names in HTML
print '<select name="sources">';
while ($tuple = mysqli_fetch_row($result)) {
   print '<option value="'.$tuple[0].'">'.$tuple[0].'</option>';
}
print '</select>';

print '
<input type="submit" value="Submit">
</form>
</div>';


Include 'End_Connection.php';
?> 