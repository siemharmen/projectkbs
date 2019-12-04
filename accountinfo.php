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
    <?php
    if (isset($_POST['update_user'])) {
    // receive all input values from the form
    $newusername = mysqli_real_escape_string($db, $_POST['username']);
    $newemail = mysqli_real_escape_string($db, $_POST['email']);
    $newpassword_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $newpassword_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $newvoornaam = mysqli_real_escape_string($db, $_POST['voornaam']);
    $newachternaam = mysqli_real_escape_string($db, $_POST['achternaam']);
    $newpostcode = mysqli_real_escape_string($db, $_POST['postcode']);
    $newhuisnummer = mysqli_real_escape_string($db, $_POST['huisnummer']);
    $newstraatnaam = mysqli_real_escape_string($db, $_POST['straatnaam']);
    $newplaats = mysqli_real_escape_string($db, $_POST['plaats']);

    if (empty($newusername)) { array_push($errors, "Username is required"); }
    if (empty($newemail)) { array_push($errors, "Email is required"); }
    if (empty($newpassword_1)) { array_push($errors, "Password is required"); }
    if ($newpassword_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "UPDATE users SET(username, email, password, voornaam, achternaam, postcode, huisnummer, straatnaam, plaats) 
  			  VALUES('$username', '$email', '$password', '$voornaam', '$achternaam', '$postcode', '$huisnummer', '$straatnaam', '$plaats')
  			  WHERE ";
    mysqli_query($db, $query);
    ?>
</body>
</html>