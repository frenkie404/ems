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

function get_employees()
{
    $employees = get_session("data");
    if (!$employees) {
        redirect("/controllers/admin/getEmployees.php");
    } else {
        output_table(["#", "First Name", "Last Name", "Email", "Address", "Branch", "Salary", "Bonus", "Date of joining", "Actions"], $employees, "admin");
    }
}

switch ($current_action) {
    case "create_employee":
        include "createEmployeeForm.php";
        break;
    case "create_manager":
        include "createManagerForm.php";
        break;
    case "edit":
        include "editForm.php";
        break;
    case "get_employees":
        get_employees();
        break;
}
