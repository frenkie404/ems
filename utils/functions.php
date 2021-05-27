<?php

function set_session($key, $value)
{
  echo "setting session";
  $_SESSION[$key] = $value;
}

function get_session($key)
{
  if (!isset($_SESSION[$key])) {
    return null;
  }
  return $_SESSION[$key];
}

function redirect($url)
{
  header("Location: " . $url);
  die();
}

function get_title()
{
}

function from_form($method="POST", $names){
  $values = [];
  foreach($names as $name){
    if($method === "GET"){
      $values[$name] = $_GET[$name];
    }else{
      $values[$name] = $_POST[$name];
    }
  }
  return $values;
}
?>
