<?php

$action = $_GET["do"];
$device = $_GET["device"];

if ($action == "off") $action=1;
if ($action == "on") $action=0;

if ($device == "1") $gpio=12;
if ($device == "2") $gpio=13;
if ($device == "3") $gpio=10;
if ($device == "4") $gpio=11;
if ($device == "5") $gpio=0;
if ($device == "6") $gpio=7;
if ($device == "7") $gpio=9;
if ($device == "8") $gpio=8;

exec ("gpio write ".$gpio." ".$action) ; 

sleep (1);

$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "INSERT INTO PowerStates (device_no, action_taken, triggered_by) VALUES($device, $action, '2');";

if (mysqli_query($conn, $sql)) {
#    echo "sql worked, gash this line out to enable header redirect";
} else {
    echo "MYSQL has an error, not redirecting" . mysqli_error($conn);
}

mysqli_close($conn);

header('Location: http://renegadepanda.org');
#echo phpinfo(32);
