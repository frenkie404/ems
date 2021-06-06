<article>
    <h2>Create Employee</h2>

    <form enctype="multipart/form-data" action="controllers/admin/createEmployee.php" method="POST" class="requiresValidation" id="createEmployee">
        <div>
            <div>
                <label for="fname">First Name</label>
                <input id="fname" type="text" name="fname">
            </div>

            <div>
                <label for="lname">Last Name</label>
                <input id="lname" type="text" name="lname">
            </div>

            <div>
                <label for="emailAddress">Email Address</label>
                <input id="emailAddress" type="email" name="email">
            </div>

            <div>
                <label for="address">Address</label>
                <input id="address" type="address" name="address">
            </div>

            <div>
                <label for="branch">Branch</label>
                <select name="branch" id="branch">
                    <option value="finance">Finance</option>
                    <option value="marketing">Marketing</option>
                    <option value="sales">Sales</option>
                    <option value="production">Production</option>
                    <option value="human resource">Human Resource</option>
                </select>
            </div>

            <div>
                <label for="salary">Salary</label>
                <select name="salary" id="salary">
                    <option value="15000">15,000</option>
                    <option value="20000">20,000</option>
                    <option value="25000">25,000</option>
                    <option value="30000">30,000</option>
                    <option value="40000">40,000</option>
                    <option value="50000">50,000</option>
                </select>
            </div>

            <div>
                <label for="picture">Picture</label>
                <input id="picture" type="file" name="picture" accept="image/png, image/jpeg" />
            </div>
        </div>


        <div class="flex justify-end mt-6">
            <input type="submit" value="Create Employee" name="createEmployee" />
        </div>
    </form>
</article>