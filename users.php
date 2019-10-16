<?php
require_once("./include/db.php");
require_once("./elements/getUsers.php");

$user_one = mysqli_fetch_assoc(findByUserId(''));
$allUsers = findAllUsers();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>User</title>
</head>
<body>
<h1>Users</h1>

<?php
if($user_one["user_id"])
{
    echo "<table style='width: 100%;border: 1px solid #000;padding: 15px;border-collapse:collapse;border-spacing:5px'>
                    <tr>
                      <th>User ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                    </tr>
                    <tr>
                        <td style='border: 1px solid #000;text-align:center'>{$user_one['user_id']}</td>
                        <td style='border: 1px solid #000;text-align:center'>{$user_one['first_name']}</td>
                        <td style='border: 1px solid #000;text-align:center'>{$user_one['last_name']}</td>
                    </tr>
               </table>";
}else{
    echo "<table style='width: 100%;border: 1px solid #000;padding: 15px;border-collapse:collapse;border-spacing:5px'>
                    <tr>
                      <th>User ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Action</th>
                    </tr>
                    ";
    while ($row = $allUsers->fetch_assoc())
    {
        echo "<tr><td style='border: 1px solid #000;text-align:center'>{$row['user_id']}</td><td style='border: 1px solid #000;text-align:center'>{$row['first_name']}</td><td style='border: 1px solid #000;text-align:center'>{$row['last_name']}</td><td style='border: 1px solid #000;text-align:center'><a href='./user.php?id={$row['user_id']}'>Show User Detail</a></td></tr>";
    }

    echo "</table>";
}
?>

</body>
</html>

