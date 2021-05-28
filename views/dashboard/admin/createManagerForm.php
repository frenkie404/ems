<article class=" h-3/5 p-6  bg-white rounded-md shadow-lg">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Create Manager</h2>

    <form action="controllers/admin/createManager.php" method="POST">
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
        </div>

        <div class="flex justify-end mt-6">
            <input type="submit" value="Create Manager" name="createManager" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-400 focus:outline-none focus:bg-green-400" />
        </div>
    </form>
</article>