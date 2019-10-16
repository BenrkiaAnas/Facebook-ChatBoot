<?php
require_once("./include/db.php");
require_once("./elements/getComment.php");

$comment_one = mysqli_fetch_array(findByCommentIdId(''));
$allComment = findAllComment();


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Comment</title>
    </head>
    <body>
    <h1>Comments</h1>

    <?php
    if($comment_one["comment_id"])
    {
        echo "<table style='width: 100%;border: 1px solid #000;padding: 15px;border-collapse:collapse;border-spacing:5px'>
                    <tr>
                      <th>User ID</th>
                      <th>Comment ID</th>
                      <th>Date Created</th>
                      <th>Post ID</th>
                      
                    </tr>
                    <tr>
                        <td style='border: 1px solid #000;text-align:center'>{$comment_one['user_id']}</td>
                        <td style='border: 1px solid #000;text-align:center'>{$comment_one['comment_id']}</td>
                        <td style='border: 1px solid #000;text-align:center'>{$comment_one['created_time']}</td>
                        <td style='border: 1px solid #000;text-align:center'>{$comment_one['post_id']}</td>
                    </tr>
               </table>";
    }else{
        echo "<table style='width: 100%;border: 1px solid #000;padding: 15px;border-collapse:collapse;border-spacing:5px'>
                    <tr>
                      <th>User ID</th>
                      <th>Comment ID</th>
                      <th>Date Created</th>
                      <th>Post ID</th>
                      <th>Action</th>
                    </tr>
                    ";
        while ($row = $allComment->fetch_assoc())
        {
            echo "<tr><td style='border: 1px solid #000;text-align:center'>{$row['user_id']}</td><td style='border: 1px solid #000;text-align:center'>{$row['comment_id']}</td><td style='border: 1px solid #000;text-align:center'>{$row['created_time']}</td><td style='border: 1px solid #000;text-align:center'>{$row['post_id']}</td><td style='border: 1px solid #000;text-align:center'><a href='./comment.php?id={$row['comment_id']}'>Show Comment Detail</a></td></tr>";
        }

        echo "</table>";
    }
    ?>

    </body>
</html>

