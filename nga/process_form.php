<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "<pre>";
$a = $_GET['id'];
$key = array_search($a, array_column($_SESSION['cart'], "id"));
if($_GET['action'] == "add")
{
    $_SESSION['cart'][$key]['qty']++;
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header("location:cart.php");
}
if($_GET['action'] == "delete" &&  $_SESSION['cart'][$key]['qty'] > 0)
{
    $_SESSION['cart'][$key]['qty']--;
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header("location:cart.php");
}
if($_GET['action'] == "delete" &&  $_SESSION['cart'][$key]['qty'] <= 0)
{
    unset($_SESSION['cart'][$key]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header("location:cart.php");
}
if($_GET['action'] == "unset")
{
    unset($_SESSION['cart'][$key]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header("location:cart.php");
    
}
?>