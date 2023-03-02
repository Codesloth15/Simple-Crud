<?php include "db.php";
if (isset($_POST['submit'])) {


    $name = $_POST['name'];
    $password = $_POST['password'];
    $id = $_POST['id'];


    //MySQL syntax for updating
    $updateQuery = "UPDATE users SET name = '$name', password = '$password' WHERE id=$id";

    //Connection to database

    //$connection = mysqli_connect("localhost",'root','','student');
    connection();

    //query to the database
    $result = mysqli_query($connection, $updateQuery);


    if ($result) {
        echo "<script>alert('username updated');location.href='Create.php';</script>";
    } else {
        echo "<script>alert('username not updated');location.href='Create.php';</script>";
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
    <br><br><br><br><br><br><br><br><br><br>
    <form action="Update.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name">
        <br>
        <br>
        <label for="password">Pass:</label>
        <input type="password" name="password">
        <br>
        <br>
        <label for="number">Id:</label>
        <input type="text" name="id">
        <br>
        <br>
        <input type="submit" value="Update" name="submit">
    </form>
    <br>
    <br>
    <br>
    <form action="Create.php">
        <input type="submit" value="Create">
    </form>
    <br>
    <br>
    <form action="Read.php">
        <input type="submit" value="Login">
    </form>
</body>

</html>