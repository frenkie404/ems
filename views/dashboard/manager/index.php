<?php
$user = get_session("user");
if (!$user) {
    redirect("/");
}
extract($user);

if ($is_verified === '0') {
    include "changePassword.php";
} else {
    include "getEmployees.php";
}
