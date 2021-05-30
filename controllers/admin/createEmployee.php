<?php
session_start();
include "../../utils/functions.php";
include "../../utils/db.php";

$logged_in_as = get_session("logged_in_as");

if (!$logged_in_as || $logged_in_as !== "admin") {
    set_session("error_code", 403);
    redirect("/error.php");
    return;
}

$form_data = from_form("POST", ["fname", "lname", "email", "address", "branch", "salary"]);
extract($form_data);

// TODO: validate form here. Redirect to "error.php" with code 400 if not valid

$current_time = date("Y-m-d H:i:s");
$initial_password = random_int(10000, 90000);

$insert_employee_query = "INSERT INTO employees 
                  VALUES(
                          '', 
                          '$fname', 
                          '$lname', 
                          '$email', 
                          '$address', 
                          '$branch', 
                          '$salary',
                          '', 
                          '$current_time', 
                          '$initial_password',
                          ''
                          )
                  ";

$result = mysqli_query($conn, $insert_employee_query);

if ($result) {
    // TODO: send an email with default password
    $_SESSION["employees"] = null;
    redirect("/dashboard.php");
} else {
    echo mysqli_error($conn);
}
