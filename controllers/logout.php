<?php
    session_start();
    include "../utils/functions.php";

    session_unset();
    session_destroy();
    redirect("/");
