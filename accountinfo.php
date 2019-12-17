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

    <h1>
        <label for="voornaam">voornaam *</label>
        <input id="voornaam" type="text" name="voornaam" value="<?php print($_SESSION['voornaam']) ?>"/>
    </h1>
    <h1>
        <label for="achternaam">achternaam *</label>
        <input id="achternaam" type="text" name="achternaam" value="<?php print($_SESSION['achternaam']) ?>"/>
    </h1>

    <h1>
        <button id="submit" type="submit">Submit</button>
    </h1>

</form>

<?php
$db = mysqli_connect('localhost', 'root', '', 'wideworldimporters');
if (isset($_POST['voornaam']) OR (isset($_POST['achternaam']))){
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $id = $_SESSION["id"];
    $stmt = $db->prepare("UPDATE users SET voornaam = ?, achternaam = ? WHERE id = ?");
    $stmt->bind_param("ssi",$voornaam, $achternaam, $id);
    $stmt->execute();
    $_SESSION['success'] = "Account info updated";
    header('location: index.php');
    session_destroy();
}
?>

</body>
</html>