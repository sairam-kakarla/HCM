<?php
if(isset($_POST["submit"])){
    $name=$_POST["FName"];
    $email=$_POST["Email"];
    $regNO=$_POST["Regno"];
    $roomNo=$_POST["Roomnumber"];
    $block=$_POST["block"];
    $type=$_POST["Type"];
    $detail=$_POST["detail"];
    $img=$regNO.time();
    $img_local=$_FILES['complaint_image']['tmp_name'];
    $img_folder="/opt/lampp/htdocs/HCM/img/";
    if(move_uploaded_file($img_local,$img_folder.$img)){
        echo "File upload succefull";
        echo "<img src='$img_folder.$img'>";
    }
    else{
        echo "File upload Unsucessfull<br>";
    }
    echo "Hello ";
    echo $name."<br>";
    echo $email."<br>";
    echo $regNO."<br>";
    echo $roomNo."<br>";
    echo $block."<br>";
    echo $type."<br>";
    echo $detail."<br>";
    echo $_SERVER['DOCUMENT_ROOT'];    
}
?>