<?php
include 'ProductFuncties.php';
include("loginserv.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="wide.png" />
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="login">
    <h1 align="center">Login</h1>
    <form action="" method="post" style="text-align:center;">
        <input type="text" placeholder="Username" id="user" name="user"><br/><br/>
        <input type="password" placeholder="Password" id="pass" name="pass"><br/><br/>
        <input type="submit" value="Login" name="submit">
        <span><?php echo $error; ?></span>
</body>
</html>