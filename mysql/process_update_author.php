<?php
$conn = mysqli_connect('localhost', 'root','aaos1942','opentutorials');

settype($_POST['id'], 'integer');
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'name'=>mysqli_real_escape_string($conn, $_POST['name']),
    'profile'=>mysqli_real_escape_string($conn,$_POST['profile'])
);

$sql = "UPDATE author SET name ='{$filtered['name']}', profile ='{$filtered['profile']}' WHERE id = {$filtered['id']}";
$result = mysqli_query($conn, $sql);
if($result === false){
    echo 'There is Fucking Error';
    error_log(mysqli_error($conn));
} else {
    header('Location: author.php?id='.$filtered['id']);
}
?>