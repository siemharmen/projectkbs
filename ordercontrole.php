<?php
include 'ProductFuncties.php';


?>
<?php
session_start();
# $_SESSION['cart'][] = array();


?>

<!-- header -->
<?php include 'navbar.php'; ?>



<h2>Controleer uw gegevens.</h2>

<br>
<div class="orderlijst">
    <p> Gegevens: </p>
    <?php
    if(isset($_POST['voornaam'])){
        $voornaam = $_POST['voornaam'];
        $achternaam =  $_POST['achternaam'];
        $email =  $_POST['email'];
        $straatnaam =  $_POST['straatnaam'];
        $huisnummer =  $_POST['huisnummer'];
        $postcode =  $_POST['postcode'];
        $plaats =  $_POST['plaats'];
    } else {
        print("Er zijn geen waardes ingevuld, ga terug naar de vorige pagina!");
        echo ' <a href="bestelpagina.php"><button type="button" class="btn btn-primary" style="margin-left: 0.5%; margin-bottom: 0.5%;"> <= terug</button></a>';
    }

    print("Voornaam: " . $voornaam . " ");
    print(" Achternaam: " . $achternaam . "<br>");
    print(" Email: " . $email . "<br>");
    print(" Straatnaam: " . $straatnaam . " ");
    print(" Huisnummer: " . $huisnummer  . "<br>");
    print(" Postcode: " . $postcode  . "<br>");
    print(" Plaats: " . $plaats . "<br>");

    ?>


</div>




<div class="orderlijst">
    <p> Producten: </p>

    <?php
    $totaalprijs = 0;
    $i = 0;
    foreach($_SESSION['cart'] AS $key => $product) {
        $i++;
        $totaalprijs = $totaalprijs + $product['unitPrice'];
        print("<p>" . $i . $product['StockItemName'] . " € " . $product['unitPrice'] . "</p>");


    }
    ?>

    <p>Totaalprijs: € <?php print($totaalprijs); ?></p>

</div>

<div class="bestelknop">
    <form action="bestelvoltooid.php" method='POST'> <input type="submit" name="bestelknop" value="bestellen" class="btn btn-primary"></form>

</div>