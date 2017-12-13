<?php 
	session_start();
	define('MYSQL_ASSOC',MYSQLI_ASSOC);
	$con=mysqli_connect("localhost","root","root","HW3");
	$g = (string)$_GET['gend'];
	$y = (int)$_GET['year'];

	$query = "SELECT * FROM BabyNames where year =$y and gender ='".$g."'";
	if ($g=='' && $y!=''){
		$query = "SELECT * FROM BabyNames where year =$y";
	}
	if ($g!='' && $y==''){
		$query = "SELECT * FROM BabyNames where gender ='".$g."'";
	}
	if ($g=='' && $y==''){
		$query = "SELECT * FROM BabyNames";
	}
	$result = mysqli_query ($con,$query);
	echo "<table border='1' align='center' width ='50%' style='border-collapse:collapse;'>
	<tr>
	<th> NAME </th>
	<th> RANKING </th>
	<th> GENDER </th>
	<th> YEAR </th>
	</tr>";
	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		echo "<tr>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['ranking']."</td>";
		echo "<td>".$row['gender']."</td>";
		echo "<td>".$row['year']."</td>";
		echo "</tr>";

	}
	echo "</table>";
	mysqli_close($con);
 ?>