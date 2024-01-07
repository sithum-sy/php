<?php
require_once 'db.php';

$id=$_GET['id'];


$sql = "SELECT * FROM course_details WHERE c_id='".$id."'";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
 
	echo "<table id='coursedetails'>";
	echo "<tr>
			<th>Course Name </th>
			<th>Course Duration </th>
			<th>Course Fee </th>
			<th>Start Date </th>
		  </tr>";
  while($row = $result->fetch_assoc()) {
	echo "<tr>
				<td>".$row["c_name"]."</td>
				<td>".$row["c_duration"]."</td>
				<td>".$row["c_fee"]."</td>
				<td>".$row["c_startdate"]."</td>
		 </tr>";
  }
  
  echo "</table>";
}else{
  echo "No Records Found";
}
$conn->close();


?>