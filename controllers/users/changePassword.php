<?php
session_start();
include "../../utils/functions.php";
include "../../utils/db.php";

$logged_in_as = get_session("logged_in_as");
$table = $logged_in_as . "s";
$user = get_session("user");

if (!$logged_in_as || $user["is_verified"] !== '0') {
    set_session("error_code", 403);
    redirect("/error.php");
}

if (!isset($_POST["changePassword"])) {
    set_session("error_code", 400);
    redirect("/error.php");
}

$email = $user["email"];
$oldPassword = $_POST["oldPassword"];
$password = $_POST["password"]; // realmanager123
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$update_query = "UPDATE $table SET password='$hashed_password', is_verified=1 WHERE email='$email' AND password='$oldPassword'";

$result = mysqli_query($conn, $update_query);
print_r($result);
if ($result) {
    $_SESSION["user"] = null;
    $_SESSION["logged_in_as"] = null;
    redirect("/dashboard.php");
} else {
    echo mysqli_error($conn);
}
