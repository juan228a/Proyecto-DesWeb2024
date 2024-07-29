<?php
// presentation/php/view_cart.php

require_once '../../business/controllers/CartController.php';

$controller = new CartController();
$cartItems = $controller->viewCart();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="../css/carrito.css">
</head>
<body>
    <header>
        <h1>Carrito de Compras</h1>
    </header>
    <main>
        <?php if (empty($cartItems)): ?>
            <p>El carrito está vacío.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Herramienta</th>
                    <th>Días de Alquiler</th>
                    <th>Precio Total</th>
                </tr>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['tool_id']); ?></td>
                        <td><?php echo htmlspecialchars($item['rental_days']); ?></td>
                        <td><?php echo htmlspecialchars($item['rental_days'] * 800); // Ajusta el precio según corresponda ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </main>
</body>
</html>
