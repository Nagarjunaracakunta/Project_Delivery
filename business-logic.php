<?php
include('db-config.php');// including the db-config.php to make a connection
$name=$_POST["name"];//user details from the add-project.php
$words=$_POST["words"];
$extra_information=$_POST["extra"];
if ($words>1000)//for alert 
{
	echo '<script>alert("Maximum allowed words are 1000 only");
		window.location.href="add-project.php";
	</script>';//alert message
}
else
{

	$query="SELECT MAX(date1) FROM tdata";//selct the data from tdata table   
	$fetch=mysqli_query($con,$query);
	$row=mysqli_fetch_array($fetch);
	$date=$row[0];//to store the sum
	if($date=="")
	{
		
		echo "enterd";
		$date=date("Y/m/d");
		if(isWeekend($date)=="true")
		{
			$date = date('Y-m-d', strtotime($date. ' + 1 days'));//to increment the date by 1
		}
		
	}

	$select_query="SELECT sum(words) from tdata where date1='$date'";//to select the sum of rows where date=$date
	$fetch1=mysqli_query($con,$select_query);
	$row=mysqli_fetch_array($fetch1);
	$data=$row[0];//to store the sum
	if($data+$words<=1000 )//if A+B<=100
	{
		$query="INSERT into tdata (name,words,extra,date1) values ('$name','$words','$extra_information','$date');";//insert the values to tdata table
		$db_insert=mysqli_query($con,$query);
		echo "inserted <1000";
	}
	else
	{
		$date = date('Y-m-d', strtotime($date. ' + 1 days'));//to increment the date by 1
		if(isWeekend($date)=="true")
		{
			$date = date('Y-m-d', strtotime($date. ' + 1 days'));//to increment the date by 1
		}
		$query="INSERT into tdata (name,words,extra,date1) values ('$name','$words','$extra_information','$date');";//insert the values to tdata table
		$db_insert=mysqli_query($con,$query);
		echo "inserted >1000";

	}
	echo '<script>alert("Submitted Successfully");
	window.location.href="index.php";</script>';//to alert submitted successfully
}
function isWeekend($date) {
    $weekDay = date('w', strtotime($date));
    return ($weekDay == 0);
}
?>
