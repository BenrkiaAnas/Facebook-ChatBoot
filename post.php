<?php
require_once("./elements/getPost.php");
global $connection;
$post_id = mysqli_real_escape_string($connection,$_GET["id"]);
$post_one = mysqli_fetch_assoc(findByPostId($post_id));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Post</title>
</head>
<body>
<h1>Details Of Post</h1>

<table style='width: 100%;border: 1px solid #000;padding: 15px;border-collapse:collapse;border-spacing:5px'>
    <tr>
        <th>Post ID</th>
        <th>Created Time</th>
    </tr>
    <tr>
        <td style='border: 1px solid #000;text-align:center'><?php echo $post_one['post_id']; ?></td>
        <td style='border: 1px solid #000;text-align:center'><?php echo $post_one['created_time']; ?></td>

    </tr>
</table>

</body>
</html>

