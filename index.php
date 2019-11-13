<?php

include 'ProductFuncties.php';

?>
<html>
<head>

</head>
<body>

    <h1>Producten</h1>

    <?php $producten = AlleProductenOpVragen(); ?>


    <?php ToonProductenOpScherm($producten); ?>

</body>
</html>
