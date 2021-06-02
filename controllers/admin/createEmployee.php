<?php
session_start();
$root = $_SERVER["DOCUMENT_ROOT"];
include "../../utils/functions.php";
include "../../utils/db.php";

$logged_in_as = get_session("logged_in_as");

if (!$logged_in_as || $logged_in_as !== "admin") {
    set_session("error_code", 403);
    redirect("/error.php");
    return;
}

$form_data = from_form("POST", ["fname", "lname", "email", "address", "branch", "salary"]);

$picture_name = $_FILES["picture"]["name"];
$picture_temp_name = $_FILES["picture"]["tmp_name"];
$picture_type = $_FILES["picture"]["type"];
$picture_extension = explode(".", $picture_name)[1];
$picture_unique_name = uniqid("", true) . "." . $picture_extension; // unique id based on microseconds, e.g. 60b799dc59d441.05495857.jpg 
$picture_path = "/uploads/employees/$picture_unique_name";

// TODO: validate form here. Redirect to "error.php" with code 400 if not valid

extract($form_data);
move_uploaded_file($picture_temp_name, $root . $picture_path);

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
                          '',
                          '$picture_path'
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
