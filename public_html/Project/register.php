


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

<link rel="stylesheet" href="form.css">

<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<div class="container-fluid">
    <h1>Register</h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" required maxlength="30" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="pw">Password</label>
            <input class="form-control" type="password" id="pw" name="password" required minlength="8" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="confirm">Confirm</label>
            <input class="form-control" type="password" name="confirm" required minlength="8" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Register" />
    </form>
</div>
<script>
    //register.php (email, username, password length)
    function validate(form) {
        let pw = form.password.value;
        let con = form.confirm.value;
        let usn = form.username.value;
        let email = form.email.value;
        let isValid = true;
        
        //example of using flash via javascript
        //find the flash container, create a new element, appendChild

        //Queuing up all errors
        
        //Checks if email is empty 
        if ((email === "")) {flash("Email cannot be empty", "warning"); isValid=false;} 

        else {
            //If it is not empty, checks if email is correct format
            const regexEmail = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;
            if (!regexEmail.test(email)) {flash("Invalid email address", "warning"); isValid=false;}
        }

        //Checks if username is empty (also isSet)
        if ((usn === "")) {flash("Username cannot be empty", "warning"); isValid=false;} 

        else {
            //If it is not empty, checks if username is correct format
            const regexUsername = /^[a-z0-9_-]{3,16}$/;
            if (!regexUsername.test(usn)) {flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "warning"); isValid=false;}
        }

        //Checks if password and confirm password are empty
        if ((pw==="") || (con==="")){
            flash("Please input both the new password and confirm password", "warning"); isValid=false;
        }
        else {
            //If not empty, checks if password not equal to confirm password and password length is less than 8
            if (pw !== con){flash("Password does not match confirm password", "warning"); isValid=false;}
            if (pw.length < 8) {flash("Password is not long enough", "warning"); isValid=false;}
        }
        
        return isValid;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"]) && isset($_POST["username"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se(
        $_POST,
        "confirm",
        "",
        false
    );
    $username = se($_POST, "username", "", false);
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!preg_match('/^[a-z0-9_-]{3,16}$/i', $username)) {
        flash("Username must only be alphanumeric and can only contain - or _", "danger");
        $hasError = true;
    }
    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty", "danger");
        $hasError = true;
    }
    if (strlen($password) < 8) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (strlen($password) > 0 && $password !== $confirm) {
        flash("Passwords must match", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password, username) VALUES(:email, :password, :username)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username]);
            flash("Successfully registered!");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
            //flash("Sorry that username or email has been taken", "danger");
            //flash("<pre>" . var_export($e, true) . "</pre>", "danger");
        }
    }
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>