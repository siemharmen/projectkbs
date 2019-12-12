<?php
include 'ProductFuncties.php';
?>
<?php
session_start();
# $_SESSION['cart'][] = array();


?>

<!-- header -->
<?php include 'navbar.php'; ?>


<h1> Bestelpagina </h1>
<br><br>


<?php if(isset($_SESSION['username'])){
    print_r($_SESSION);
} else {
    print("vul gegevens in: ");
}

?>