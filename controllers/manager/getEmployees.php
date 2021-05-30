<?php
session_start();
include "../../utils/functions.php";
include "../../utils/db.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$logged_in_as = get_session("logged_in_as");
$user = get_session("user");

if (!$logged_in_as || $logged_in_as !== "manager") {
    set_session("error_code", 403);
    redirect("/error.php");
    return;
}

$branch = $user["branch"];

$read_query = "SELECT id, fname, lname, email, address, salary, bonus, date_of_joining FROM employees WHERE branch='$branch'";

try {
    $result = mysqli_query($conn, $read_query);
} catch (Exception $e) {
    echo $e;
}

if ($result) {
    $rows = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $rows[] = $row;
    }
    header("HTTP/1.1 200 Ok");
    set_session("employees", $rows);
    redirect("/dashboard.php");
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo "error";
    // echo mysqli_error($conn);
}
