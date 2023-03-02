<?php include "db.php";

//Creating Data in Database
if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $password = $_POST['password'];

//Connection on the database
  connection();

//Check if username and password are not empty
  if ($name && $password) {

//Check if username and password are already exists
    $data = "SELECT * FROM users";
    $get = mysqli_query($connection, $data);
    $validAccount = false;
//Check all username and password from database
    while ($user = mysqli_fetch_array($get)) {
      if ($name ==  $user[1] &&  $password == $user[2]) {
        $validAccount = true;
        break;
      }
    }

    //if username and password are dose not exist
    if (!$validAccount) {
      if ($connection) {
        echo "<h1>Connected</h1>";
      } else {
        die("<h1>Connection failure </h1>");
      }

      $query = "INSERT INTO users(name,password) VALUES ('$name','$password')";

      $result = mysqli_query($connection, $query);

      if ($result) {
        echo "<script>alert('Account Successfully Created ');location.href='Read.php';</script>";
      } else {
        echo "<script>alert('Error');location.href='Read.php';</script>";
      }
    } else {
      //if username and password exist
      echo "<script>alert('Account Existed');location.href='Read.php';</script>";
    }
  } else {
    //if username and password are not filled.
    echo "please enter your name and password";
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
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="form-create">
    <form action="Create.php" method="post" class="create-form">
      <label for="name">Name:</label>
      <br>
      <input type="text" name="name">
      <br>
      <br>
      <label for="password">Pass:</label>
      <br>
      <input type="password" name="password">
      <br>
      <br>
      <br>
      <div class="buttons-alinement">
        <input type="submit" value="Submit" name="submit" class="Submit-button-login">
    </form>
    <form action="Update.php">
      <input type="submit" value="Update" class="Update-button-login">
    </form>
    <form action="Read.php">
      <input type="submit" value="Login" class="Login-button-login">
  </div>
  </form>
  </div>
</body>

</html>