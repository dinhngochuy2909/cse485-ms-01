<?php
require 'data.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>MiniShop — Catalog (Buoi 1)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        table {
            border-collapse: collapse;
            width: 700px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>MiniShop — Catalog (Buoi 1)</h2>

<table>
    <tr>
        <th>SKU</th>
        <th>Ten</th>
        <th>Gia</th>
        <th>So luong</th>
    </tr>

    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['sku']; ?></td>
            <td><?= $product['name']; ?></td>
            <td><?= $product['price']; ?></td>
            <td><?= $product['qty']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>