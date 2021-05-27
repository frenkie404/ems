<?php
include "includes/header.php";

$logged_in_as = get_session("logged_in_as");
if (!$logged_in_as) {
    redirect("/");
    return;
}
?>

<main class="flex justify-between w-4/5">
    <?php
    include "views/dashboard/" . $logged_in_as . ".php";
    ?>
</main>

<?php include "includes/footer.php" ?>