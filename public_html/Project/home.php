
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

<link rel="stylesheet" href="mystyle.css">

<?php

require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Home</h1>
<div>
<?php
if (is_logged_in()) {
    //echo "Welcome home, " . get_user_email();
    echo "Welcome home, " . get_username();
    //comment this out if you don't want to see the session variables
    //echo "<pre>" . var_export($_SESSION, true) . "</pre>";
} else {
    echo "You're not logged in";
}
?>
</div>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>


