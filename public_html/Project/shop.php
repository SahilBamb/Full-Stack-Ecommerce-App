<!-- <link rel="stylesheet" href="mystyle.css"> -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="form.css">

<script>

function add_to_cart(item_id, quantity = 1) {
        console.log(item_id);
        postData({
            item_id: item_id,
            desired_quantity: quantity
        }, "/Project/add_to_cart.php").then(data => {
            if (data.status === 200) {
                flash(data.message, "success");
/*                 if (get_cart) {
                    get_cart();
                } */
            } else {
                flash(data.message, "danger");
            }
        }).catch(e => {
            console.log(e);
            //flash("There was a problem adding the item to cart", "danger");
        });
    }

function validate() {  
    return true;
}  

</script>

<?php
require(__DIR__ . "/../../partials/nav.php");


$db = getDB();
//generally try to avoid SELECT *, but this is about being dynamic so I'm using it this time
//$query = "SELECT name, description, category, stock, unit_price FROM Products WHERE visibility=1 AND WHERE name LIKE ORDER BY modified LIMIT 10"; 
$query = "SELECT id, name, description, category, stock, unit_price FROM Products WHERE visibility=1";

//echo "<pre>" . var_export($_SESSION, true) . "</pre>";
//echo "<pre>" . var_export($_GET, true) . "</pre>";

if (isset($_GET["search"]) || isset($_GET["category"]) || (isset($_GET["SortByPrice"]))) {

    if ($_GET["search"]=="") {unset($_GET['search']);}
    if ($_GET["category"]=="") {unset($_GET['category']);}
    if (isset($_GET["search"]) || isset($_GET["category"]) || (isset($_GET["SortByPrice"]))) echo "<h2>" . "Filters Applied" . "</h2>";
    
}

if (isset($_GET["search"])) {
    echo "<h5>" . "Searching: " . $_GET["search"] . "</h5>";

    //$search = "%" . $_GET["search"] . "%";
    //$query = "SELECT name, description, category, stock, unit_price FROM Products WHERE visibility=1 AND name LIKE '" . $search . "' ORDER BY modified LIMIT 10";
    
    $search = "%" . se($_GET, "search", "", false) . "%";
    $subqery = " AND name LIKE '" . $search . "' ";
    $query .=$subqery;
}


if (isset($_GET["category"])) {
    echo "<h5>" . "Category: " . $_GET["category"] . "</h5>";
    $category = "%" . se($_GET, "category", "", false) . "%";
    //$query = "SELECT name, description, category, stock, unit_price FROM Products WHERE visibility=1 AND category LIKE '" . $category . "' ORDER BY modified LIMIT 10";
    $subqery = " AND category LIKE '" . $category . "' ";
    $query .=$subqery;
} 

$Endquery = " ORDER BY modified LIMIT 10";
if (isset($_GET["SortByPrice"])) {
    echo "<h5>" . "Sorting By Price " . "</h5>";
    $Endquery = " ORDER BY unit_price LIMIT 10";
}

$query .=$Endquery;

$stmt = $db->prepare($query);
$results = [];
try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<pre>" . var_export($e, true) . "</pre>";
}

?>
<br>
<h2>Shop</h2>
<?php if (count($results) == 0) : ?>
    <p>No results to show</p>
<?php else : ?>
    <table class="table">
        <?php foreach ($results as $index => $record) : ?>
            <?php if ($index == 0) : ?>
                <thead>
                    <?php foreach ($record as $column => $value) : ?>
                        <th><?php se($column); ?></th>
                    <?php endforeach; ?>
                    <th>Product Page</th>
                    <th>Purchase</th>
                    <?php if (has_role("Admin")) : echo '<th>Edit</th>'; endif; ?>
                </thead>
            <?php endif; ?>
            <tr>
                <?php foreach ($record as $column => $value) : ?>
                    <td><?php se($value, null, "N/A"); ?></td>
                <?php endforeach; ?>
                <td>
                    <a href="product_page.php?id=<?php se($record, "id"); ?>">View Product</a>
                </td>
                <td>
                    <!-- <a href="dynamic_edit.php?id=<?php se($record, "id"); ?>">Add To Cart</a> -->
                    <button onclick="add_to_cart('<?php se($record, 'id'); ?>')" class="btn btn-primary">Add to Cart</button>
                </td>
                <?php if (has_role("Admin")) : ?>
                    <td>
                        <a href="./admin/product_edit.php?id=<?php se($record, "id"); ?>">Edit</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>


<?php endif; ?>
<!-- se($_GET, "category", "", false) -->

<form onsubmit="return validate(this)" method="GET">
    <h3>Filters</h3>
    <div id="emailHelp" class="form-text">Submit empty fields to clear filters</div>
    <div class="mb-3">
        <label for="search" class="form-label">Search</label>
        <input type="text" class="form-control" value="<?php if (isset($_GET['search'])) se($_GET['search']); ?>" name="search" />
    </div>
    <div class="mb-3">
        <label for="category" class="form-label" >Category</label>
        <input type="text" class="form-control" value="<?php if (isset($_GET['category'])) se($_GET['category']); ?>" name="category" maxlength="30" />
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="SortByPrice" name="SortByPrice" value="1">
        <label class="form-check-label" for="SortByPrice">Sort By Price</label>
    </div>
    <input type="submit" class="btn btn-primary" />
</form>

<?php
require_once(__DIR__ . "/../../lib/functions.php");
error_log("add_to_cart received data: " . var_export($_REQUEST, true));
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
//handle the potentially incoming post request
$item_id = (int)se($_POST, "item_id", null, false);
$desired_quantity = (int)se($_POST, "desired_quantity", 0, false);
$response = ["status" => 400, "message" => "Invalid data"];
http_response_code(400);
if (isset($item_id) && $desired_quantity > 0) {
    if (is_logged_in()) {
        $db = getDB();
        //note adding to cart doesn't verify price or quantity
        $stmt = $db->prepare("INSERT INTO RM_Cart (item_id, quantity, user_id) VALUES(:iid, :q, :uid) ON DUPLICATE KEY UPDATE quantity = quantity + :q");
        $stmt->bindValue(":iid", $item_id, PDO::PARAM_INT);
        $stmt->bindValue(":q", $desired_quantity, PDO::PARAM_INT);
        $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
        try {
            $stmt->execute();
            $response["status"] = 200;
            $response["message"] = "Item added to cart";
            http_response_code(200);
        } catch (PDOException $e) {
            error_log("Add to cart error: " . var_export($e, true));
            $response["message"] = "Error adding item to cart";
        }
    } else {
        http_response_code(403);
        $response["status"] = 403;
        $response["message"] = "Must be logged in to add to cart";
    }
}

?>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>