<?php
session_start();
$path = $_SERVER["DOCUMENT_ROOT"];
include $path . "/utils/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_title() ?></title>
    <link rel="stylesheet" href="public/style.css" />
</head>

<body class="flex min-h-screen flex-col justify-between items-center">
    <nav class="px-4 py-2 flex justify-between items-center bg-green-400 text-white w-full shadow-md">
        <h1 class="w-content"><a href="/">EMS</a></h1>
        <?php if (get_session("logged_in_as")) {
            echo '<a href="/controllers/logout.php" class="btn btn--outline">Logout</a>';
        } ?>
    </nav>

    <?php
    try {
        include $path . "/utils/db.php";
    } catch (Exception $e) {
        // echo $e;
        // return;
        set_session("error_code", 500);
        redirect("/error.php");
    }
    ?>