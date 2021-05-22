<?php 
require 'HCM_db.php';
$rengno=$_GET["regno"];
$comp_query="SELECT type,detail,img_location,DOS,DOR,status FROM complaint WHERE reg_no ='$rengno' ORDER BY DOS";
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
      <th scope='col'>Complaint Image</th>
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
        if(!empty($row["img_location"])){
          $src=$row["img_location"];
          echo "<td>";
          echo "<img src='$src' class='cmp_img' alt='complaint image' width='200' height='200'/>";
          echo "</td>";
        }
        else{
          echo "<td><p>No image Provided</p></td>";
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