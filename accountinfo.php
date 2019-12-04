<?php include 'ProductFuncties.php';?>
<?php include 'server.php';?>
<html>
<head>
    <title>Registreren</title>
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="wide.png" />
</head>
<body>
<?php include 'navbar.php';

$db = mysqli_connect('localhost', 'root', '', 'wideworldimporters');

$newusername = $username;
$newemail = $email;
$newvoornaam = $voornaam;
$newachternaam = $achternaam;
$newpostcode = $postcode;
$newhuisnummer = $huisnummer;
$newstraatnaam = $straatnaam;
$newplaats = $plaats;
?>

<div class="header">
    <h2>Updaten</h2>
</div>
<form method="post" action="registreerpagina.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $newusername; ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $newemail; ?>">
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
            <input type="text" name="voornaam" value="<?php echo $newvoornaam; ?>">
        </div>
        <div class="input-group">
            <label>Achternaam</label>
            <input type="text" name="achternaam" value="<?php echo $newachternaam; ?>">
        </div>
        <div class="input-group">
            <label>Postcode</label>
            <input type="text" name="postcode" value="<?php echo $newpostcode; ?>">
        </div>
        <div class="input-group">
            <label>Huisnummer</label>
            <input type="text" name="huisnummer" value="<?php echo $newhuisnummer; ?>">
        </div>
        <div class="input-group">
            <label>Straatnaam</label>
            <input type="text" name="straatnaam" value="<?php echo $newstraatnaam; ?>">
        </div>
        <div class="input-group">
            <label>Plaats</label>
            <input type="text" name="plaats" value="<?php echo $newplaats; ?>">
        </div>
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Update</button>
    </div>
</form>
   
</body>
</html>