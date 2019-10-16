<?php
require_once("./include/db.php");
require_once("./elements/getPost.php");

$post_one = mysqli_fetch_assoc(findByPostId(''));
$allPost = findAllPost();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Post</title>
</head>
<body>
<h1>Posts</h1>

<?php
if($post_one["post_id"])
{
    echo "<table style='width: 100%;border: 1px solid #000;padding: 15px;border-collapse:collapse;border-spacing:5px'>
                    <tr>
                      <th>Post ID</th>
                      <th>Created Time</th>
                    </tr>
                    <tr>
                        <td style='border: 1px solid #000;text-align:center'>{$post_one['post_id']}</td>
                        <td style='border: 1px solid #000;text-align:center'>{$post_one['created_time']}</td>
                    </tr>
               </table>";
}else{
    echo "<table style='width: 100%;border: 1px solid #000;padding: 15px;border-collapse:collapse;border-spacing:5px'>
                    <tr>
                      <th>Post ID</th>
                      <th>Created Time</th>
                      <th>Action</th>
                    </tr>
                    ";
    while ($row = $allPost->fetch_assoc())
    {
        echo "<tr><td style='border: 1px solid #000;text-align:center'>{$row['post_id']}</td><td style='border: 1px solid #000;text-align:center'>{$row['created_time']}</td><td style='border: 1px solid #000;text-align:center'><a href='./post.php?id={$row['post_id']}'>Show Post Detail</a></td></tr>";
    }

    echo "</table>";
}
?>

</body>
</html>

