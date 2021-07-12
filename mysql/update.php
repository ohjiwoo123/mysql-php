<?php
$conn = mysqli_connect('localhost', 'root','aaos1942','opentutorials');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while ($row = mysqli_fetch_array($result)){
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
    'title'=> 'Welcome',
    'description'=> 'Hello, web'
);
$upqdate_link = '';
if(isset($_GET['id'])) {
$filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM topic WHERE id={$filtered_id}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$article['title'] = htmlspecialchars($row['title']);
$article['description'] = htmlspecialchars($row['description']);

$update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WEB</title>
</head>
<body>
    <h1><a href="index.php">WEB</h1>
    <ol>
 <?=$list?>
    </ol>
 <form action="process_update.php" method="POST">
 <input type="hidden" name="id" value="<?=$_GET['id']?>">
 <p><input type = "text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
 <p><textarea name="description" placeholder="description"><?=$article['description']?></textarea></p>
 <p><input type="submit"></p>
 </form>
</body>
</html>