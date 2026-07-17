<?php
require 'data.php';

// Tạo map danh mục
$categoryMap = [];

foreach ($categories as $category) {
    $categoryMap[$category['id']] = $category['name'];
}

$totalInventory = 0;
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>MiniShop — Catalog (Buoi 1)</title>

    <style>
        body{
            font-family: Arial;
            margin:30px;
        }

        table{
            border-collapse: collapse;
            width:900px;
        }

        th,td{
            border:1px solid black;
            padding:8px;
        }

        th{
            background:#f2f2f2;
        }
    </style>

</head>

<body>

<h2>MiniShop — Catalog (Buoi 1)</h2>

<table>

<tr>
    <th>SKU</th>
    <th>Ten</th>
    <th>Danh muc</th>
    <th>Gia</th>
    <th>So luong</th>
    <th>Thanh tien</th>
</tr>

<?php foreach($products as $product): ?>

<?php
    $lineTotal = $product['price'] * $product['qty'];
    $totalInventory += $lineTotal;
?>

<tr>

<td><?= htmlspecialchars($product['sku']) ?></td>

<td><?= htmlspecialchars($product['name']) ?></td>

<td><?= htmlspecialchars($categoryMap[$product['category_id']]) ?></td>

<td><?= $product['price'] ?></td>

<td><?= $product['qty'] ?></td>

<td><?= $lineTotal ?></td>

</tr>

<?php endforeach; ?>

</table>

<h3>Tong gia tri kho = <?= $totalInventory ?></h3>

<h3>So san pham = <?= count($products) ?></h3>

<hr>

<pre>
<?php
var_dump($products);
?>
</pre>

<!-- MS_EXPECT product_count=8 inventory_value=41380000 -->

</body>
</html>