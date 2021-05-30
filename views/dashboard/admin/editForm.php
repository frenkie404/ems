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

<article class=" h-3/5 p-6  bg-white rounded-md shadow-lg">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Employee</h2>

    <form action="controllers/admin/editEmployee.php" method="POST">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-gray-700" for="fname">First Name</label>
                <input id="fname" type="text" name="fname" value="<?php echo $fname ?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
            </div>

            <div>
                <label class="text-gray-700" for="lname">Last Name</label>
                <input id="lname" type="text" name="lname" value="<?php echo $lname ?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
            </div>

            <div>
                <label class="text-gray-700" for="emailAddress">Email Address</label>
                <input id="emailAddress" type="email" name="email" value="<?php echo $email ?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
            </div>

            <div>
                <label class="text-gray-700" for="address">Address</label>
                <input id="address" type="address" name="address" value="<?php echo $address ?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
            </div>

            <div>
                <label class="text-gray-700" for="branch">Branch</label>
                <select name="branch" id="branch" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
                    <option value="finance" <?php echo is_option_selected("branch", "finance") ?>>Finance</option>
                    <option value="marketing" <?php echo is_option_selected("branch", "marketing") ?>>Marketing</option>
                    <option value="sales" <?php echo is_option_selected("branch", "sales") ?>>Sales</option>
                    <option value="production" <?php echo is_option_selected("branch", "production") ?>>Production</option>
                    <option value="human resource" <?php echo is_option_selected("branch", "human resource") ?>>Human Resource</option>
                </select>
            </div>

            <div>
                <label class="text-gray-700" for="salary">Salary</label>
                <select name="salary" id="salary" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
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
            <input type="submit" value="Edit Employee" name="editEmployee" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-400 focus:outline-none focus:bg-green-400" />
        </div>
    </form>
</article>