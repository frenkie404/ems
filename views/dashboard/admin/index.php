<?php
$current_action = "create_employee";
if (isset($_GET["current_action"])) {
    $current_action = $_GET["current_action"];
}

include "nav.php";

function get_employees()
{
    $employees = get_session("employees");
    if (!$employees) {
        redirect("/controllers/admin/getEmployees.php");
    } else {
        output_table(["#", "First Name", "Last Name", "Email", "Address", "Branch", "Salary", "Bonus", "Date of joining", "Actions"], $employees, "admin");
    }
}

function get_managers()
{
    $managers = get_session("managers");
    if (!$managers) {
        redirect("/controllers/admin/getManagers.php");
    } else {
        output_table(["#", "First Name", "Last Name", "Email", "Address", "Branch", "Date of joining", "Actions"], $managers, "admin");
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
    case "get_managers":
        get_managers();
        break;
}
