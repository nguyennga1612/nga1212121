
<?php
session_start();
$arr = array();
$arr['id'] = $_POST["id"];
$arr['image'] = $_POST["image"];
$arr['price'] = $_POST["price"];
$arr['name'] = $_POST["name"];
$arr['color'] = $_POST["color"];
$arr['qty'] = $_POST['qty'];
$_SESSION['cart'][] = $arr;
?>