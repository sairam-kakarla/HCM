<?php 
require "HCM_db.php";
session_start();
if($_POST["submit"]){
    $uname=filter_var($_POST["uname"],FILTER_SANITIZE_STRING);
    $paswd=filter_var($_POST["uname"],FILTER_SANITIZE_STRING);
    $loginCheck="SELECT uname,password,fname FROM account WHERE uname='$uname'";
    $result=$conn->query($loginCheck);
    if($result){
        if($result->num_rows===0){
            //on invalid uname
            
        }
        else{
            $row=$result->fetch_assoc();
            if($paswd===$row["password"]){
                //on login successfull
                $_SESSION['login_user']=$uname;
                header("Location :dashboard.html");
            }
            else{
                //if password doesnt match;
            }    
            
        }

    }
    else{
        //on db error
        echo $conn->error;
        header("Location :login.html");
    }
}
else{
    header("Location: login.html");
}
?>