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
  echo "<table class=\"table p-4 bg-white shadow rounded-lg w-4/5\">";
  echo "<tr class=\"text-gray-700\">";

  foreach ($headings as $heading) {
    echo "<th class=\"border-b-2 p-4 whitespace-nowrap font-normal text-gray-900\">$heading</th>";
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
                <a href=\"/controllers/manager/handleAttendance.php?student_id=$id&action=present\"  class=\"btn btn--inline btn--green mr-4\">Present</a>
            </td>";
    } elseif ($current_user === "admin") {
      echo "<td class=\"border-b-2 p-4\">
                <a href=\"/controllers/admin?action=edit\"  class=\"btn btn--inline btn--outline mr-4\">Edit</a>
                <a href=\"/controllers/admin/delete.php?id=x\"  class=\"btn btn--inline btn--outline\">Delete</a>
        </td>";
    }

    echo "</tr>";
  }

  echo "</table>";
}
