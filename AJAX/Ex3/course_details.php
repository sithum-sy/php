<?php
require_once 'db.php';

$id=$_GET['courseID'];


$sql = "SELECT * FROM coursedata WHERE courseID='".$id."'";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
 
	echo "<table id='coursedata'>";
	echo "<tr>
			<th>Course Name </th>
			<th>Course Duration </th>
			<th>Course Fee </th>
			<th>Start Date </th>
		  </tr>";
  while($row = $result->fetch_assoc()) {
	echo "<tr>
				<td>".$row["courseName"]."</td>
				<td>".$row["courseDuration"]."</td>
				<td>".$row["courseFee"]."</td>
				<td>".$row["courseStartDate"]."</td>
		 </tr>";
  }
  
  echo "</table>";
}else{
  echo "No Records Found";
}
$conn->close();


?>