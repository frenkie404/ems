<?php
include "includes/header.php";
if (get_session("logged_in_as")) {
  redirect("/dashboard.php");
}
?>

<main>
  <div>
    <div>
      <h1>The Employee Management System</h1>
      <p>project prepared by <strong>Team Nirmal</strong>.</p>
    </div>

    <div>
      <h2>Sign In</h2>

      <form action="controllers/authenticate/index.php" method="POST" id="signInForm">
        <label for="username">username</label>
        <input type="username" id="username" name="username">

        <div>
          <label for=" password">password</label>
          <input type="password" id="password" name="password">
        </div>

        <div>
          <label for=" role">I am a</label>
          <select type="role" id="role" name="role">
            <option value="employee">Employee</option>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
          </select>
        </div>

        <input type="submit" name="signIn" value="Sign In" />
      </form>
    </div>
  </div>
</main>

<?php
include "includes/footer.php";
?>