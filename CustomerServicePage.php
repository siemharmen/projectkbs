<?php
session_start();


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
}

?>

<?php include "ProductFuncties.php"; ?>
<?php include "navbar.php"; ?>


    <div style="text-align:center">
        <h2>Contactpagina </h2>
        <h3>Snel antwoord op uw vraag!</h3>

        <body> <br> Wanneer u een vraag heeft mail dan naar klantenservice@wwi.com of neem telefonisch contact op via 0612345678</body>

        <br><br>

        <div class="frontpageimage">
            <a href="productpagina.php"> <img class="" src="https://c1.sfdcstatic.com/content/dam/blogs/nl/Sept2016/B_Klantenservice.jpg" style="width:80%" alt="Klantenservice"></a>
        </div>