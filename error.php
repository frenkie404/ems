<?php
    include "includes/header.php";

    $error_code = get_session("error_code");
    if(!$error_code){
        redirect("/");
    }

    $error_message;

    switch($error_code){
        case 400:
            $error_message = "A very bad request!";
            break;
        case 401:
            $error_message = "You are not authorized. Try Again.";
            break;
        case 403:
            $error_message = "You do not have correct permissions to access the resource.";
            break;
        
    }
?>

<section>
    <h1 class="text-red-600 text-4xl mb-6 font-bold"><?php echo $error_message ?></h1>
    <p>Learn more about the error 
        <a href=<?php echo "https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/".$error_code ?>  target="_blank" class="text-blue-500">here.</a>
    </p>
    <a href="/" class="block mt-6 text-white text-center bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">Return Home</a>
</section>