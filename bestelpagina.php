<?php
include 'ProductFuncties.php';

?>
<?php
session_start();

# $_SESSION['cart'][] = array();

?>

<!-- header -->
<?php include 'navbar.php'; ?>


<h1> Vul uw gegevens in:  </h1>
<br><br>

<?php if(isset($_SESSION['username'])) {
    $voornaam = $_SESSION['voornaam'];
    $achternaam = $_SESSION['achternaam'];
    $email = $_SESSION['email'];
    $straatnaam = $_SESSION['straatnaam'];
    $huisnummer = $_SESSION['huisnummer'];
    $postcode = $_SESSION['postcode'];
    $plaats = $_SESSION['plaats'];
} else {
    $voornaam = "";
    $achternaam = "";
    $email = "";
    $straatnaam = "";
    $huisnummer = "";
    $postcode = "";
    $plaats = "";
}
 ?>

<div class="center">
<form method='POST' action="ordercontrole.php">
    Voornaam:<input required type="text" name="voornaam" value="<?php print($voornaam) ?>">* <br>
    Achternaam:<input required type="text" name="achternaam" value="<?php print($achternaam) ?>">* <br>
    Email:<input required type="text" name="email" value="<?php print($email) ?>">* <br>
    Straatnaam:<input required type="text" name="straatnaam" value="<?php print($straatnaam) ?>">* <br>
    Huisnummer:<input required type="text" name="huisnummer" value="<?php print($huisnummer) ?>">* <br>
    Postcode: <input required type="text" name="postcode" value="<?php print($postcode) ?>">* <br>
    Plaats: <input required type="text" name="plaats" value="<?php print($plaats) ?>">* <br>
    <input type="submit" value="verder naar order" name="bestelknop2" class="btn btn-primary">
</form>

    <p>[* = dit veld moet worden ingevuld] </p>
</div>


