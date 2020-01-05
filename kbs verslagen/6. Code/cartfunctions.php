 <?php

function GetCart()
{
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    } else {
        $cart = array();
    }
    return $cart;
}

function AddtoCart($stockitemid)
{
    $cart = GetCart();
    if (array_key_exists($stockitemid, $cart)) {
        $cart[$stockitemid] += 1;
        // omhoog gaan doen
    } else {
        $cart[$stockitemid] = 1;
    }
    SaveCart($cart);
}

function SaveCart($cart)
{
    $_SESSION['cart'] = $cart;
}

function EmptyCart()
{
    $_SESSION['cart'] = array();
}