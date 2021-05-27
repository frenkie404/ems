<?php
    session_start();
    include "../../utils/functions.php";
    include "validate_admin.php";
    include "validate_manager.php";
    include "validate_employee.php";
    
    if(!isset($_POST["signIn"])){
        set_session("error_code", 400);
        redirect("/error.php");
    }else{
       $form_data = from_form("POST", ["username", "password", "role"]);
       extract($form_data); // https://stackoverflow.com/a/28233499
        
       if($role === "admin"){
           validate_admin($form_data);
       }else if($role === "manager"){
           validate_manager($form_data);
       }else{
           validate_employee($form_data);
       }
    }
?>