<?php
//$con=mysqli_connect("sql208.epizy.com","epiz_25981751","nz68lyyUE1","epiz_25981751_taskdata");//make connection
$con=mysqli_connect('localhost', 'root', '', 'sample');
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>