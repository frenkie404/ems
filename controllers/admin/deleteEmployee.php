<?php
session_start();
include "../../utils/functions.php";
include "../../utils/db.php";

$logged_in_as = get_session("logged_in_as");
if (!$logged_in_as || $logged_in_as !== "admin") {
    set_session("error_code", 403);
    redirect("/error.php");
    return;
} else if (!isset($_GET["id"])) {
    set_session("error_code", 400);
    redirect("/error.php");
    return;
}

$id = $_GET["id"];

$delete_employee_query = "DELETE FROM employees WHERE id='$id' ";

$result = mysqli_query($conn, $delete_employee_query);
if ($result) {
    $_SESSION["employees"] = null;
    redirect("/dashboard.php?current_action=get_employees");
} else {
    echo mysqli_error($conn);
}
