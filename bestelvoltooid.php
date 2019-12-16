<?php
include 'ProductFuncties.php';
include 'server.php';

?>
<?php

# $_SESSION['cart'][] = array();


?>

    <!-- header -->
<?php include 'navbar.php'; ?>




<p> Gegevens: </p>



<?php

$voornaam = $_GET['voornaam'];
$achternaam = $_GET['achternaam'];
$email = $_GET['email'];
$straatnaam = $_GET['straatnaam'];
$huisnummer = $_GET['huisnummer'];
$postcode = $_GET['postcode'];
$plaats = $_GET['plaats'];


print($voornaam . " ");
print($achternaam . "<br>");
print($email . "<br>");
print($straatnaam . " ");
print($huisnummer  . "<br>");
print($postcode  . "<br>");
print($plaats . "<br>");

