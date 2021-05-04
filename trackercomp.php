<?php 
require 'HCM_db.php';
$rengno=$_GET["regno"];
$comp_query="SELECT type,detail,img_location,DOS,DOR,status FROM complaint WHERE reg_no ='$rengno'";
$result=$conn->query($comp_query);
if($result->num_rows>0){
    echo "<table class='table'>";
    echo "<thead>
    <tr>
      <th scope='col'>Sr</th>
      <th scope='col'>Type</th>
      <th scope='col'>Details</th>
      <th scope='col'>Date of Registration</th>
      <th scope='col'>Date of Resolution</th>
      <th scope='col'>Status</th>
    </tr>
  </thead>
  <tbody>";
  $count=1;
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<th scope='row'>$count</th>";
        echo "<td>".$row["type"]."</td>";
        echo "<td>".$row["detail"]."</td>";
        echo "<td>".$row["DOS"]."</td>";
        echo "<td>".$row["DOR"]."</td>";
        if($row["status"]==0){
        echo "<td>pending</td>";
        }
        else{
        $status=$row["status"];
        echo "<td>resolved </td>";
        }
        echo "</tr>";
        $count++;
    }
    echo "</tbody";
}
else{
    echo "<p>No matching complaints for the given Registration Number</p>";
}
$conn->close();
?>