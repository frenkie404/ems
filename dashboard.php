<?php
include "includes/header.php";

$logged_in_as = get_session("logged_in_as");
if (!$logged_in_as) {
    redirect("/");
    return;
}
?>

<main class="flex justify-between w-full p-4">
    <?php
    include "views/dashboard/" . $logged_in_as . "/index.php";
    ?>
</main>

<?php include "includes/footer.php" ?>