<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //hash password / endcrip
    $has = password_hash($password, PASSWORD_DEFAULT);


    mysqli_query($conn,
        "INSERT INTO user (username, password, role)
         VALUES ('$username', '$has', 'user')"
    );

    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit" name="register">Register</button>
</form>

</body>
</html>
