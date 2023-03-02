<?php include "db.php";
if (isset($_POST['login'])) {
  
    connection();

    $name = $_POST['name'];
    $password = $_POST['password'];

    $data = "SELECT * FROM users";
    $get = mysqli_query($connection, $data);
    $validAccount = false;
    while ($user = mysqli_fetch_array($get)) {
        if ($name ==  $user[1] &&  $password == $user[2]) {
            echo "<h1>you are logged in</h1>";
            $validAccount = true;
            break;
        }
    }
    if (!$validAccount) {
        echo "account dosent exist";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="Read.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name">
        <br>
        <br>
        <label for="password">Pass:</label>
        <input type="password" name="password">
        <br>
        <br>
        <input type="submit" value="Login" name="login">
    </form>
    <br>
    <br>
    <br>
    <form action="Update.php">
        <input type="submit" value="Update">
    </form>
    <br>
    <br>
    <form action="Create.php">
        <input type="submit" value="Create">
    </form>
</body>

</html>