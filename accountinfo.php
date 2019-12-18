<?php include 'ProductFuncties.php';?>
<?php session_start() ?>
<html>
<head>
    <title>Registreren</title>
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="wide.png" />
</head>
<body>
<?php include 'navbar.php'; ?>


<div class="header">
    <h2>Updaten</h2>
</div>
<div>
    Username <?php print($_SESSION['username']) ?> <br>
    Email <?php print($_SESSION['email']) ?> <br>
</div>
<form id="edit" method="POST" action="">

    <label for="voornaam">Voornaam </label>
    <input class="formulier" id="voornaam" type="text" name="voornaam" value="<?php print($_SESSION['voornaam']) ?>" required />
    <br>


    <label for="achternaam">Achternaam </label>
    <input class="formulier" id="achternaam" type="text" name="achternaam" value="<?php print($_SESSION['achternaam']) ?>" required/>
    <br>

    <label for="postcode">Postcode </label>
    <input class="formulier" id="postcode" type="text" name="postcode" value="<?php print($_SESSION['postcode']) ?>" required/>
<br>
    <label for="huisnummer">Huisnummer </label>
    <input class="formulier" id="huisnummer" type="text" name="huisnummer" value="<?php print($_SESSION['huisnummer']) ?>" required/>
<br>
    <label for="straatnaam">Straatnaam </label>
    <input class="formulier" id="straatnaam" type="text" name="straatnaam" value="<?php print($_SESSION['straatnaam']) ?>" required/>
<br>

    <button class="formulier" id="submit" type="submit">Submit</button>

</form>

<?php
$db = mysqli_connect('localhost', 'root', '', 'wideworldimporters');
if (isset($_POST['voornaam']) AND (isset($_POST['achternaam']) AND (isset($_POST['postcode']) AND (isset($_POST['huisnummer']) AND (isset($_POST['straatnaam'])))))){
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $postcode = $_POST["postcode"];
    $huisnummer = $_POST["huisnummer"];
    $straatnaam = $_POST["straatnaam"];
    $id = $_SESSION["id"];
    $stmt = $db->prepare("UPDATE users SET voornaam = ?, achternaam = ?, postcode = ?, huisnummer = ?, straatnaam = ? WHERE id = ?");
    $stmt->bind_param("sssssi",$voornaam, $achternaam, $postcode, $huisnummer, $straatnaam, $id);
    $stmt->execute();
    $_SESSION['success'] = "Account info updated";
    header('location: index.php');
    session_destroy();
}
?>

</body>
</html>