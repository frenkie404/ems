<section>
    <h1>Just one more step!</h1>
    <p>Please update your password to something unguessable.</p>

    <form action="controllers/users/changePassword.php" method="POST" class="relative mb-4">
        <label for="oldPassword" class="leading-7 text-sm text-gray-600">old password</label>
        <input type="password" id="oldPassword" name="oldPassword" class="w-full bg-white rounded border border-gray-300  text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

        <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-600">password</label>
            <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300  text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>


        <input type="submit" name="changePassword" value="Change Password" class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg" />
    </form>
</section>