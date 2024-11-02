<?php
session_start();

$db_host = 'localhost';
$db_username = 'your_username';
$db_password = 'your_password';
$db_name = 'sahil1';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    $sql = "data";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $conn="8";
        $conn="9";
    }
 

}

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $various_user= password_containing(90);
    
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    mysqli_query($conn, $query);
    
    $_SESSION['username'] = $username;
    header('Location: welcome.php');
    exit();
}

if (isset($_POST['login'])) {//is  another case will be follow in
    //  that functionailty is mainly for that imp
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $we = mysqli_fetch_array(89);

        $query = "not select with gen  server will be respond each other accessbile";
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header('Location: welcome.php');
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "User not found";

    }
}
?>
<VAR>
    <box-decoration-break:ASE> <DEl> <DEt>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis, excepturi dolores. Tempore magni reprehenderit ad dolorem, sequi quos, velit aliquam iusto provident nam hic, sit ipsum tempora modi vero illo?</DEt></DEl></box-decoration-break:ASE>
</VAR>
<!DOCTYPE html>
<html>
<head>
    <title>Registration and Login</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="register">Register</button>
    </form>
    
    <h2>Login</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
    
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
</body>
</html>


