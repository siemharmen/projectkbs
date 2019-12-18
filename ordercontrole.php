<?php
include 'ProductFuncties.php';


?>
<?php
session_start();
# $_SESSION['cart'][] = array();


?>

<!-- header -->
<?php include 'navbar.php'; ?>

<div class="header">
</div>
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
        $voornaam = "";
        $achternaam = "";
        $email =  "";
        $straatnaam =  "";
        $huisnummer =  "";
        $postcode =  "";
        $plaats =  "";
        print("Er zijn geen waardes ingevuld, ga terug naar de vorige pagina!");
        echo ' <a href="bestelpagina.php"><button type="button" class="btn btn-primary">terug</button></a>';
    }

    print("Voornaam: " . $voornaam . " ");
    print(" Achternaam: " . $achternaam . "<br>");
    print(" Email: " . $email . "<br>");
    print(" Straatnaam: " . $straatnaam . " <br>");
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
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] AS $key => $product) {
            $i++;
            $totaalprijs = $totaalprijs + $product['unitPrice'] * $_SESSION["amount"][$product['StockItemID']];


            print("<p>(" . $i .")&nbsp  " . $_SESSION["amount"][$product['StockItemID']] . "x ". $product['StockItemName'] . " € " . $product['unitPrice'] . "</p>");

        }
    } else {
        print("Er staan geen producten in uw mandje.");
    }

    ?>

    <p>Totaalprijs: € <?php print($totaalprijs); ?></p>

</div>

<div class="bestelknop">
<?php if(isset($_SESSION['cart'])){
    echo '<form  method=\'POST\'> <input type="submit" name="bestelknop" value="bestellen" class="btn btn-primary"></form>';
} ?>
</div>





<?php
$db = mysqli_connect('localhost', 'root', '', 'wideworldimporters');




    if (isset($_POST['bestelknop'])){
    foreach($_SESSION['cart'] AS $key => $product){
            $productid = $product['StockItemID'];

            $amount = $_SESSION['amount'][$productid];
            $stmt = $db->prepare("UPDATE stockitemholdings SET QuantityOnHand = QuantityOnHand - ? WHERE StockItemID = ? AND QuantityOnHand > 0");
            $stmt->bind_param("si",  $amount, $productid);
            $stmt->execute();

            header('location: bestelvoltooid.php');
            session_destroy();

    }
}


?>

