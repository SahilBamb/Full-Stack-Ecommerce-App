

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>
<!--<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="form.css"> -->


<script>

</script>

<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
    <li class="breadcrumb-item active" aria-current="page">Product Page</li>
  </ol>
</nav>

<?php

$db = getDB();

//generally try to avoid SELECT *, but this is about being dynamic so I'm using it this time

//echo "<pre>" . var_export($_SESSION, true) . "</pre>";
//echo "<pre>" . var_export($_GET, true) . "</pre>";


if (!isset($_GET["id"])) {
    flash("That is not a valid product", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

$id = $_GET["id"]; //NEEDS SANITIZING

//NEEDS SANITIZING
$query = "SELECT name, description, category, stock, unit_price, image FROM Products WHERE visibility=1 AND id='" . $id . "' ";

$stmt = $db->prepare($query);
$results = [];
try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<pre>" . var_export($e, true) . "</pre>";
}

//echo "<pre>" . var_export($results, true) . "</pre>";

if (count($results) != 0) :
    $name = $results[0]['name'];
    $descr = $results[0]['description'];
    $category = $results[0]['category'];
    $category = strtoupper($category);
    $stock = $results[0]['stock'];
    $unit_price = $results[0]['unit_price'];
    $image = $results[0]['image'];
    $sale = 0;
    $stars = 2;

endif;

?>

<br>
<br>
<br>
<?php if (count($results) == 0) : ?>
    <p>Product does not exist</p>
<?php else : ?>

<div class="container">
  <div class="row">
    <div class="col">
        <div class="text-center">
            <?php if (isset($results[0]['image'])) : ?> 
            <img src="<?php echo $image ?>" class="rounded" style="max-height:450px; max-width:450px; overflow: hidden"> 
            <?php else : ?> 
            <img src="http://cohenwoodworking.com/wp-content/uploads/2016/09/image-placeholder-500x500.jpg" class="rounded">
            <?php endif; ?>
        </div>
    </div>
    <div class="col">
        <h1> <?php echo $name ?> <?php if ($sale>0) : ?> <span class="badge bg-secondary">Sale</span> <?php endif; ?></h1> 
            
            <dl class="row">
                <dt class="col-sm-3">Category</dt>
                <dd class="col-sm-9">
                        <?php echo $category ?>
                </dd>
               
                <dt class="col-sm-3">Rating</dt>

                <dd class="col-sm-9">
                    <div>
                        <?php 
                            for ($x = 0; $x <= 5; $x++) {
                                if ($x<=$stars) :
                                    echo '<i class="bi-star-fill" style="font-size: 1rem; color: goldenrod;"></i>';
                                else :
                                    echo '<i class="bi-star" style="font-size: 1rem; color: goldenrod;"></i>';
                                endif;
                            } 
                        ?>
                    </div>    
                </dd>
                
                <dt class="col-sm-3">In Stock</dt>
                <dd class="col-sm-9"><?php echo $stock ?></dd>
                <dt class="col-sm-3">
                    <p class="fs-3" >
                        Price
                    </p>
                </dt>
                <dd class="col-sm-9">
                    <?php if ($sale==0) : ?>
                    <p class="fs-3" style="font-size: 1rem; color: green;" >
                        $<?php echo $unit_price ?>
                    </p>
                    <?php else : ?>
                    <p class="fs-2" >
                        <div>
                            <p class="text-decoration-line-through">
                                $<?php echo $unit_price ?>
                            </p>
                            $<?php echo round(($unit_price * $sale),2) ?>
                        </div>
                    </p>
                    <?php endif; ?>
                </dd>
                <dt class="col-sm-3">
                    <p class="fs-4" >
                        Description
                    </p>
                </dt>
                <dd class="col-sm-9">
                    <p class="fs-4" >
                        <?php echo $descr ?>
                    </p>
                </dd>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button">Add to Cart</button>
                    <button class="btn btn-primary" type="button" disabled>Buy Now</button>
                    <p class="text-center">
                        <i class="bi-geo-fill"></i> Free Shipping & Free Returns
                    </p>
                </div>   
        </dl>
    </dd>
    </dl>

    </div>
  </div>
</div>

<?php endif; ?>


<!-- se($_GET, "category", "", false) -->
