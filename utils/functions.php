<?php

function set_session($key, $value)
{
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
  $logged_in_as = get_session("logged_in_as");
  $error_code = get_session("error_code");

  if ($error_code) {
    switch ($error_code) {
      case 400:
        return "Error 400 | Bad Request";
        break;
      case 401:
        return "Error 401 | Unauthorized";
        break;
      case 403:
        return "Error 403 | Forbidden";
        break;
      case 500:
        return "Error 500 | Server Broke Down";
        break;
    }
  } else {
    switch ($logged_in_as) {
      case "admin":
        return "Admin | EMS";
        break;
      case "manager":
        return "Manager | EMS";
        break;
      case "employee":
        return "Employee | EMS";
        break;
      default:
        return "EMS - Employee Management System";
    }
  }
}

function from_form($method = "POST", $names)
{
  $values = [];
  foreach ($names as $name) {
    if ($method === "GET") {
      $values[$name] = $_GET[$name];
    } else {
      $values[$name] = $_POST[$name];
    }
  }
  return $values;
}

function output_table($headings, $data, $current_user)
{
  echo "<table class=\"table p-4 bg-white shadow rounded-lg w-full ml-16\">";
  echo "<tr class=\"text-gray-700\">";

  foreach ($headings as $heading) {
    echo "<th class=\"border-b-2 p-4 whitespace-nowrap font-bold text-gray-900\">$heading</th>";
  }

  echo "</tr>";

  foreach ($data as $datum) {
    echo "<tr class=\"text-gray-700\">";
    foreach ($datum as $key => $value) {
      echo "<td class=\"border-b-2 p-4\">$value</td>";
    }
    if ($current_user === "manager") {
      $id = $datum["id"];
      echo "<td class=\"border-b-2 p-4\">
                <a href=\"/controllers/manager/editBonus.php?id=$id\"  class=\"btn btn--outline\">Edit Bonus</a>
            </td>";
    } elseif ($current_user === "admin") {
      $id = $datum["id"];
      echo "<td class=\"border-b-2 p-4\">
                <a href=\"/dashboard.php?current_action=edit&id=$id\"  class=\"btn btn--inline btn--outline mr-4\">Edit</a>
                <a href=\"/controllers/admin/deleteEmployee.php?id=$id\"  class=\"btn btn--inline btn--outline\">Delete</a>
        </td>";
    }

    echo "</tr>";
  }

  echo "</table>";
}
