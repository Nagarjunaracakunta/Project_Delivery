<?php
include('db-config.php');
$query = "SELECT * FROM tdata ORDER BY date1";//To Sort the data by date column
$result = mysqli_query($con,$query);?>
<html>
<head>
<style>
table,th,td,tr{border:1px solid black;}
</style>
</head>
<body>
<table>
		<tr>
			<th>TOPIC</th>
			<th>NUMBER OF WORDS</th>
			<th>INSTRUCTIONS</th>
			<th>SCHEDULED DATE</th>
			<th>Delete</th>
		</tr>
<?while($row = mysqli_fetch_array($result)){  ?> 
	<tr>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo  $row['words']; ?></td>
	<td><?php echo $row['date1']; ?></td>
	<td><?php echo $row['extra']; ?></td>
	<td><a href="server.php?packet=<?php echo $row['name']; ?>">Delete</a></td>
</tr>
<?php }?>
</table>
Return to <a href='index.php'>HOME Page</a>
</body>
</html>