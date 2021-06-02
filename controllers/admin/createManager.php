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

$form_data = from_form("POST", ["fname", "lname", "email", "address", "branch"]);


$picture_name = $_FILES["picture"]["name"];
$picture_temp_name = $_FILES["picture"]["tmp_name"];
$picture_type = $_FILES["picture"]["type"];
$picture_extension = explode(".", $picture_name)[1];
$picture_unique_name = uniqid("", true) . "." . $picture_extension; // unique id based on microseconds, e.g. 60b799dc59d441.05495857.jpg 
$picture_path = "/uploads/managers/$picture_unique_name";


// TODO: validate form here. Redirect to "error.php" with code 400 if not valid

extract($form_data);
move_uploaded_file($picture_temp_name, $root . $picture_path);

$current_time = date("Y-m-d H:i:s");
$initial_password = random_int(10000, 90000);

$insert_manager_query = "INSERT INTO managers 
                  VALUES(
                          '', 
                          '$fname', 
                          '$lname', 
                          '$email', 
                          '$address', 
                          '$branch',
                          '$current_time', 
                          '$initial_password',
                          '',
                          '$picture_path'
                          )
                  ";

$result = mysqli_query($conn, $insert_manager_query);

if ($result) {
    // TODO: send an email with default password

    $_SESSION["managers"] = null;
    redirect("/dashboard.php?current_action=create_manager");
} else {
    echo mysqli_error($conn);
}
