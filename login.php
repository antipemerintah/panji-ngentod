<?php
// login
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
        "SELECT * FROM user WHERE username='$username' AND password='$password'"
    );


    if (mysqli_num_rows($query) > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!-- form -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<?php if (isset($error)) echo $error; ?>

<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>

</body>
</html>
