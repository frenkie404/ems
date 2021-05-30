<?php
$user = get_session("user");
if (!$user) {
    redirect("/");
}
extract($user);

if ($is_verified === '0') {
    include "changePassword.php";
} else {
    $employees = get_session("employees");

    if (!$employees) {
        redirect("/controllers/manager/getEmployees.php");
        return;
    }
    output_table(["#", "First Name", "Last Name", "Email", "Address", "Salary", "Bonus", "Date of Joining", "Actions"], $employees, "manager");
}
