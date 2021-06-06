<?php
$employees = get_session("employees");
$id = $_GET["id"];
set_session("update_id", $id);

function filter_employee()
{
    global $id, $employees;
    $filtered = null;

    for ($i = 0; $i < count($employees); $i++) {
        if ($employees[$i]["id"] === $id) {
            $filtered = $employees[$i];
            break;
        }
    }
    return $filtered;
}

$filtered_employee = filter_employee();
extract($filtered_employee);

function is_option_selected($name, $value)
{
    global $branch, $salary;

    if ($name === "branch" && $value === $branch) {
        return "selected";
    } else if ($name === "salary" && $value == floor($salary)) {
        return "selected";
    }

    return "";
}

?>

<article>
    <h2>Edit Employee</h2>

    <form action="controllers/admin/editEmployee.php" method="POST" class="requiresValidation" id="editForm">
        <div>
            <div>
                <label for="fname">First Name</label>
                <input id="fname" type="text" name="fname" value="<?php echo $fname ?>">
            </div>

            <div>
                <label for="lname">Last Name</label>
                <input id="lname" type="text" name="lname" value="<?php echo $lname ?>">
            </div>

            <div>
                <label for="emailAddress">Email Address</label>
                <input id="emailAddress" type="email" name="email" value="<?php echo $email ?>">
            </div>

            <div>
                <label for="address">Address</label>
                <input id="address" type="address" name="address" value="<?php echo $address ?>">
            </div>

            <div>
                <label for="branch">Branch</label>
                <select name="branch" id="branch">
                    <option value="finance" <?php echo is_option_selected("branch", "finance") ?>>Finance</option>
                    <option value="marketing" <?php echo is_option_selected("branch", "marketing") ?>>Marketing</option>
                    <option value="sales" <?php echo is_option_selected("branch", "sales") ?>>Sales</option>
                    <option value="production" <?php echo is_option_selected("branch", "production") ?>>Production</option>
                    <option value="human resource" <?php echo is_option_selected("branch", "human resource") ?>>Human Resource</option>
                </select>
            </div>

            <div>
                <label for="salary">Salary</label>
                <select name="salary" id="salary">
                    <option value="15000" <?php echo is_option_selected("salary", 15000) ?>>15,000</option>
                    <option value="20000" <?php echo is_option_selected("salary", 20000) ?>>20,000</option>
                    <option value="25000" <?php echo is_option_selected("salary", 25000) ?>>25,000</option>
                    <option value="30000" <?php echo is_option_selected("salary", 30000) ?>>30,000</option>
                    <option value="40000" <?php echo is_option_selected("salary", 40000) ?>>40,000</option>
                    <option value="50000" <?php echo is_option_selected("salary", 50000) ?>>50,000</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <input type="submit" value="Edit Employee" name="editEmployee" />
        </div>
    </form>
</article>