<?php
require_once(__DIR__ . "/../../lib/functions.php");
error_log("add_to_cart received data: " . var_export($_REQUEST, true));
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
//handle the potentially incoming post request
$item_id = (int)se($_POST, "item_id", null, false);
$response = ["status" => 400, "message" => "Invalid data"];
$mess = "";

http_response_code(400);
if (isset($item_id)) {
    if (is_logged_in()) {
        $db = getDB();
        error_log($item_id);
        if (empty($item_id)) {
            $stmt = $db->prepare("DELETE FROM Cart WHERE user_id = :uid");
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            $mess = "Cleared Cart";
        }
        else {
            $stmt = $db->prepare("DELETE FROM Cart WHERE user_id = :uid AND item_id = :iid");
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            $stmt->bindValue(":iid", $item_id, PDO::PARAM_INT);
            $mess = "Cleared all of that item from cart";
        }
        try {
            $stmt->execute();
            $response["status"] = 200;
            $response["message"] = $mess;
            //$response["message"] = "Item added to cart";
            http_response_code(200);
        } catch (PDOException $e) {
            error_log("Add to cart error: " . var_export($e, true));
            $response["message"] = "Error adding item to cart";
        }
    } else {
        http_response_code(403);
        $response["status"] = 403;
        $response["message"] = "Must be logged in to add to cart";
        //flash("Please login to add to cart", "Danger");
    }
}
echo json_encode($response);

