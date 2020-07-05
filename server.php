<?php 

$words="";
$name="";
$date="";
include('db-config.php');// including the db-config.php to make a connection
if (isset($_GET['packet']))
{
       $var=$_GET['packet'];
       $query = "select date1 from tdata where name='$var'";
       $result2 = mysqli_query($con, $query);
       if($result2)
       {
			$row=mysqli_fetch_array($result2);
            $date_var=$row[0];//to store the sum   
            echo $date_var;

        echo "<br />";
       }
       else
       {
        die("Connection failed: " . mysqli_connect_error());
       }
       $query2="DELETE FROM tdata WHERE name='$var'";
       if(mysqli_query($con,$query2))
       {
           echo "deleted successfully";

              echo "<br />";
       }
       else
       {
        die("Connection failed: " . mysqli_connect_error());   
       }
        $query = "select * from tdata A where A.date1 >= '$date_var'";
        $results = mysqli_query($con, $query);
        while($row1 = mysqli_fetch_row($results)) 
        {
            $name=$row1[0];
            echo $name;
            echo "     ";
            $words=$row1[1];
            echo $words;
            echo "     ";
            echo $row1[2];
            echo "     ";
            echo "<br />";
            $select_query="SELECT sum(words) from tdata where date1='$date_var'";//to select the sum of rows where date=$date
            $fetch=mysqli_query($con,$select_query);
            $row=mysqli_fetch_array($fetch);
            $data=$row[0];//to store the sum
            echo $data;
            if($data+$words<=1000 )//if A+B<=100
            {
                $query="update  tdata set date1='$date_var' where name='$name'";//insert the values to tdata table
                $db_insert=mysqli_query($con,$query);
                if($db_insert)
                {
                    echo "updated successfully";

                        echo "<br />";
                }
                else
                {
                    die("Connection failed: " . mysqli_connect_error());   
                }


            }
            else
            {
                $date_var = date('Y-m-d', strtotime($date_var. ' + 1 days'));//to increment the date by 1
                if(isWeekend($date_var)=="true")
                {
                    $date_var = date('Y-m-d', strtotime($date_var. ' + 1 days'));//to increment the date by 1
                }
                $query="update  tdata set date1='$date_var' where name='$name'";//insert the values to tdata table
                $db_insert=mysqli_query($con,$query);
            }

        }

	echo '<script>alert("Deleted Successfully");
	window.location.href="index.php";</script>';//to alert submitted successfully

    
       
}
function isWeekend($date) {
    $weekDay = date('w', strtotime($date));
    return ($weekDay == 0);
}
?>