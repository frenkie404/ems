<?php

// to handle mysqli error
// TODO: read more about this statement
mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);

// Create connection

$conn = mysqli_connect("localhost", "root", "", "ems");
if (!$conn) {
    return;
}


function closeDBConnection($conn)
{
    mysqli_close($conn);
}

// sql to create table

$create_employees_table = "CREATE TABLE IF NOT EXISTS employees (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    address VARCHAR(50) NOT NULL,
    branch VARCHAR(50) NOT NULL,
    salary DECIMAL(15, 2) NOT NULL,
    date_of_joining DATETIME NOT NULL ,
    password CHAR(60) DEFAULT NULL
    )";

if (mysqli_query($conn, $create_employees_table)) {
    return header("HTTP/1.1 200 OK");
} else {
    echo mysqli_error($conn);
    return header("HTTP/1.1 500 Internal Server Error");
}
