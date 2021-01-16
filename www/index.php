<?php

# Build the array for current state and names

$cars = array
  (
  array("1","Hallway",exec('gpio read 12')),
  array("2","Kitchen",exec('gpio read 13')),
  array("3","Living Room",exec('gpio read 10')),
  array("4","Bedroom 1",exec('gpio read 11')),
  array("5","Bedroom 2",exec('gpio read 0')),
  array("6","HSL",exec('gpio read 7')),
  array("7","Fridge",exec('gpio read 9')),
  array("8","Washer",exec('gpio read 8')),
  );

$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

# Change from 0/1 to On/Off before we do anything
foreach($cars as &$value){
if($value['2'] == '0'){

$devqry = $value['0'];
$sql = "SELECT timestamp from PowerStates where device_no = $value[0] ORDER BY timestamp DESC LIMIT 1;";
#echo $devqry;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     $pants = $row["timestamp"]; 
$sql = 0;    
} }
        $value['4'] = "On";
        $value['3'] = "<a class=turnon href=switcher.php?do=off&device=$value[0]>Turn Off</a>";
        $value['2'] = "<img src=green-plant.ico height=50 alt=On>";

	$value['5'] = $pants;
	$conn->close();
    }

if($value['2'] === '1'){

$devqry = $value['0'];
#$devqry++;
$sql = "SELECT timestamp from PowerStates where device_no = $devqry ORDER BY timestamp DESC LIMIT 1;";
#echo $devqry;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     $pants = $row["timestamp"];
    } }

        $value['4'] = "Off";
	$value['3'] = "<a class=turnoff href=switcher.php?do=on&device=$value[0]>Turn On</a>";
        $value['2'] = "<img src=red-plant.ico height=50 alt=Off>";
        $value['5'] = $pants;
        $conn->close();

    }
}

#echo "$value['5']";

#mysqli_close($conn);


echo "
<html>
<h1>Electricker</h1>
<table border=1>
<th>RELAY #</th>
<th>Location</th>
<th>State</th>
<th>State</th>
<th>Clicker</th>
<th>Last State change</th>";

#echo "<table>";

foreach($cars as $row) {
  echo("\n\n<tr>");

  foreach($row as $cell) {
    echo("\n<td>".$cell."</td>");
  }

  echo("\n</tr>");
}






echo "
</table>

<br>

<a href=/cacti/>Cacti</a>

<br>
<br>

<a href=/sqlchanges.php>sqlchanges.php</a>

<br>
<br>

</html>";
