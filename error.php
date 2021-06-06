<?php
session_start();

include "utils/functions.php";

$error_code = get_session("error_code");
if (!$error_code) {
    redirect("/");
}

$error_message;

switch ($error_code) {
    case 400:
        $error_message = "A very bad request!";
        break;
    case 401:
        $error_message = "You are not authorized. Try Again.";
        break;
    case 403:
        $error_message = "You do not have correct permissions to access the resource.";
        break;
    case 500:
        $error_message = "Something unexpected happened on the server.";
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_title(); ?></title>
    <link rel="stylesheet" href="public/style.css" />
</head>

<body>
    <section>
        <h1><?php echo $error_message ?></h1>
        <p>Learn more about the error
            <a href=<?php echo "https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/" . $error_code ?> target="_blank">here.</a>
        </p>
        <a href="/">Return Home</a>
    </section>
</body>

</html>