<?php
    include "includes/header.php";
?>


<section class="max-w-4xl h-3/5 p-6 mx-auto bg-white rounded-md shadow-lg dark:bg-gray-800">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Create Employee</h2>
        
        <form>
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
                    <label class="text-gray-700" for="dateOfJoining">Date of Joining</label>
                    <input id="dateOfJoining" name="dateOfJoining" type="date" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md ">
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-400 focus:outline-none focus:bg-green-400">Save</button>
            </div>
        </form>
    </section>