<?php
require_once("./elements/getUsers.php");
global $connection;
$user_id = mysqli_real_escape_string($connection,$_GET["id"]);
$user_one = mysqli_fetch_assoc(findByUserId($user_id));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>User</title>
</head>
<body>
<h1>Details Of User</h1>

<table style='width: 100%;border: 1px solid #000;padding: 15px;border-collapse:collapse;border-spacing:5px'>
    <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>
    <tr>
        <td style='border: 1px solid #000;text-align:center'><?php echo $user_one['user_id']; ?></td>
        <td style='border: 1px solid #000;text-align:center'><?php echo $user_one['first_name']; ?></td>
        <td style='border: 1px solid #000;text-align:center'><?php echo $user_one['last_name'] ?></td>

    </tr>
</table>

</body>
</html>

