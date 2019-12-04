<?php include('server.php') ?>
<?php
include 'ProductFuncties.php';
?>
<html>
<head>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="header">
    <h2>Registreren</h2>
</div>
<form method="post" action="registreerpagina.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password_2">
        <div class="input-group">
            <label>Voornaam</label>
            <input type="text" name="voornaam" value="<?php echo $voornaam; ?>">
        </div>
        <div class="input-group">
            <label>Achternaam</label>
            <input type="text" name="achternaam" value="<?php echo $achternaam; ?>">
        </div>
        <div class="input-group">
            <label>Postcode</label>
            <input type="text" name="postcode" value="<?php echo $postcode; ?>">
        </div>
        <div class="input-group">
            <label>Huisnummer</label>
            <input type="text" name="huisnummer" value="<?php echo $huisnummer; ?>">
        </div>
        <div class="input-group">
            <label>Straatnaam</label>
            <input type="text" name="straatnaam" value="<?php echo $straatnaam; ?>">
        </div>
        <div class="input-group">
            <label>Plaats</label>
            <input type="text" name="plaats" value="<?php echo $plaats; ?>">
        </div>
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
        Already a member? <a href="loginpagina.php">Sign in</a>
    </p>
</form>
</body>
</html>