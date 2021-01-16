<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "<table border=1>
<th>Date & Time</th>
<th>Relay #</th>
<th>Action</th>
<th>Trigger</th>
";
$sql = " select * from PowerStates ORDER BY timestamp DESC LIMIT 25";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

while($row = mysqli_fetch_array($result)) {
    $timestamp = $row['timestamp'];
    $device_no = $row['device_no'];
    $action_taken = $row['action_taken'];
       $triggered_by = $row['triggered_by'];


if ($action_taken == "0") $action_taken = "Powered On";
if ($action_taken == "1") $action_taken = "Powered Off";
if ($triggered_by == "0") $action_taken = "@Reboot cron";
if ($triggered_by == "1") $action_taken = "shell scripts";
if ($triggered_by == "2") $action_taken = "Web UI";

echo "
<tr>
<td>".$timestamp."</td>
<td>".$device_no."</td>
<td>".$action_taken."</td>
<td>".$triggered_by."</td>
</tr>";
}
#    while($row = $result->fetch_assoc()) {
#       echo "id: " . $row["timestamp"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
#    }
#} else {
#    echo "0 results";
}
$conn->close();


#$sql = " select * from PowerStates ORDER BY timestamp DESC LIMIT 10";
#$result = mysqli_query($conn,$sql)or die(mysqli_error());

#echo "<table>";
#echo "<tr><th>Date</th><th>Comment</th><th>Amount</th></tr>";

#while($row = mysqli_fetch_array($result)) {
#    $timestamp = $row['timestamp'];
#    $device_no = $row['device_no'];
#    $action_taken = $row['action_taken'];
#	$triggered_by = $row['triggered_by'];
#    echo "<tr><td style='width: 200px;'>".$date."</td><td style='width: 600px;'>".$comment."</td><td>".$amount."</td></tr>";
#} 

#echo "</table>"
#mysqli_close($con);
