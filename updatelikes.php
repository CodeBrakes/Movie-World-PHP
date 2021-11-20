<?php
require('database.php');

$movie_ID =  $_GET['movieID'];

$sqlsearchforuserid= "SELECT user_ID FROM `users` WHERE user_name='".$_GET['userName']."'";
 $result = $conn->query($sqlsearchforuserid);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $userid = $row['user_ID'];
  }
}
              
echo $userid;           

$select = mysqli_query($conn, "select user_ID from `votelist` where `user_ID` = ".$userid." and `movieID` =" . $_GET['movieID']) or exit(mysqli_error($conn));
if(mysqli_num_rows($select)) {
    header('Location: index.php?status=dupvote');
}
else{

$sqlupdate = "UPDATE movies set `Likes` = `Likes`+1 where `serialNo` =". $_GET['movieID'];

$sqlinsert = "INSERT INTO `votelist`(`user_ID`, `movieID`) VALUES ('$userid','$movie_ID')";

if ($conn->query($sqlupdate) === TRUE && $conn->query($sqlinsert) === TRUE) {
  header('Location: index.php?status=login');
}
else {

  echo mysqli_errno($conn->query($sqlupdate));
}

}
$conn->close();




?>