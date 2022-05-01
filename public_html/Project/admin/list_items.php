<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/../../../Project/form.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


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
 //sb59 4/18 - original query that will be appended onto 
$query = "SELECT id, name, description, image, category, stock, unit_price FROM Products WHERE 1=1";
$nolimitQuery = "SELECT COUNT(id) as total FROM Products WHERE 1=1";


if (!has_role("Admin")) {
    $query.=" AND visibility=1";
    $nolimitQuery.=" AND visibility=1";
}


if (isset($_GET["search"]) || isset($_GET["category"]) || (isset($_GET["SortByPrice"]))) {

    //sb59 4/18 - This checks if its empty and then clears the GET fields, allowing for users to
    //clear filters by inputting empty values in the filter form
    if (isset($_GET["search"]) && $_GET["search"]=="") {unset($_GET['search']);}
    if (isset($_GET["category"]) && $_GET["category"]=="") {unset($_GET['category']);}
    if (isset($_GET["search"]) || isset($_GET["category"]) || (isset($_GET["SortByPrice"]))) echo "<h2>" . "Filters Applied" . "</h2>";

}

$search = "";
$category = "";
 //sb59 4/18 - if the $_GET search variable is set, this adds the term to a variable and adds
 //a partial query with a placeholder which it appends onto the query
if (isset($_GET["search"])) {
    echo "<h5>" . "Searching: " . $_GET["search"] . "</h5>";
    $search = "%" . se($_GET, "search", "", false) . "%";
    $subqery = " AND name LIKE :sch"; 
    $query .=$subqery;
    $nolimitQuery.=$subqery;
}
 //sb59 4/18 - if the $_GET category variable is set, it does the same as search
 //The actual query works as a LIKE '%word%' where it matches the word in any location
if (isset($_GET["category"])) {
    echo "<h5>" . "Category: " . $_GET["category"] . "</h5>";
    $category = "%" . se($_GET, "category", "", false) . "%";
    $subqery = " AND category LIKE :ctgry"; 
    $query .=$subqery;
    $nolimitQuery.=$subqery;
} 
 //sb59 4/18 - if the $_GET price variable is set, this will simply sort by unit_price
 //again using a partial query
$Endquery = " ORDER BY modified";
if (isset($_GET["SortByPrice"])) {
    echo "<h5>" . "Sorting By Price " . "</h5>";
    $Endquery = " ORDER BY unit_price";
}
$query .=$Endquery;

$page = se($_GET, "page", 1, false);
$per_page = 10;
$offset = ($page - 1) * $per_page;
$limit = " LIMIT :offset, :per_page";
$query .=$limit;

//Runs query to tell total pages and products
$stmt = $db->prepare($nolimitQuery);
if (!(empty($search))) {$stmt->bindValue(':sch', $search, PDO::PARAM_STR);}
if (!(empty($category))) {$stmt->bindValue(":ctgry", $category, PDO::PARAM_STR);}

$results = [];
try {
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<pre>" . var_export($e, true) . "</pre>";
}

if (isset($results)) {
    $totalProducts = (int)se($results, "total", 0, false);
}



//sb59 4/18 - This checks if the variables are empty, if they are not it will bind the string values to each placeholder
$stmt = $db->prepare($query);
if (!(empty($search))) {$stmt->bindValue(':sch', $search, PDO::PARAM_STR);}
if (!(empty($category))) {$stmt->bindValue(":ctgry", $category, PDO::PARAM_STR);}
$stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
$stmt->bindValue(":per_page", $per_page, PDO::PARAM_INT);

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

<p class="text-center">
                        <a class="responsive-content btn btn-light" id="rateOrderBtn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Filters
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample"> 
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
                    </div>


<!-- Pagination (uses page files from query section and getGETURL from functions.php) -->

<nav aria-label="Page navigation example" style="align-items: center; justify-content: center;">
    <ul2 class="pagination justify-content-center">
    
        <li class="page-item <?php if ($page-1<=0) echo "disabled" ?>">
            <a class="page-link" href="<?php se(getGETURL($page-1)); ?>">Previous</a>
        </li>
    <?php if ($page>1): ?>
        <!-- <a class="page-link" href="?" tabindex="-1">Previous</a> -->
        <li class="page-item <?php if ($page-1<=0) echo "disabled" ?>">
            <a class="page-link" href="<?php se(getGETURL($page-1)); ?>">
                <?php se($page-1); ?>
            </a>
        </li>
    <?php endif; ?>
    <li class="page-item active">
        <a class="page-link" href="#" >
            <?php se($page); ?>
        </a>
    </li>
    <?php if ($page<($totalProducts/$per_page)): ?>
    <li class="page-item <?php if ($page>($totalProducts/$per_page)) echo "disabled" ?>">
        <a class="page-link" href="<?php se(getGETURL($page+1)); ?>">
            <?php se($page+1); ?>
        </a>
    </li>
    <?php endif; ?>
    <li class="page-item <?php if ($page>=($totalProducts/$per_page)) echo "disabled" ?>">
        <a class="page-link" href="<?php se(getGETURL($page+1)); ?>">Next</a>
    </li>
  </ul2>
</nav>

<br>



<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>