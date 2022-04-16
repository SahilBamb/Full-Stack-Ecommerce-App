<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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


?>

<?php
$db = getDB();
//generally try to avoid SELECT *, but this is about being dynamic so I'm using it this time
//$query = "SELECT name, description, category, stock, unit_price FROM Products WHERE visibility=1 AND WHERE name LIKE ORDER BY modified LIMIT 10"; 
$query = "SELECT id, name, description, visibility, category, stock, unit_price FROM Products";

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

$Endquery = " ORDER BY modified";
if (isset($_GET["SortByPrice"])) {
    echo "<h5>" . "Sorting By Price " . "</h5>";
    $Endquery = " ORDER BY unit_price";
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

<h3>List Items</h3>
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
                    <th>Purchase</th>
                </thead>
            <?php endif; ?>
            <tr>
                <?php foreach ($record as $column => $value) : ?>
                    <td><?php se($value, null, "N/A"); ?></td>
                <?php endforeach; ?>

                <td>
                    <a href="product_edit.php?id=<?php se($record, "id"); ?>">Edit</a>
                </td>
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
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>