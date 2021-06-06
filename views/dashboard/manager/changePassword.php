<section>
    <h1>Just one more step!</h1>
    <p>Please update your password to something unguessable.</p>

    <form action="controllers/users/changePassword.php" method="POST">
        <label for="oldPassword">old password</label>
        <input type="password" id="oldPassword" name="oldPassword">

        <div class="relative mb-4">
            <label for="password">password</label>
            <input type="password" id="password" name="password">
        </div>


        <input type="submit" name="changePassword" value="Change Password" />
    </form>
</section>