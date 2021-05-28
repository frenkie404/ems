<?php

function validate_manager($form_data)
{
    include "../../utils/db.php";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    extract($form_data);

    $read_query = "SELECT id, fname, lname, email, address, branch, date_of_joining FROM managers WHERE email='$username' AND password='$password'";

    try {
        $result = mysqli_query($conn, $read_query);
    } catch (Exception $e) {
        echo $e;
    }

    if ($result->num_rows) {
        set_session("logged_in_as", "manager");
        redirect("/dashboard.php");
    } else {
        set_session("error_code", 401);
        redirect("/error.php");
    }
}
