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
    <title>Document</title>
    <link rel="stylesheet" href="public/style.css" />
</head>

<body class="flex min-h-screen flex-col justify-center items-center">
    <section>
        <h1 class="text-red-600 text-4xl mb-6 font-bold"><?php echo $error_message ?></h1>
        <p>Learn more about the error
            <a href=<?php echo "https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/" . $error_code ?> target="_blank" class="text-blue-500">here.</a>
        </p>
        <a href="/" class="block mt-6 text-white text-center bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">Return Home</a>
    </section>
</body>

</html>