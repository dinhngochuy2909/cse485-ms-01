<?php
require_once __DIR__ . '/data.php';
 
// Map category_id => tên danh mục (chữ, không phải số)
$categoryMap = [];
foreach ($categories as $c) {
    $categoryMap[$c['id']] = $c['name'];
}
 
// Tính thành tiền từng dòng + cộng dồn tổng giá trị kho
$tong = 0;
foreach ($products as $index => $p) {
    $thanhTien = $p['price'] * $p['qty'];
    $products[$index]['line_total'] = $thanhTien; // gán lại để dùng khi in bảng
    $tong += $thanhTien;
}
 
$soSanPham = count($products);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>MiniShop — Catalog (Buoi 1)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; }
        table { border-collapse: collapse; width: 100%; max-width: 900px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background: #f2f2f2; }
        td.number { text-align: right; }
        tfoot td { font-weight: bold; background: #fafafa; }
        .summary { margin-top: 12px; }
    </style>
</head>
<body>
    <h1>MiniShop — Catalog (Buoi 1)</h1>
 
    <table>
        <thead>
            <tr>
                <th>SKU</th>
                <th>Ten</th>
                <th>Danh muc</th>
                <th>Gia</th>
                <th>So luong</th>
                <th>Thanh tien</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $p): ?>
            <tr>
                <td><?php echo htmlspecialchars($p['sku'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($p['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($categoryMap[$p['category_id']] ?? '—', ENT_QUOTES, 'UTF-8'); ?></td>
                <td class="number"><?php echo number_format($p['price'], 0, ',', '.'); ?></td>
                <td class="number"><?php echo $p['qty']; ?></td>
                <td class="number"><?php echo number_format($p['line_total'], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">Tong gia tri kho</td>
                <td class="number"><?php echo number_format($tong, 0, ',', '.'); ?></td>
            </tr>
        </tfoot>
    </table>
 
    <div class="summary">
        <p>So san pham = <?php echo $soSanPham; ?></p>
        <p>Tong gia tri kho (so thuan, dung cho EXPECT) = <?php echo $tong; ?></p>
    </div>
 
    <h2>Debug — var_dump($products)</h2>
    <pre><?php var_dump($products); ?></pre>
 
    <!-- MS_EXPECT product_count=<?php echo $soSanPham; ?> inventory_value=<?php echo $tong; ?> -->
</body>
</html>
 