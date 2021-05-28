<?php
$current_action = "create_employee";
if (isset($_GET["current_action"])) {
    $current_action = $_GET["current_action"];
}

function get_nav_class_name($nav_action)
{
    global $current_action;
    if ($current_action === $nav_action) {
        return "btn btn--active";
    }
    return "btn";
}

include "nav.php";

if ($current_action === "create_employee") {
    include "createEmployeeForm.php";
} else if ($current_action === "create_manager") {
    include "createManagerForm.php";
} else if ($current_action === "get_employees") {
    $employees = get_session("data");
    if (!$employees) {
        redirect("/controllers/admin/getEmployees.php");
    } else {
        output_table(["#", "First Name", "Last Name", "Email", "Address", "Branch", "Salary", "Bonus", "Date of joining", "Actions"], $employees, "admin");
    }
}
