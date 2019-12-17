<?php include('server.php') ?>

<?php
include 'ProductFuncties.php';
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php include 'navbar.php'; ?>
<?php include('errors.php'); ?>
<div class="header">
    <h2>Login</h2>
</div>

<form method="post" action="loginpagina.php">
    <div class="input-group">
        <label>Username</label>
        <input required class="formulier" type="text" name="username" >
    </div>
    <div class="input-group">
        <label>Password</label>
        <input required class="formulier" type="password" name="password">
    </div>
    <div class="input-group">
        <button class="btn btn-primary" type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
        Not yet a member? <a href="registreerpagina.php">Sign up</a>
            </p>
</form>
</body>
</html>