<?php
$conn = mysqli_connect('localhost', 'root','aaos1942','opentutorials');

settype($_POST['id'], 'integer');
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn,$_POST['description'])
);

$sql = "UPDATE topic SET title ='{$filtered['title']}', description ='{$filtered['description']}' WHERE id = {$filtered['id']}";
$result = mysqli_query($conn, $sql);
if($result === false){
    echo 'There is Fucking Error';
    error_log(mysqli_error($conn));
} else {
    echo 'Success <a href="index.php">돌아가기</a>';
}
?>