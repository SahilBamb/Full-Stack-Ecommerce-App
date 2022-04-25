
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/../../../Project/form.css">

<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}

if (isset($_POST["name"]) && isset($_POST["category"]) && isset($_POST["stock"]) && isset($_POST["unit_price"]) && isset($_POST["description"])) {
    $name = se($_POST, "name", "", false);
    $category = se($_POST, "category", "", false);
    $stock = se($_POST, "stock", "", false);
    $unit_price = se($_POST, "unit_price", "", false);
    $desc = se($_POST, "description", "", false);
    $image = se($_POST, "image", "", false);
    $visi = se($_POST, "visibility", "", false);
    $hasError = false;    
    
    if ($stock<0) {
        flash("Positive stock is required", "warning");
        $hasError = true;
    }     
    if ($unit_price<0) {
        flash("Positive unit_price is required", "warning");
        $hasError = true;
    } 
    if (empty($name)) {
        flash("Name is required", "warning");
        $hasError = true;
    } 

    if (empty($desc)) {
        flash("description is required", "warning");
        $hasError = true;
    } 

    if (empty($category)) {
        flash("category is required", "warning");
        $hasError = true;
    } 

    if (empty($stock)) {
        flash("stock is required", "warning");
        $hasError = true;
    } 

    if (empty($unit_price)) {
        flash("unit_price is required", "warning");
        $hasError = true;
    } 

    if (empty($visi)) {
        flash("visibility is required", "warning");
        $hasError = true;
    } 
    
    //description, category, stock, unit_price, visibility required and stock and unit price >0
    if (!$hasError) {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Products (name, image, description, category, stock, unit_price, visibility) VALUES(:name, :image, :desc, :cate, :stock, :unit_price, :visi)");
        try {
            $stmt->execute([":name" => $name, ":image" => $image, ":desc" => $desc, ":cate" => $category, ":stock" => $stock, ":unit_price" => $unit_price, ":visi" => $visi]);
            flash("Successfully created product $name!", "success");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                flash("A product with this name already exists, please try another", "warning");
            } else {
                flash("An unexpected error occured in trying to add this product", "danger");
                //flash(var_export($e->errorInfo, true), "danger");
                error_log($e);
            }
        }
    }
}
?>

<!-- Table should be called Products 
(id, name, description, category, stock, unit_price, visibility [true, false]
created, modified) -->

<h2>Create Product</h2>
<form method="POST">
    <div>
        <label for="name">Name</label>
        <input id="name" name="name" required />
    </div>
    <div>
        <label for="category">Category</label>
        <input id="category" name="category" required />
    </div>
    <div>
        <label for="image">Image URL</label>
        <input id="image" name="image" />
    </div>
    <div>
        <label for="stock">Stock</label>
        <input type="number" step="1" id="stock"  min=0 name="stock" value=1 required />
    </div>
    <div>
        <label for="unit_price">Unit Price</label>
        <input type="number" step=".01" id="unit_price" min=0 value=.01 name="unit_price" required />
        <label>Visibility</label>
    </div>
    
    <div2>
        
        <input type="radio" id="Visible" name="visibility" value="1">
        <label for="Visible">Visible</label><br>
        <input type="radio" id="Hidden" name="visibility" value="0">
        <label for="Hidden">Hidden</label><br>
    </div2>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="d"></textarea>
    </div>
    <input type="submit" value="Create Product" />
</form>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>