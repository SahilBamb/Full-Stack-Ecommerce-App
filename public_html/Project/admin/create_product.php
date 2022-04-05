
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
    $cate = se($_POST, "category", "", false);
    $stock = se($_POST, "stock", "", false);
    $unit_price = se($_POST, "unit_price", "", false);
    $desc = se($_POST, "description", "", false);
    $visi = se($_POST, "visibility", "", false);
    if (empty($name)) {
        flash("Name is required", "warning");
    } else {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Products (name, description, category, stock, unit_price, visibility) VALUES(:name, :desc, :cate, :stock, :unit_price, :visi)");
        try {
            $stmt->execute([":name" => $name, ":desc" => $desc, ":cate" => $cate, ":stock" => $stock, ":unit_price" => $unit_price, ":visi" => $visi]);
            flash("Successfully created product $name!", "success");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                flash("A role with this name already exists, please try another", "warning");
            } else {
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
    }
}
?>


<!-- Table should be called Products 
(id, name, description, category, stock, unit_price, visibility [true, false]
created, modified) -->

<h1>Create Product</h1>
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
        <label for="stock">Stock</label>
        <input type="number" step="1" id="stock" name="stock" value=1 required />
    </div>
    <div>
        <label for="unit_price">Unit Price</label>
        <input type="number" step=".01" id="unit_price" value=.01 name="unit_price" required />
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