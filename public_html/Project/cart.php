<!-- <link rel="stylesheet" href="mystyle.css"> -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="form.css">

<script>

function validate() {  
    return true;
}  

</script>

<?php
require(__DIR__ . "/../../partials/nav.php");

if (!is_logged_in()) {
    flash("Please login or register before viewing your cart", "warning");
    die(header("Location: login.php"));
}

$db = getDB();
//generally try to avoid SELECT *, but this is about being dynamic so I'm using it this time
//$query = "SELECT name, description, category, stock, unit_price FROM Products WHERE visibility=1 AND WHERE name LIKE ORDER BY modified LIMIT 10"; 
//echo "<pre>" . var_export($_SESSION, true) . "</pre>";
//echo "<pre>" . var_export($_GET, true) . "</pre>";

//SELECT name, c.id as line_id, item_id, quantity, cost, (cost*quantity) as subtotal FROM RM_Cart c JOIN RM_Items i on c.item_id = i.id WHERE c.user_id = :uid");

$query = "SELECT name, c.id as prodid, item_id, quantity, unit_price, ROUND((unit_price*quantity),2) as subtotal FROM Cart c JOIN Products i ON c.item_id = i.id WHERE c.user_id = :id";
/* $Endquery = " ORDER BY modified LIMIT 10";
$query .=$Endquery; */

$stmt = $db->prepare($query);
$results = [];
try {
    $stmt->execute([":id" => get_user_id()]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<pre>" . var_export($e, true) . "</pre>";
}

$totalCost = 0;

?>
<div class="container-xxl">
<br>
<h2 style="text-align: center">Cart</h2>
<?php if (count($results) == 0) : ?>
    <p style="text-align: center">No results to show</p>
<?php else : ?>
    <table class="table">
        <?php foreach ($results as $index => $record) : ?>
            <?php if ($index == 0) : ?>
                <thead>
                    <?php foreach ($record as $column => $value) : ?>
                        <?php if (($column=='prodid') || ($column=='item_id')) : continue; endif  ?> <!-- skips product id row from displaying -->
                        <th><?php se($column); ?></th>
                    <?php endforeach; ?>
                    <th>Product Page</th>
                    <th>Edit Amount in Cart</th>
                    <?php if (has_role("Admin")) : echo '<th>Edit Product</th>'; endif; ?>
                </thead>
            <?php endif; ?>
            <tr>
                <?php foreach ($record as $column => $value) : ?>
                    <?php if ($column=='subtotal') : $totalCost+= $value; endif;?>
                    <?php if (($column=='prodid') || ($column=='item_id')) : continue; endif  ?> <!-- skips product id values and userid values from displaying -->
                    <td><?php if   ((is_numeric($value)) && ((int) $value != $value) ) :  echo "$"; endif;  
                    se($value, null, "N/A"); ?></td> <!-- Adds dollar signs to all amounts -->
                <?php endforeach; ?>
                <td>
                    <a href="product_page.php?id=<?php se($record, "item_id"); ?>">View Product</a>
                </td>
                <td>
                <button onclick="add_to_cart('<?php se($record, 'item_id'); ?>','<?php se($record, 'quantity'); ?>','-1')" class="btn btn-primary">-</button>
                <button onclick="add_to_cart('<?php se($record, 'item_id'); ?>','<?php se($record, 'quantity'); ?>','1')" class="btn btn-primary">+</button>
                </td>
                <?php if (has_role("Admin")) : ?>
                    <td>
                        <a href="./admin/product_edit.php?id=<?php se($record, "item_id"); ?>">Edit</a>
                    </td>
                <?php endif; ?>
                <td>
                    <button type="button" onclick="clear_cart('<?php se($record, 'item_id'); ?>')" class="btn btn-outline-primary">Remove All</button>
                </td>
            </tr>
        <?php endforeach; error_log($totalCost);?>
    </table>

    <h2>Total: $<?php se($totalCost);?></h2>
    <button type="button" onclick="window.location.href = './checkout/checkout.php';" class="btn btn-lg btn-primary">Checkout</button>
    <button type="button" onclick="clear_cart()" class="btn btn-secondary btn-lg">Clear Cart</button>
    
 <!--    <button type="button" onclick="clear_cart()" class="btn btn-outline-primary">Clear Cart</button>
    <button type="button" class="btn btn-primary btn-lg">Checkout</button> -->
</div>


<?php endif; ?>
<!-- se($_GET, "category", "", false) -->

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>