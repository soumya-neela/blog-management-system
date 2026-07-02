<?php
include "includes/db.php";

$message = "";

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username,password)
            VALUES('$username','$password')";

    if($conn->query($sql)==TRUE){
        $message = "Registration Successful!";
    }else{
        $message = "Error: ".$conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>User Registration</h2>

<form method="POST">

    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="register">
        Register
    </button>

</form>

<p><?php echo $message; ?></p>

</body>
</html>