<?php
require "sessionHCM.php";
if(!isset($_SESSION["login_user"])){
    header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard</title>
  </head>
  <body>
    <nav class="navbar navbar-light fixed-top flex-md-nowrap p-0 shadow" style="background-image: linear-gradient(to right,#ddd6f3,#faaca8)">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">HCM</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <!--Side Navigation Bar-->
    <div class="continare-fluid">
        <div class="row">
            <div class="col-md-2 bg-light d-none d-md-block sidebar">
                <div class="left-sidebar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link " href="dashboard.php">Assign Employee</a>
                         </li>
                         <li class="nav-item">
                             <a id="vrfyComp" class="nav-link" href="dashboardV.php">Verify Complaints</a>
                         </li>
                         <li class="nav-item">
                             <a id="vrfyComp" class="nav-link" href="#">Add Employee</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" class="nav-link" href="remove_Emp.php">Remove Employee</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link " href="stats.html" >Stats</a>
                        </li>
                    </ul>
                </div>
            </div>
        

    <!--Main Arena-->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="content">
            <h1>Register Employee</h1>
             <form method="POST" action="actionEmpAdd.php"> 
                 <?php 
                 if(isset($_SESSION["msgs"])){
                     echo "<div class='alert alert-success' role='alert'>"
                     .$_SESSION['msgs']."
                   </div>";
                   unset($_SESSION["msgs"]);
                 }
                 elseif(isset($_SESSION["msgf"])){
                    echo "<div class='alert alert-danger' role='alert'>"
                    .$_SESSION['msgf']."
                  </div>";
                  unset($_SESSION["msgf"]);
                 }?>
                 <div class="form-group">
                     <label for="fname">Full Name</label>
                     <input type="text" class="form-control" name="fname" id="fname"  placeholder="Enter Full Name" required>
                 </div>
                 <div class="form-group">
                     <label for="fname">User Name</label>
                     <input type="text" class="form-control" name="uname" id="uname"  aria-describedby="unameHelp"  placeholder="Enter UserName" required>
                     <small id="unameHelp" class="form-text text-muted">Username Format empXXXX and it should be unique</small>
                 </div>
                 <div class="form-group">
                     <label for="paswd">Password</label>
                     <input type="password" class="form-control" name="paswd" id="paswd" required>
                 </div>
                 <div class="form-group">
                     <label for="pawsd1">Re-Enter Password</label>
                     <input type="text" class="form-control" name="paswd1" id="paswd1" required>
                 </div>
                 <div class="form-group">
                     <label >Select Department</label>
                 <div class="form-group">
                 <div class="input-group mb-3">
                     <div class="input-group-prepend">
                         <label class="input-group-text" for="dept">Department</label>
                     </div>
                     <select class="custom-select" id="dept" name="dept" required>
                         <option value="cleaning">Cleaning</option>
                             <option value="electricity">Electricity</option>
                             <option value="wifi">Wifi</option>
                             <option value="washroom">Washroom</option>
                             <option value="mess">Mess</option>
                             <option value="architecture">Architecture</option>
                             <option value="others">Others</option>
                     </select>
                 </div>
                 </div>
                 </div>
                 <button type="submit" class="btn btn-primary mt-4" name="submit">Submit</button>
             </form>
            
        </div>
    </main>
    <script src="js/validAddEmp.js"></script>
  </body>
</html>