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
        <input class="formulier" type="text" name="username" value="<?php echo $username; ?>" required>
    </div>
    <div class="input-group">
        <label>Email</label>
        <input class="formulier" type="email" name="email" value="<?php echo $email; ?> " required>
    </div>
    <div class="input-group">
        <label>Password</label>
        <input class="formulier" type="password" name="password_1" required>
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input class="formulier" type="password" name="password_2" required>
        <div class="input-group">
            <label>Voornaam</label>
            <input class="formulier" type="text" name="voornaam" value="<?php echo $voornaam; ?>" required>
        </div>
        <div class="input-group">
            <label>Achternaam</label>
            <input class="formulier" type="text" name="achternaam" value="<?php echo $achternaam; ?>" required>
        </div>
        <div class="input-group">
            <label>Postcode</label>
            <input class="formulier" type="text" name="postcode" value="<?php echo $postcode; ?>" required>
        </div>
        <div class="input-group">
            <label>Huisnummer</label>
            <input class="formulier" type="text" name="huisnummer" value="<?php echo $huisnummer; ?>" required>
        </div>
        <div class="input-group">
            <label>Straatnaam</label>
            <input class="formulier" type="text" name="straatnaam" value="<?php echo $straatnaam; ?>" required>
        </div>
        <div class="input-group">
            <label>Plaats</label>
            <input class="formulier" type="text" name="plaats" value="<?php echo $plaats; ?>" required>
        </div>
    </div>
    <div class="input-group">
        <button class="btn btn-primary" type="submit" class="btn" name="reg_user" >Register</button>
    </div>
    <p>
        Heb je al een account? <a href="loginpagina.php">Log hier in</a>
    </p>
</form>
</body>
</html>