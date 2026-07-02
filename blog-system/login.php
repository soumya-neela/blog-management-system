<?php
session_start();
include "includes/db.php";

$message = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){

            $_SESSION['username'] = $username;

            header("Location: dashboard.php");
            exit();

        }else{

            $message = "Wrong Password!";

        }

    }else{

        $message = "User Not Found!";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>User Login</h2>

<form method="POST">

    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">
        Login
    </button>

</form>

<p><?php echo $message; ?></p>

</body>
</html>