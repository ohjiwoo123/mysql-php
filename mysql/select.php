<?php
$conn = mysqli_connect('localhost', 'root','aaos1942','opentutorials');

// 1 row 
echo "<h1>single row</h1>;";
$sql = "SELECT * FROM topic LIMIT 1000";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];

// all row
echo "<h1>multiple rows</h1>;";
$sql = "SELECT * FROM topic LIMIT 1000";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

while($row = mysqli_fetch_array($result)){
    echo '<h2>'.$row['title'].'</h2>';
    echo $row['decription'];
}

?>