<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM user WHERE username='$username'"
);


if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);

    if(password_verify($password, $data['password'])){

        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];

        if ($data['role'] == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: user.php");
        }

        exit;

    } else {
        $error = "Username atau password salah!";
    }

} else {
    $error = "Username atau password salah!";
}

}
?>
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

    <p>Belum punya akun?
        <a href="register.php">Register</a>
    </p>

    <button type="submit" name="login">Login</button>
</form>

</body>
</html>
