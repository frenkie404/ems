<?php
function validate_admin($form_data)
{
    extract($form_data);

    if ($username === "admin" && $password === "admin") {
        set_session("logged_in_as", "admin");
        redirect("/dashboard.php");
    }
}
