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
<?php include 'navbar.php'; ?>


<div class="header">
    <h2>Updaten</h2>
</div>


<form id="edit" method="POST" action="">

    <label for="voornaam">Voornaam </label>
    <input id="voornaam" type="text" name="voornaam" value="<?php print($_SESSION['voornaam']) ?>"/>
    <br>


    <label for="achternaam">Achternaam </label>
    <input id="achternaam" type="text" name="achternaam" value="<?php print($_SESSION['achternaam']) ?>"/>
    <br>

    <label for="postcode">Postcode </label>
    <input id="postcode" type="text" name="postcode" value="<?php print($_SESSION['postcode']) ?>"/>
<br>
    <label for="huisnummer">Huisnummer </label>
    <input id="huisnummer" type="text" name="huisnummer" value="<?php print($_SESSION['huisnummer']) ?>"/>
<br>
    <label for="straatnaam">Straatnaam </label>
    <input id="straatnaam" type="text" name="straatnaam" value="<?php print($_SESSION['straatnaam']) ?>"/>
<br>

    <button id="submit" type="submit">Submit</button>

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