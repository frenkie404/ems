<article class=" h-3/5 p-6  bg-white rounded-md shadow-lg">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Create Employee</h2>

    <form enctype="multipart/form-data" action="controllers/admin/createEmployee.php" method="POST" class="requiresValidation" id="createEmployee">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-gray-700" for="fname">First Name</label>
                <input id="fname" type="text" name="fname" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
            </div>

            <div>
                <label class="text-gray-700" for="lname">Last Name</label>
                <input id="lname" type="text" name="lname" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
            </div>

            <div>
                <label class="text-gray-700" for="emailAddress">Email Address</label>
                <input id="emailAddress" type="email" name="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
            </div>

            <div>
                <label class="text-gray-700" for="address">Address</label>
                <input id="address" type="address" name="address" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
            </div>

            <div>
                <label class="text-gray-700" for="branch">Branch</label>
                <select name="branch" id="branch" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
                    <option value="finance">Finance</option>
                    <option value="marketing">Marketing</option>
                    <option value="sales">Sales</option>
                    <option value="production">Production</option>
                    <option value="human resource">Human Resource</option>
                </select>
            </div>

            <div>
                <label class="text-gray-700" for="salary">Salary</label>
                <select name="salary" id="salary" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
                    <option value="15000">15,000</option>
                    <option value="20000">20,000</option>
                    <option value="25000">25,000</option>
                    <option value="30000">30,000</option>
                    <option value="40000">40,000</option>
                    <option value="50000">50,000</option>
                </select>
            </div>

            <div>
                <label class="btn btn--active text-center cursor-pointer" for="picture">Picture</label>
                <input id="picture" type="file" name="picture" accept="image/png, image/jpeg" />
            </div>
        </div>


        <div class="flex justify-end mt-6">
            <input type="submit" value="Create Employee" name="createEmployee" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-400 focus:outline-none focus:bg-green-400" />
        </div>
    </form>
</article>