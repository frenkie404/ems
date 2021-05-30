<?php

function validate_manager($form_data)
{
    include "../../utils/db.php";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    extract($form_data);

    $read_query = "SELECT id, fname, lname, email, address, branch, date_of_joining, is_verified, password FROM managers WHERE email='$username'";

    try {
        $result = mysqli_query($conn, $read_query);
    } catch (Exception $e) {
        echo $e;
    }

    if ($result->num_rows) {
        $fetched_assoc = mysqli_fetch_assoc($result);
        $password_in_db = $fetched_assoc["password"];
        if ($fetched_assoc["is_verified"]  === '1' && password_verify($password, $password_in_db)) {
            set_session("logged_in_as", "manager");
            set_session("user", $fetched_assoc);
            redirect("/dashboard.php");
        } else if ($password === $password_in_db) {
            set_session("logged_in_as", "manager");
            set_session("user", $fetched_assoc);
            redirect("/dashboard.php");
        }
    } else {
        set_session("error_code", 401);
        redirect("/error.php");
    }
}
