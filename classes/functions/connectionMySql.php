<?php

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
const DB_SERVER = 'mikeon7v.beget.tech';
const DB_USERNAME = 'mikeon7v_test';
const DB_PASSWORD = 'roottest1!';
const DB_NAME = 'mikeon7v_test';

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


