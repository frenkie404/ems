<?php
include "includes/header.php";
if (get_session("logged_in_as")) {
  redirect("/dashboard.php");
}
?>

<main class="text-gray-600 body-font w-full">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center justify-between">
    <div class="w-2/5 pr-0">
      <h1 class="title-font font-bold text-3xl text-gray-900">The Employee Management System</h1>
      <p class="leading-relaxed mt-4">A semester-end project prepared by <strong>Team Nirmal</strong>.</p>
    </div>

    <div class=" bg-gray-100 rounded-lg p-8 flex flex-col w-3/5 mt-10">
      <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign In</h2>

      <form action="controllers/authenticate/index.php" method="POST" class="relative mb-4 requiresValidation" id="signInForm">
        <label for="username" class="leading-7 text-sm text-gray-600">username</label>
        <input type="username" id="username" name="username" class="w-full bg-white rounded border border-gray-300  text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

        <div class="relative mb-4">
          <label for="password" class="leading-7 text-sm text-gray-600">password</label>
          <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300  text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>

        <div class="relative mb-4">
          <label for="role" class="leading-7 text-sm text-gray-600">I am a</label>
          <select type="role" id="role" name="role" class="w-full bg-white rounded border border-gray-300  text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <option value="employee">Employee</option>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
          </select>
        </div>

        <input type="submit" name="signIn" value="Sign In" class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg" />
      </form>
    </div>
  </div>
</main>

<?php
include "includes/footer.php";
?>