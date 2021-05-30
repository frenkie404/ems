<?php
function get_nav_class_name($nav_action)
{
    global $current_action;
    $class_name = "btn w-content text-center ";
    if ($current_action === $nav_action) {
        return $class_name . "btn--active";
    }
    return $class_name;
}
?>

<nav>
    <ul class="grid grid-flow-row gap-4">
        <li>
            <a href="/dashboard.php?current_action=create_employee" class="<?php echo get_nav_class_name("create_employee") ?>">Create Employee</a>
        </li>
        <li>
            <a href="/dashboard.php?current_action=create_manager" class="<?php echo get_nav_class_name("create_manager") ?>">Create Manager</a>
        </li>
        <li>
            <a href="/dashboard.php?current_action=get_employees" class="<?php echo get_nav_class_name("get_employees") ?>">Get Employees</a>
        </li>
        <li>
            <a href="/dashboard.php?current_action=get_managers" class="<?php echo get_nav_class_name("get_managers") ?>">Get Managers</a>
        </li>
    </ul>
</nav>