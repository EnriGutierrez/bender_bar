<?php // include('../config.php');?>
<?php
/*
// Retrieve top selling products from database
$stmt = $db->prepare('SELECT productos.id, products.name, SUM(order_items.quantity) as total_sold FROM productos JOIN order_items ON products.id = order_items.product_id GROUP BY products.id ORDER BY total_sold DESC LIMIT 5');
$stmt->execute();
$top_products = $stmt->fetchAll();

// Retrieve total sales from database
$stmt = $db->prepare('SELECT SUM(order_items.price * order_items.quantity) as total_sales FROM order_items');
$stmt->execute();
$total_sales = $stmt->fetchColumn();

// Display dashboard
echo '<h1>Top Selling Products</h1>';
echo '<table>';
echo '<tr><th>Product</th><th>Total Sold</th></tr>';
foreach ($top_products as $product) {
  echo '<tr>';
  echo '<td>'.$product['name'].'</td>';
  echo '<td>'.$product['total_sold'].'</td>';
  echo '</tr>';
}
echo '</table>';

echo '<h1>Total Sales</h1>';
echo '<p>$'.number_format($total_sales, 2).'</p>';*/
?>