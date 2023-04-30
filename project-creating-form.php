<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="project-creating-form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <?php
    include './html/dbcon.php';
    if(isset($_POST['request_project'])){
        $project_title = mysqli_real_escape_string($con, $_POST['project_title']);
        $project_details = mysqli_real_escape_string($con, $_POST['project_details']);
        $objective = mysqli_real_escape_string($con,$_POST['objective']);
        $project_type = mysqli_real_escape_string($con, $_POST['project_type']);
        // $supervisor = mysqli_real_escape_string($con, $_POST['supervisor']);
        $team_member1 = mysqli_real_escape_string($con, $_POST['team_member1']);
        $team_member2 = mysqli_real_escape_string($con, $_POST['team_member2']);
        $team_member3 = mysqli_real_escape_string($con, $_POST['team_member3']);
        $team_member4 = mysqli_real_escape_string($con, $_POST['team_member4']);
        //project ko staus define garne
        define('PROJECT_STATUS_PENDING', 'pending');
        define('PROJECT_STATUS_APPROVED', 'approved');
        define('PROJECT_STATUS_REJECTED', 'rejected');
        $status= PROJECT_STATUS_PENDING;  
        $insertquery= "insert into project_requests(project_name, project_details, objective, project_type, member1, member2, member3, member4, status) values('$project_title', '$project_details','$objective', '$project_type', '$team_member1', '$team_member2', '$team_member3', '$team_member4', '$status')";
        $querycheck= mysqli_query($con, $insertquery);
        if($querycheck){
            $_SESSION['project_request']="New project request !";
            ?>
            <script>
                alert("Request successful.. Admin will notify you soon !");
                location.replace("./html/home.php");
            </script>
            <?php
        }else{
            ?>
    <script>
        alert("Request failed!");
    </script>
    <?php
        }
    }
    ?>
    <a href="javascript:history.back()">
  <i class="fa-solid fa-xmark"></i>
</a>
    <div class="container">
        <header>Create project</header>

        <form action="" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Project details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Project title</label>
                            <input type="text" placeholder="Weather App" name="project_title" required>
                        </div>

                        <div class="input-field">
                            <label>Project details</label>
                            <input type="text" placeholder="Recording weather info in database..." name="project_details"required>
                        </div>

                        <div class="input-field">
                            <label>Objective</label>
                            <input type="text" placeholder="To develop system capable of..." name="objective"required>
                        </div>


                        <div class="input-field">
                            <label>Project type</label>
                            <select id="project_type" name="project_type" required>
            <option value="" disabled selected>Select</option>
            <option value="webApplication">Web Application</option>
            <option value="ecommerce">E-commerce</option>
            <option value="software_development">Software Development</option>
            <option value="networking">Networking</option>
            <option value="ai">Artificial Intelligence</option>
            </select>
                        </div>

                        <!-- <div class="input-field">
                            <label> Supervisor</label>
                            <select name="supervisor" id="team_members" required>
                            <option value="" disabled selected>Select your supervisor</option>
                            <option value="supervisor1">Prabin Shrestha</option>
                            <option value="supervisor2">Sumit Bidari</option>
                            <option value="supervisor3">Anup Bhuju</option>
                            <option value="supervisor4">Suraj Hekka</option>
                            </select>
                        </div> -->

                        
                    </div>
                </div>
                        <!-- second fields -->
                <div class="details personal">
                    <span class="title">Team members</span>
                    <div class="fields">

                        <div class="input-field">
                            <label>Member 1</label>
                            <select name="team_member1" id="team_members" required>
                            <option value="" disabled selected>Select from users</option>
                            <?php
                            // Connecting to the database and retrieve the list of available users
                            include './html/dbcon.php';
                            $result = mysqli_query($con, "SELECT * FROM users");
                            // Loop through the results and create an option for each user
                            while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['user_id'] . "'>" . $row['username'] . "</option>";
                            }
                            ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Member 2</label>
                            <select name="team_member2" id="team_members" required>
                            <option value="" disabled selected>Select from users</option>
                            <?php
                            // Connecting to the database and retrieve the list of available users
                            include './html/dbcon.php';
                            $result = mysqli_query($con, "SELECT * FROM users");
                            // Loop through the results and create an option for each user
                            while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['user_id'] . "'>" . $row['username'] . "</option>";
                            }
                            ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Member 3</label>
                            <select name="team_member3" id="team_members" required>
                            <option value="" disabled selected>Select from users</option>
                            <?php
                            // Connecting to the database and retrieve the list of available users
                            include './html/dbcon.php';
                            $result = mysqli_query($con, "SELECT * FROM users");
                            // Loop through the results and create an option for each user
                            while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['user_id'] . "'>" . $row['username'] . "</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Member 4</label>
                            <select name="team_member4" id="team_members"required>
                            <option value="" disabled selected>Select from users</option>
                            <?php
                            // Connecting to the database and retrieve the list of available users
                            include './html/dbcon.php';
                            $result = mysqli_query($con, "SELECT * FROM users");
                            // Loop through the results and create an option for each user
                            while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['user_id'] . "'>" . $row['username'] . "</option>";
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <button class="btn" name="request_project">
                        <span class="btntext">Make request</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>