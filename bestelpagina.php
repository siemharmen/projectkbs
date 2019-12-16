<?php
include 'ProductFuncties.php';
include 'server.php';
?>
<?php

# $_SESSION['cart'][] = array();


?>

<!-- header -->
<?php include 'navbar.php'; ?>


<h1> Bestelpagina </h1>
<br><br>

<div class="center">
<form type='POST' action="bestelVoltooid.php">
    Voornaam:<input required type="text" value="<?php print($_SESSION['voornaam']) ?>">* <br>
    Achternaam:<input required type="text" value="<?php print($_SESSION['achternaam']) ?>">* <br>
    Email:<input required type="text" value="<?php print($_SESSION['email']) ?>">* <br>
    Straatnaam:<input required type="text" value="<?php print($_SESSION['straatnaam']) ?>">* <br>
    Huisnummer:<input required type="text" value="<?php print($_SESSION['huisnummer']) ?>">* <br>
    Postcode: <input required type="text" value="<?php print($_SESSION['postcode']) ?>">* <br>
    Plaats: <input required type="text" value="<?php print($_SESSION['plaats']) ?>">* <br>
    <input type="submit" value="submit">
</form>

</div>



<br><br><br>



<?php
    print_r($_SESSION);





?>