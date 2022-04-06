
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

<!-- <link rel="stylesheet" href="mystyle.css"> -->

<script>

function fun() {  
            var btn = document.createElement("button");  
            btn.innerHTML = "Click me";  
            document.body.appendChild(btn);  
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
$query = "SELECT name, description, category, stock, unit_price FROM Products WHERE visibility=1 ORDER BY modified LIMIT 10";

//echo "<pre>" . var_export($_SESSION, true) . "</pre>";

if (isset($_SESSION["search"]) || isset($_SESSION["category"])) {

    echo "<h2>" . "Filter Applied" . "</h2>";

}

if (isset($_SESSION["search"])) {

    $search = $_SESSION["search"];
    $query = "SELECT name, description, category, stock, unit_price FROM Products WHERE visibility=1 AND name LIKE $search ORDER BY modified LIMIT 10";

}

if (isset($_SESSION["category"])) {

    $category = $_SESSION["category"];
    $query = "SELECT name, description, category, stock, unit_price FROM Products WHERE visibility=1 AND category LIKE $category ORDER BY modified LIMIT 10";
    

}
$stmt = $db->prepare($query);
$results = [];
try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<pre>" . var_export($e, true) . "</pre>";
}
?>

<h3>View Products</h3>
<?php if (count($results) == 0) : ?>
    <p>No results to show</p>
<?php else : ?>
    <table>
        <?php foreach ($results as $index => $record) : ?>
            <?php if ($index == 0) : ?>
                <thead>
                    <?php foreach ($record as $column => $value) : ?>
                        <th><?php se($column); ?></th>
                    <?php endforeach; ?>
                    <th>Purchase</th>
                </thead>
            <?php endif; ?>
            <tr>
                <?php foreach ($record as $column => $value) : ?>
                    <td><?php se($value, null, "N/A"); ?></td>
                <?php endforeach; ?>

                <td>
                    <a href="dynamic_edit.php?id=<?php se($record, "id"); ?>">Buy</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<form onsubmit="return validate(this)" method="POST">
    <h3>Filters</h3>
    <div>
        <label for="search">Search</label>
        <input type="text" name="search" required />
    </div>
    <div>
        <label for="category">Category</label>
        <input type="text" name="category" required maxlength="30" />
    </div>
    <div>
        <label for="SortByPrice">Sort By Price</label>
        <input type="checkbox" id="SortByPrice" name="SortByPrice" value="1">
    </div>

    <input type="submit" value="Filter" />
</form>


<?php 

if (isset($_POST["search"]) && isset($_POST["category"])) {

    $search = se($_POST, "search", "", false);
    $category = se($_POST, "category", "", false);

    $hasError = false;

    if (empty($search)) {
        flash("Search field is empty", "danger");
        $hasError = true;
    }

    if (empty($category)) {
        flash("Category field is empty", "danger");
        $hasError = true;
    }
    
    if (!$hasError) {
        $db = getDB();
        $query = "SELECT name, description, category, stock, unit_price FROM Products WHERE visibility=1 ORDER BY modified LIMIT 1"; 
        $stmt = $db->prepare($query);
        $results = [];
        $_SESSION["search"]=$_POST["search"];
        $_SESSION["category"]=$_POST["category"];
        //echo "<pre>" . var_export($_SESSION, true) . "</pre>";
        try {
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<pre>" . var_export($e, true) . "</pre>";
        }

    }
}
?>