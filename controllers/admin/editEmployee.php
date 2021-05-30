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

$id = get_session("update_id");

$update_employee_query = "UPDATE employees 
                  SET
                    fname = '$fname', 
                    lname = '$lname', 
                    email = '$email', 
                    address = '$address', 
                    branch = '$branch', 
                    salary = '$salary'
                WHERE id='$id'
                  ";

$result = mysqli_query($conn, $update_employee_query);
if ($result) {
    $_SESSION["employees"] = null;
    redirect("/dashboard.php?current_action=get_employees");
} else {
    echo mysqli_error($conn);
}
