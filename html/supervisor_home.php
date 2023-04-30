<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "you are logged out !";
    header('location:login.php');
}
?>
<?php

include '../config.php';
include './greeting.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/shome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Supervisor home</title>
</head>
<body>
<?php
if(isset($_SESSION['project_request']))
{
    ?>
        <script>
            alert( "New Project request !");
        </script>
    <?php
    unset($_SESSION['project_request']);
}

?>
    <div class="home_content">
        <div class="heading">
            <h3>Home</h3>
            <div class="logout"><a href="./logout.php">Logout</a>
            </div>
        </div>

        <div class="body">
            <div class="date"><?php echo $date;?></div>
            <h1><?php echo $greeting ; echo $_SESSION['username'];?></h1>
            
        </div>
        <div class="center">
	        <ul>
		        <li><a href="../supervisor/sdashboard.php"><img src="../illustrations/dashboard.png" width="35" height="35">Dashboard</a></li>
                <li><a href="../supervisor/notification.php"><img src="../illustrations/active.png" width="35" height="35"></i>Notice</a></li>
		        <li><a href="../supervisor/project.php"><img src="../illustrations/project.png" width="35" height="35">Projects</a></li>
	            <li><a href="../supervisor/studentlist.php"><img src="../illustrations/students.png" width="35" height="35">Students list</a></li>
	        </ul>
        </div>
        <div id=center2>
	        <ul>
            <li><a href=""><img src="../illustrations/project-management.png" width="35" height="35">Manage Report</a></li>
		        <li><a href=""><img src="../illustrations/folder-management.png" width="35" height="35">Manage Resources</a></li>
                <li><a href="../supervisor/project_request.php"><img src="../illustrations/interview.png" width="35" height="35">Requests</a></li>
		        <li><a href=""><img src="../illustrations/briefing.png" width="35" height="35">Assign Marks</a></li>
	            
	        </ul>
        </div>
    </div>
</body>
</html>