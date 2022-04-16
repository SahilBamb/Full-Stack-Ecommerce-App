<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/../form.css">

<?php
require_once(__DIR__ . "/../../../partials/nav.php");
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}
if (!isset($_GET['id'])) {
    flash("There is no product to edit", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

?>

<?php

//echo var_export($_POST);
//echo var_export($_GET);

if (isset($_POST["save"])) {

    $name = se($_POST, "name", null, false);
    $category = se($_POST, "category", null, false);
    $stock = se($_POST, "stock", null, false);
    $unit_price = se($_POST, "unit_price", null, false);0;
    $visibility = se($_POST, "visibility", null, false);
    $descr = se($_POST, "descr", null, false);
    $id = se($_GET, "id", null, false);

    $hasError = false;
    //sanitize

    //validate
/*     if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    } */

    //writing to db
    if (!$hasError) {
        $params = [":name" => $name, ":category" => $category, ":stock" => $stock, ":unit_price" => $unit_price, ":visibility" => $visibility, ":descr" => $descr, ":id" => $id];
        $db = getDB();
        
        $stmt = $db->prepare("UPDATE Products set name = :name, category = :category, stock = :stock, unit_price = :unit_price, visibility = :visibility, description = :descr where id = :id");

        try {
            $stmt->execute($params);
            flash("Product Updated", "success");
        } catch (Exception $e) {
            echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            flash("There was an unexpected error", "danger");
            
            //users_check_duplicate($e->errorInfo);
        }
        //select fresh data from table
        /* $stmt = $db->prepare("SELECT id, email, username from Users where id = :id LIMIT 1");
        try {
            $stmt->execute([":id" => get_user_id()]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                //$_SESSION["user"] = $user;
                $_SESSION["user"]["email"] = $user["email"];
                $_SESSION["user"]["username"] = $user["username"];
            } else {
                flash("User doesn't exist", "danger");
            }
        } catch (Exception $e) {
            flash("An unexpected error occurred, please try again", "danger");
            //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        } */
    }

    //check/update password
/*     $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false); */

}
?>

<?php
        $id = se($_GET, "id", null, false);
        $params = [":id" => $id];
        $db = getDB();
        
        $stmt = $db->prepare("SELECT name, category, stock, unit_price, visibility, description FROM Products where id = :id");

        try {
            $stmt->execute($params);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //flash("Product Loaded", "success");
        } catch (Exception $e) {
            echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            flash("There was an unexpected error", "danger");
            
            //users_check_duplicate($e->errorInfo);
        } 
    
    $name = se($results[0], "name", null, false);
    $category = se($results[0], "category", null, false);
    $stock = se($results[0], "stock", null, false);
    $unit_price = se($results[0], "unit_price", null, false);0;
    $visibility = se($results[0], "visibility", null, false);
    $descr = se($results[0], "description", null, false);
    $id = se($results[0], "id", null, false);
?>

<div class="container-fluid">  
    <h1>Product Edit</h1>
    <form method="POST" onsubmit="return validate(this);">
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="<?php echo $name ?>" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="category">Category</label>
            <input class="form-control" type="text" name="category" id="category" value="<?php echo $category ?>" />
        </div>
        <!-- DO NOT PRELOAD PASSWORD -->
        <div class="mb-3">
            <label class="form-label" for="stock">Stock</label>
            <input class="form-control" type="number" name="stock" id="stock" value="<?php echo $stock ?>"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="np">Unit Price</label>
            <input class="form-control" type="number" name="unit_price" step="any" id="unit_price" value="<?php echo $unit_price ?>"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="descr">Description</label>
            <input class="form-control" type="text" name="descr" id="descr" value="<?php echo $descr ?>"/>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="visibility" value="1" id="flexRadioDefault1" <?php if ($visibility==1) : echo "checked"; endif;?>>
            <label class="form-check-label" for="flexRadioDefault1">
                Visible
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="visibility" value="0" id="flexRadioDefault2" <?php if ($visibility==0) : echo "checked"; endif;?>>
            <label class="form-check-label" for="flexRadioDefault2">
                Hidden
            </label>
        </div>

        <input type="submit" class="mt-3 btn btn-primary" value="Update Product" name="save" />
    </form>
</div>

<script>
    //profile.php (email, username, current/new password length, new == confirm password (given))
    function validate(form) {

        let name = form.name.value;
        let category = form.category.value;
        let stock = form.stock.value;
        let unit_price = form.unit_price.value;
        let visibility = form.visibility.value;
        let isValid = true;

        return isValid;
    }
</script>

<?php
require_once(__DIR__ . "/../../../partials/flash.php");
?>