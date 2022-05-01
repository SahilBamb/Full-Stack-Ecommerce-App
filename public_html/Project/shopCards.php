<!-- <link rel="stylesheet" href="mystyle.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<title>Shop Page</title>

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

</style>


<script>


function submitform(){
	document.getElementById("ShopStyle").submit();
    
}


function add_to_cart(item_id, quantity = 1) {
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
            flash("There was a problem adding the item to cart", "danger");
        });
    }



</script>

<?php
require(__DIR__ . "/../../partials/nav.php");
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

<br>
<h2 style="text-align: center">Shop</h2>
<hr>
<!-- <h3>Filters</h3>
<div id="emailHelp" class="form-text">Submit empty fields to clear filters</div> -->
<div class="container py-9">
<form onsubmit="return validate(this)" method="GET">
    <div class="form-row align-items-center">
        <div class="col-auto">
            <label class="sr-only" for="search">Search</label>
            <input type="text" class="form-control" id="search" value="<?php if (isset($_GET['search'])) se($_GET['search']); ?>" name="search" placeholder="search name"/>
        </div>
        <div class="col-auto">
            <label for="category" class="sr-only" >Category</label>
            <input type="text" id="category" class="form-control" value="<?php if (isset($_GET['category'])) se($_GET['category']); ?>" name="category" placeholder="search category" maxlength="30" />
        </div>
        <div class="col-auto">
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="SortByPrice" name="SortByPrice" value="1">
                <label class="form-check-label" for="SortByPrice">Sort By Price</label>
            </div>
        </div>
        <div class="col-auto">
            <input type="submit" class="btn btn-primary"/>
        </div>
    </div>
</form>
</div>

<div class="container">



<form onsubmit="return validate(this)" id="ShopStyle" method="GET">
    <div class="form-check form-switch">
        <input class="form-check-input" onclick="submitform()" type="checkbox" role="switch" name="shopStyle" id="flexSwitchCheckChecked" <?php if (se($_GET,'shopStyle',"",false)=="on") echo "checked";?>>
        <label class="form-check-label" for="flexSwitchCheckChecked">Shop as Catalog</label>
    </div>
</form>


<?php if (count($results) == 0) : ?>
    <p  style="text-align: center">No results to show</p>
<?php else : ?>

<?php if (isset($_GET['shopStyle']) && ($_GET['shopStyle']=="on")) :?> 

    <table class="table">
        <?php foreach ($results as $index => $record) : ?>
            <?php if ($index == 0) : ?>
                <thead>
                    <?php foreach ($record as $column => $value) : ?>
                        <?php if (($column=='id') || ($column=='image')) : continue; endif  ?> <!-- skips product id row from displaying -->
                        <th><?php se($column); ?></th>
                    <?php endforeach; ?>
                    <th>Product Page</th>
                    <th>Purchase</th>
                    <?php if (has_role("Admin")) : echo '<th>Edit</th>'; endif; ?>
                </thead>
            <?php endif; ?>
            <tr>
                <?php foreach ($record as $column => $value) : ?>
                    <?php if (($column=='id') || ($column=='image')) : continue; endif  ?> <!-- skips product id row from displaying -->
                    <td>
                    <?php if   ( (is_numeric($value)) && ((int) $value != $value) ) :  echo "$"; endif; ?>
                    <?php se($value, null, "N/A"); ?>
                    </td>

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

</div>


<?php else : ?>

<div class="container">
<div class="row row-cols-1 row-cols-md-4 g-4">
    <?php foreach ($results as $index => $record) : ?>
        
        <?php echo '<div class="col">'; ?>
        <div class="card" style="width: 18rem;">
            <img src="<?php se($record,'image',"http://cohenwoodworking.com/wp-content/uploads/2016/09/image-placeholder-500x500.jpg",true); ?>" class="card-img-top" style="max-height: 200px; max-width:300px; overflow: hidden" alt="...">
            
                <div class="card-body">
                    <h5 class="card-title"><?php se($record,'name',"",true); ?></h5>
                    <small class="text-muted"><?php echo ucfirst(se($record,'category',"",false)); ?></small>
                        <p class="text-success">$<?php se($record, 'unit_price'); ?></p>
                        <p class="card-text"><?php echo substr(se($record,'description',"",false),0,60); if (strlen(se($record,'description',"",false))>60) echo "..."; ?></p>
                    <button onclick="add_to_cart('<?php se($record, 'id'); ?>')" class="btn btn-primary">Add to Cart</button>
                    <a href="product_page.php?id=<?php se($record, "id"); ?>" class="btn btn-secondary">View Product</a>
                    
                </div>
                <div class="card-footer">
                    <small class="text-muted"><?php se($record,'stock',"",true); ?> in Remaining in Stock</small>
                    <?php if (has_role("Admin")) { ?><a href="/../Project/admin/product_edit.php?id=<?php se($record, "id"); ?>">Edit</a> <?php } ?>
                </div>

            </div>
        <?php foreach ($record as $column => $value) : ?>
        <?php endforeach; ?>   
        <br>
        <?php echo '</div>'; ?>     
    <?php endforeach; ?>
    </div>
</div>

<?php endif; ?>

<?php endif; ?>
<!-- se($_GET, "category", "", false) -->


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
require_once(__DIR__ . "/../../lib/functions.php");
// error_log("add_to_cart received data: " . var_export($_REQUEST, true));
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