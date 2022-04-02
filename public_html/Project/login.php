
<!-- <link rel="stylesheet" href="mystyle.css"> -->


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="form.css">


<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<div class="container"> <!-- added this div pair -->
<form onsubmit="return validate(this)" method="POST">
    <h1>Login to Account</h1>
    <div>
        <label for="email">Email/Username</label>
        <input type="text" name="email" required />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <input type="submit" value="Login" />
</form>
</div>

<script>
    function validate(form) {
        let isValid = true; 
        let email = form.email.value;
        //Queuing up all errors
        
        //Checks if email is empty
        if ((email === "")) {flash("Email cannot not be empty", "warning"); isValid=false;} 

         //Also checks if password is empty
        if ((form.password.value === "")) {flash("Password cannot not be empty", "warning"); isValid=false;} 

        if (form.email.value.includes("@")) {
            //Checking if it is a valid EMAIL
            if (form.email.value.length < 8) {flash("Email is not long enough", "warning"); isValid=false;};
            const regexEmail = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;
            if (!regexEmail.test(form.email.value)) {flash("Email format is not correct", "warning"); isValid=false;}
        }
        
          //Checking if it is a valid USERNAME
        else {
            const regexUsername = /^[a-z0-9_-]{3,16}$/;
            if (!regexUsername.test(form.email.value)) {
                flash("Username format is not correct", "danger"); 
                isValid=false;
                }
        }    

        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        console.log(isValid);
        return isValid;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);

    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email cannot not be empty", "danger");
        $hasError = true;
    }

    if (str_contains($email, "@")) {
        //sanitize
        $email = sanitize_email($email);
    
        //validate
        if (!is_valid_email($email)) {
            flash("Invalid email address", "danger");
            $hasError = true;
        }
    } else {
        if (!is_valid_username($email)) {
            flash("Invalid username", "danger");
            $hasError = true;
        }
    }

    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }

    if (!is_valid_password($password)) {
        flash("Password too short");
        $hasError = true;
    }

    //I don't think this should be here
    if (strlen($password) < 8) {
        flash("Password too short", "danger");
        $hasError = true;
    }    
    
    if (!$hasError) {
        //TODO 4
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, username, password from Users where email = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        flash("Welcome $email");
                        $_SESSION["user"] = $user;
                        //Why were these try taken away?
                        try {
                            //lookup potential roles
                            $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                            JOIN UserRoles on Roles.id = UserRoles.role_id 
                            where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");
                            $stmt->execute([":user_id" => $user["id"]]);
                            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                        } catch (Exception $e) {
                            error_log(var_export($e, true));
                        }
                        //save roles or empty array
                        //why is this $roles instead of isset($roles)
                        if (isset($roles)) { 
                            $_SESSION["user"]["roles"] = $roles; //at least 1 role
                        } else {
                            $_SESSION["user"]["roles"] = []; //no roles
                        }
                        flash("Welcome, " . get_username());
                        die(header("Location: home.php"));

                    } else {
                        flash("Invalid password", "danger");
                    }
                } else {
                    flash("Email not found", "danger");
                }
            }
        }   catch (Exception $e) {
            flash("There was a problem logging-in", "danger");
            //flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>