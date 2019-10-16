<?php
require_once("./elements/getComment.php");
global $connection;
$comment_id = mysqli_real_escape_string($connection,$_GET["id"]);
$comment_one = mysqli_fetch_array(findByCommentIdId($comment_id));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Comment</title>
</head>
<body>
<h1>Details Of Comment</h1>

    <table style='width: 100%;border: 1px solid #000;padding: 15px;border-collapse:collapse;border-spacing:5px'>
        <tr>
            <th>User ID</th>
            <th>Comment ID</th>
            <th>Date Created</th>
            <th>Post ID</th>
        </tr>
        <tr>
            <td style='border: 1px solid #000;text-align:center'><?php echo $comment_one['user_id']; ?></td>
            <td style='border: 1px solid #000;text-align:center'><?php echo $comment_one['comment_id']; ?></td>
            <td style='border: 1px solid #000;text-align:center'><?php echo $comment_one['created_time'] ?></td>
            <td style='border: 1px solid #000;text-align:center'><?php echo $comment_one['post_id'] ?></td>

        </tr>
    </table>

</body>
</html>

