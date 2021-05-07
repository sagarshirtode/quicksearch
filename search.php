<?php
require("dbconnection.php");
// echo "<br>";
$searchcode =$_POST['name'];
// echo $searchcode;
$sql = "SELECT name FROM test WHERE name LIKE '%".$searchcode."%'";
$result = $conn->query($sql); 
if($result->num_rows > 0){
    $data = array();
    while($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }
}
echo json_encode($data);
?>