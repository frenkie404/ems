<?php
session_start();
include "../../utils/functions.php";
include "../../utils/db.php";

$logged_in_as = get_session("logged_in_as");

if (!$logged_in_as || $logged_in_as !== "admin") {
    set_session("error_code", 403);
    redirect("/error.php");
    return;
} else if (!isset($_POST["createManager"])) {
    set_session("error_code", 400);
    redirect("/error.php");
    return;
}

$form_data = from_form("POST", ["fname", "lname", "email", "address", "branch"]);
extract($form_data);

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
                          ''
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
