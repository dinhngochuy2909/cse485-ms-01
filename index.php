<?php
require_once __DIR__ . '/data.php';

/*
MS_EXPECT product_count=8 inventory_value=41380000
*/

// Map danh mục
$categoryMap = [];

foreach ($categories as $c) {
    $categoryMap[$c['id']] = $c['name'];
}

$tongGiaTriKho = 0;

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>MiniShop - Catalog (Buổi 1)</title>

    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
            background:#f4f4f4;
            margin:40px;
        }

        h2{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        th,td{
            border:1px solid #ccc;
            padding:10px;
            text-align:center;
        }

        th{
            background:#007bff;
            color:white;
        }

        tr:nth-child(even){
            background:#f9f9f9;
        }

        .summary{
            margin-top:20px;
            font-size:18px;
            font-weight:bold;
        }

        pre{
            background:white;
            padding:15px;
        }

    </style>

</head>

<body>

<h2>MiniShop - Catalog (Buổi 1)</h2>

<table>

<tr>
    <th>SKU</th>
    <th>Tên</th>
    <th>Danh mục</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
</tr>

<?php foreach($products as $p): ?>

<?php
    $thanhTien = $p['price'] * $p['qty'];
    $tongGiaTriKho += $thanhTien;
?>

<tr>

<td><?= htmlspecialchars($p['sku'],ENT_QUOTES,'UTF-8') ?></td>

<td><?= htmlspecialchars($p['name'],ENT_QUOTES,'UTF-8') ?></td>

<td><?= htmlspecialchars($categoryMap[$p['category_id']],ENT_QUOTES,'UTF-8') ?></td>

<td><?= $p['price'] ?></td>

<td><?= $p['qty'] ?></td>

<td><?= $thanhTien ?></td>

</tr>

<?php endforeach; ?>

</table>

<div class="summary">

<p>Tổng giá trị kho = <?= $tongGiaTriKho ?></p>

<p>Số sản phẩm = <?= count($products) ?></p>

</div>

<h3>Debug dữ liệu</h3>

<pre>
<?php
var_dump($products);
?>
</pre>

</body>
</html>