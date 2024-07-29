<?php
// presentation/php/add_to_cart.php

require_once '../../business/controllers/CartController.php';

$controller = new CartController();
$controller->addToCart();
?>
